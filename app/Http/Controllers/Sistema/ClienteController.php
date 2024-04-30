<?php

namespace App\Http\Controllers\Sistema;

use App\Models\Cliente;

use App\Http\Requests\ClientesRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClienteController extends Controller
{
    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    // Exibe a lista de clientes
    public function index()
    {
        $clientes = $this->cliente->all();
        return view('sistema.clientes.index', compact('clientes'));
    }

    // Exibe o formulário de criação de cliente
    public function create()
    {
        return view('sistema.clientes.create');
    }

    // Armazena um novo cliente no banco de dados
    public function store(ClientesRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? '1' : '0';
        $dataCobranca = $request->only(['nome_cobrancas', 'sobrenome_cobrancas', 'cpf_cobrancas', 'cnpj_cobrancas', 'empresa_cobrancas', 'nascimento_cobrancas', 'sexo_cobrancas', 'rua_cobrancas', 'numero_cobrancas', 'complemento_cobrancas', 'bairro_cobrancas', 'cidade_cobrancas', 'cep_cobrancas', 'pais_cobrancas', 'estado_cobrancas', 'telefone_cobrancas', 'celular_cobrancas', 'email_cobrancas']);
        $dataEnvio = $request->only(['nome_envios', 'sobrenome_envios', 'empresa_envios', 'rua_envios', 'numero_envios', 'complemento_envios', 'bairro_envios', 'cidade_envios', 'cep_envios', 'pais_envios', 'estado_envios']);

        // Salva a imagem, se fornecida
        if ($request->hasFile('imagem')) {
            $path = 'public/img/clientes/';
            $imageName = uniqid() . '-' . str_replace(" ", "-", trim($request->imagem->getClientOriginalName()));
            $request->imagem->storeAs($path, $imageName);
            $data['imagem'] = $imageName;
        }

        try {
            // Cria o cliente e seus endereços relacionados
            $cliente = $this->cliente->create($data);
            $cliente->enderecoCobranca()->create($dataCobranca);
            $cliente->enderecoEnvio()->create($dataEnvio);

            flash('Cliente cadastrado com sucesso!')->success();
            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    // Exibe os detalhes de um cliente específico
    public function show($id)
    {
        $cliente = $this->cliente->with('enderecoEnvio')->findOrFail($id);

        return view('sistema.clientes.show', compact('cliente'));
    }

    // Exibe o formulário de edição de um cliente
    public function edit($id)
    {
        // Recupera os dados do cliente e define a variável $checked
        $cliente = $this->cliente->with('enderecoCobranca', 'enderecoEnvio')->findOrFail($id);
        $checked = ($cliente['status'] == 'Ativo' ? 'checked="checked"' : '');
        $status = ($cliente['status'] == 'Ativo' ? '1' : '0');

        return view('sistema.clientes.edit', compact('cliente', 'checked', 'status'));
    }

    // Atualiza os dados de um cliente
    public function update(Request $request, $id)
    {
        $dataCliente = $request->all();
        $dataCliente['status'] = ($dataCliente['status'] == '1' ? '1' : '0');
        $dataCobranca = $request->only(['nome_cobrancas', 'sobrenome_cobrancas', 'cpf_cobrancas', 'cnpj_cobrancas', 'empresa_cobrancas', 'nascimento_cobrancas', 'sexo_cobrancas', 'rua_cobrancas', 'numero_cobrancas', 'complemento_cobrancas', 'bairro_cobrancas', 'cidade_cobrancas', 'cep_cobrancas', 'pais_cobrancas', 'estado_cobrancas', 'telefone_cobrancas', 'celular_cobrancas', 'email_cobrancas']);
        $dataEnvio = $request->only(['nome_envios', 'sobrenome_envios', 'empresa_envios', 'rua_envios', 'numero_envios', 'complemento_envios', 'bairro_envios', 'cidade_envios', 'cep_envios', 'pais_envios', 'estado_envios']);

        // Atualiza a imagem, se fornecida
        if (isset($dataCliente['imagem']) && $dataCliente['imagem'] != null) {
            $path = 'public/img/clientes/';
            $imageName = uniqid() . '-' . str_replace(" ", "-", trim($request->imagem->getClientOriginalName()));
            $request->imagem->storeAs($path, $imageName);
            $dataCliente['imagem'] = $imageName;
        }

        try {
            $clientes = $this->cliente->findOrFail($id);

            // Atualiza os dados do cliente e seus endereços relacionados
            $clientes->update($dataCliente);
            $clientes->enderecoCobranca()->update($dataCobranca);
            $clientes->enderecoEnvio()->update($dataEnvio);

            flash('Cliente atualizado com sucesso!')->success();
            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    // Remove um cliente
    public function destroy($id)
    {
        $cliente = $this->cliente->findOrFail($id);

        // Remove a imagem do cliente, se existir
        $image_path = storage_path('public/img/clientes/' . $cliente->imagem);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        try {
            // Remove o cliente
            $cliente->delete();

            flash('Cliente removido com sucesso!')->success();
            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    // Remove vários clientes selecionados
    public function multiDelete(Request $request)
    {
        $selectedIds = $request->get('selected');

        if ($selectedIds) {
            $this->cliente->whereIn('id', $selectedIds)->delete();
            return response("Clientes selecionados excluídos com sucesso.", 200);
        }

        return response("Nenhum cliente selecionado para exclusão.", 400);
    }
}
