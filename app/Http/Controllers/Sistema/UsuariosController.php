<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuariosRequest;
use App\Models\Usuario;
use App\Models\Role;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    protected $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    // Função para exibir todos os usuários com suas respectivas funções (roles)
    public function index()
    {
        $usuarios = $this->usuario->with('roles')->get();
        $roles = Role::all();
        return view('sistema.usuarios.index', compact('usuarios', 'roles'));
    }

    // Função para exibir o formulário de criação de usuário
    public function create()
    {
        $roles = Role::all();
        return view('sistema.usuarios.create', compact('roles'));
    }

    // Função para armazenar um novo usuário no banco de dados
    public function store(UsuariosRequest $request)
    {
        $data = [
            'nome' => $request->input('nome'),
            'user' => $request->input('user'),
            'email' => $request->input('email'),
            'sexo' => $request->input('sexo'),
            'password' => $request->input('password'),
            'status' => $request->has('status') ? '1' : '0',
        ];

        if ($request->hasFile('imagem')) {
            $path = 'public/img/usuarios/';
            $imageName = uniqid() . '-' . str_replace(" ", "-", trim($request->imagem->getClientOriginalName()));
            $request->imagem->storeAs($path, $imageName);
            $data['imagem'] = $imageName;
        }

        try {
            $usuarios = $this->usuario->create($data);
            $usuarios->roles()->sync($request->input('roles'));

            flash('Usuario cadastrado com sucesso!')->success();
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    // Função para exibir os detalhes de um usuário específico
    public function show($id)
    {
        $usuario = $this->usuario->with('roles')->findOrFail($id);
        return view('sistema.usuarios.show', compact('usuario'));
    }

    // Função para exibir o formulário de edição de usuário
    public function edit($id)
    {
        $usuario = $this->usuario->findOrFail($id);
        $roles = Role::all();
        $status = $usuario->status === 'Ativo' ? '1' : '0';

        return view('sistema.usuarios.edit', compact('usuario', 'roles', 'status'));
    }

    // Função para atualizar as informações de um usuário no banco de dados
    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->input('nome'),
            'sexo' => $request->input('sexo'),
            'status' => $request->has('status') ? '1' : '0',
        ];

        $usuarios = $this->usuario->findOrFail($id);

        if ($request->hasFile('imagem')) {
            $path = 'public/img/usuarios/';

            // Excluir a imagem antiga do servidor
            if ($usuarios->imagem !== null) {
                File::delete(public_path('storage/img/usuarios/' . $usuarios->imagem));
            }

            $imageName = uniqid() . '-' . str_replace(" ", "-", trim($request->imagem->getClientOriginalName()));
            $request->imagem->storeAs($path, $imageName);
            $data['imagem'] = $imageName;
        }

        try {
            $usuarios->fill($data)->save();
            $usuarios->roles()->sync($request->input('roles'));

            flash('Usuario atualizado com sucesso!')->success();
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    // Função para excluir um usuário do banco de dados
    public function destroy($id)
    {
        $usuario = $this->usuario->findOrFail($id);

        try {
            if ($usuario->imagem !== null) {
                File::delete(public_path('storage/img/usuarios/' . $usuario->imagem));
            }

            $usuario->delete();

            flash('Usuario removido com sucesso!')->success();
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    // Função para alterar a senha de um usuário
    public function changePassword(Request $request, $id)
    {
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {

            if (!Hash::check($request->newpassword, $hashedPassword)) {
                $this->usuario->where('id', $id)->update(['password' => $request->newpassword]);

                flash('Password atualizado com sucesso!')->success();
            } else {
                flash('O seu novo password não pode ser igual o antigo!')->warning();
            }
        }

        flash('Password antigo não é o mesmo!')->warning();

        return redirect()->back();
    }

    // Função para cortar e armazenar uma imagem de usuário
    public function crop(Request $request)
    {
        $data = $request->only(['imagem']);

        $path = '/img/usuarios/';
        $file = $data['imagem'];
        $new_image_name = uniqid() . '-' . trim($request->imagem->getClientOriginalName());;
        $upload = $file->move(public_path($path), $new_image_name);

        if ($upload) {
            $this->usuario->create($data);
            return response()->json(['status' => 1, 'msg' => 'Imagem cortada com sucesso.', 'name' => $new_image_name]);
        }

        return response()->json(['status' => 0, 'msg' => 'Algo está errado, tente novamente mais tarde']);
    }

    // Função para excluir vários usuários de uma vez
    public function multiDelete(Request $request)
    {
        $this->usuario->whereIn('id', $request->get('selected'))->delete();

        return response("Usuarios selecionados excluídos com sucesso.", 200);
    }
}
