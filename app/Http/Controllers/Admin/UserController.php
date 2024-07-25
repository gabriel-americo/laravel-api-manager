<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->with('roles')->get()->map(function ($user) {
            $user->imagePath = File::exists(public_path('storage/img/users/' . $user->image))
                ? 'storage/img/users/' . $user->image
                : 'assets/media/avatars/blank.png';
            return $user;
        });

        $roles = $this->role->all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = $this->role->all();

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? '1' : '0';
        $this->processImage($request, $data);

        try {
            $user = $this->user->create($data);
            $user->roles()->sync($request->input('roles'));

            return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $user = $this->user->with('roles')->findOrFail($id);

        $image = 'assets/media/avatars/blank.png';

        if ($user->image && File::exists(public_path('storage/img/users/' . $user->image))) {
            $image = 'storage/img/users/' . $user->image;
        }

        return view('admin.users.show', compact('user', 'image'));
    }

    public function edit(string $id)
    {
        $user = $this->user->findOrFail($id);

        $user->imagePath = File::exists(public_path('storage/img/users/' . $user->image))
            ? asset('storage/img/users/' . $user->image)
            : asset('assets/media/svg/avatars/blank.svg');

        $roles = $this->role->all();
        $status = $user->status === 'Ativo' ? '1' : '0';

        return view('admin.users.edit', compact('user', 'roles', 'status'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);

        $data = $request->only(['nome', 'user', 'sexo']);
        $data['status'] = $request->has('status') ? '1' : '0';
        $this->processImage($request, $data, $id);

        try {
            $user->fill($data)->save();
            $user->roles()->sync($request->input('roles'));

            return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);

        if (Auth::user()->id === $user->id) {
            return redirect()->back()->with('error', 'Você não pode excluir seu proprio perfil.');
        }

        if ($user->imagem !== null) {
            File::delete(public_path('storage/img/users/' . $user->imagem));
        }

        try {
            $user->delete();

            return redirect()->route('usuarios.index')->with('success', 'Usuário removido com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changeEmail(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        if (Hash::check($request->confirmemailpassword, $user->password)) {
            $user->email = $request->email;
            $user->save();

            return redirect()->back()->with('success', 'Email atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Senha incorreta. Não foi possível atualizar o email.');
        }
    }

    public function changePassword(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        $currentPassword = $request->input('currentpassword');
        $newPassword = $request->input('newpassword');

        if (!Hash::check($currentPassword, $user->password)) {
            return redirect()->back()->with('error', 'A senha atual não está correta!');
        }

        if (Hash::check($newPassword, $user->password)) {
            return redirect()->back()->with('error', 'A nova senha não pode ser igual à anterior!');
        }

        $user->password = $newPassword;
        $user->save();

        return redirect()->back()->with('success', 'Senha atualizada com sucesso!');
    }

    public function multiDelete(Request $request)
    {
        $selectedUsers = $this->user->whereIn('id', $request->get('selected'))->get();

        foreach ($selectedUsers as $user) {
            if (Auth::user()->id === $user->id) {
                return response("Você não pode excluir seu proprio perfil.", 403);
            }

            if ($user->imagem !== null) {
                File::delete(public_path('storage/img/users/' . $user->imagem));
            }
        }

        $this->user->whereIn('id', $request->get('selected'))->delete();

        return response("users selecionados excluídos com sucesso.", 200);
    }

    private function processImage(Request $request, array &$data, $id = null)
    {
        if ($request->hasFile('image')) {
            $path = 'public/img/users/';
            $user = $id ? $this->user->findOrFail($id) : null;

            if ($user && $user->image !== null) {
                File::delete(public_path('storage/img/users/' . $user->image));
            }

            $imageName = uniqid() . '-' . str_replace(" ", "-", trim($request->image->getClientOriginalName()));
            $request->image->storeAs($path, $imageName);
            $data['image'] = $imageName;
        }
    }
}
