<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->all();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? '1' : '0';
        $dataCobranca = $request->only(['nome_cobrancas', 'sobrenome_cobrancas', 'cpf_cobrancas', 'cnpj_cobrancas', 'empresa_cobrancas', 'nascimento_cobrancas', 'sexo_cobrancas', 'rua_cobrancas', 'numero_cobrancas', 'complemento_cobrancas', 'bairro_cobrancas', 'cidade_cobrancas', 'cep_cobrancas', 'pais_cobrancas', 'estado_cobrancas', 'telefone_cobrancas', 'celular_cobrancas', 'email_cobrancas']);
        $dataEnvio = $request->only(['nome_envios', 'sobrenome_envios', 'empresa_envios', 'rua_envios', 'numero_envios', 'complemento_envios', 'bairro_envios', 'cidade_envios', 'cep_envios', 'pais_envios', 'estado_envios']);

        if ($request->hasFile('imagem')) {
            $path = 'public/img/clientes/';
            $imageName = uniqid() . '-' . str_replace(" ", "-", trim($request->imagem->getClientOriginalName()));
            $request->imagem->storeAs($path, $imageName);
            $data['imagem'] = $imageName;
        }

        try {
            $cliente = $this->customer->create($data);
            $cliente->enderecoCobranca()->create($dataCobranca);
            $cliente->enderecoEnvio()->create($dataEnvio);

            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
       
    }

    public function show($id)
    {
        $cliente = $this->customer->with('addresses')->findOrFail($id);
        return view('admin.clientes.show', compact('cliente'));
    }


    public function edit($id)
    {
        $customer = $this->customer->with('addresses', 'shippings')->findOrFail($id);
        $checked = ($customer['status'] == 'Ativo' ? 'checked="checked"' : '');
        $status = ($customer['status'] == 'Ativo' ? '1' : '0');

        return view('admin.customers.edit', compact('customer', 'checked', 'status'));
    }


    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
       
    }

    public function destroy(Customer $customer)
    {
       
    }
}
