@extends('sistema.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Detalhe do
                        Cliente</h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <span class="text-hover-primary">Clientes</span>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Visualização</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body pt-15">
                                <div class="d-flex flex-center flex-column mb-5">
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <img src="{{ $cliente->imagem ? asset('storage/img/clientes/' . $cliente->imagem) : asset('assets/media/svg/avatars/blank.svg') }}"
                                            alt="{{ $cliente->nome }}" />
                                    </div>

                                    <span
                                        class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ $cliente->nome }}
                                        {{ $cliente->sobrenome }}</span>

                                    <div class="fs-5 fw-semibold text-muted mb-6">Software Enginer</div>

                                    <div class="d-flex flex-wrap flex-center">
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-75px">5</span>
                                            </div>
                                            <div class="fw-semibold text-muted">Compras</div>
                                        </div>

                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">R$ 130.00</span>
                                            </div>
                                            <div class="fw-semibold text-muted">Total Gasto</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                        href="#kt_customer_view_details" role="button" aria-expanded="false"
                                        aria-controls="kt_customer_view_details">Detalhes
                                        <span class="ms-2 rotate-180">
                                            <i class="ki-duotone ki-down fs-3"></i>
                                        </span>
                                    </div>
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Editar detalhes do cliente">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                            class="btn btn-sm btn-light-primary">Editar</a>
                                    </span>
                                </div>

                                <div class="separator separator-dashed my-3"></div>

                                <div id="kt_customer_view_details" class="collapse show">
                                    <div class="py-5 fs-6">
                                        <div
                                            class="badge {{ $cliente->status == 'Ativo' ? 'badge-light-success' : 'badge-light-danger' }} d-inline">
                                            {{ $cliente->status }}</div>

                                        <div class="fw-bold mt-5">Usuario</div>
                                        <div class="text-gray-600">{{ $cliente->user }}</div>

                                        <div class="fw-bold mt-5">Email</div>
                                        <div class="text-gray-600">{{ $cliente->email }}</div>

                                        <div class="fw-bold mt-5">Endereço</div>
                                        <div class="text-gray-600">{{ $cliente->enderecoEnvio->rua_envios }} {{ $cliente->enderecoEnvio->numero_envios }},
                                            <br />{{ $cliente->enderecoEnvio->bairro_envios }} {{ $cliente->enderecoEnvio->complemento_envios }}
                                            <br />{{ $cliente->enderecoEnvio->pais_envios }}
                                        </div>

                                        <div class="fw-bold mt-5">Site</div>
                                        <div class="text-gray-600">{{ $cliente->site }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-lg-row-fluid ms-lg-15">
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">

                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_customer_view_overview_tab">Compras</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                                <div class="card pt-2 mb-6 mb-xl-9">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h2>Invoices</h2>
                                        </div>

                                        <div class="card-toolbar m-0">
                                            <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs nav-line-tabs-2x border-transparent"
                                                role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_referrals_year_tab"
                                                        class="nav-link text-active-primary active" data-bs-toggle="tab"
                                                        role="tab" href="#kt_customer_details_invoices_1">This Year</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3"
                                                        data-bs-toggle="tab" role="tab"
                                                        href="#kt_customer_details_invoices_2">2020</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_referrals_2018_tab" class="nav-link text-active-primary ms-3"
                                                        data-bs-toggle="tab" role="tab"
                                                        href="#kt_customer_details_invoices_3">2019</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_referrals_2017_tab"
                                                        class="nav-link text-active-primary ms-3" data-bs-toggle="tab"
                                                        role="tab" href="#kt_customer_details_invoices_4">2018</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0">
                                        <div id="kt_referred_users_tab_content" class="tab-content">
                                            <div id="kt_customer_details_invoices_1"
                                                class="py-0 tab-pane fade show active" role="tabpanel">
                                                <table id="kt_customer_details_invoices_table_1"
                                                    class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                                    <thead
                                                        class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                                        <tr class="text-start text-muted gs-0">
                                                            <th class="min-w-100px">Order ID</th>
                                                            <th class="min-w-100px">Amount</th>
                                                            <th class="min-w-100px">Status</th>
                                                            <th class="min-w-125px">Date</th>
                                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">102445788</a>
                                                            </td>
                                                            <td class="text-success">$38.00</td>
                                                            <td>
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">423445721</a>
                                                            </td>
                                                            <td class="text-danger">$-2.60</td>
                                                            <td>
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td>
                                                            <td>Oct 24, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$76.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Oct 08, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$5.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Sep 15, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">523445943</a>
                                                            </td>
                                                            <td class="text-danger">$-1.30</td>
                                                            <td>
                                                                <span class="badge badge-light-info">In progress</span>
                                                            </td>
                                                            <td>May 30, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">231445943</a>
                                                            </td>
                                                            <td class="text-success">$204.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Apr 22, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">426445943</a>
                                                            </td>
                                                            <td class="text-success">$31.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Feb 09, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">984445943</a>
                                                            </td>
                                                            <td class="text-success">$52.00</td>
                                                            <td>
                                                                <span class="badge badge-light-info">In progress</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">324442313</a>
                                                            </td>
                                                            <td class="text-danger">$-0.80</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Jan 04, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div id="kt_customer_details_invoices_2" class="py-0 tab-pane fade"
                                                role="tabpanel">
                                                <table id="kt_customer_details_invoices_table_2"
                                                    class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                                    <thead
                                                        class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                                        <tr class="text-start text-muted gs-0">
                                                            <th class="min-w-100px">Order ID</th>
                                                            <th class="min-w-100px">Amount</th>
                                                            <th class="min-w-100px">Status</th>
                                                            <th class="min-w-125px">Date</th>
                                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">523445943</a>
                                                            </td>
                                                            <td class="text-danger">$-1.30</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>May 30, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">231445943</a>
                                                            </td>
                                                            <td class="text-success">$204.00</td>
                                                            <td>
                                                                <span class="badge badge-light-info">In progress</span>
                                                            </td>
                                                            <td>Apr 22, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">426445943</a>
                                                            </td>
                                                            <td class="text-success">$31.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Feb 09, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">984445943</a>
                                                            </td>
                                                            <td class="text-success">$52.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">324442313</a>
                                                            </td>
                                                            <td class="text-danger">$-0.80</td>
                                                            <td>
                                                                <span class="badge badge-light-info">In progress</span>
                                                            </td>
                                                            <td>Jan 04, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">102445788</a>
                                                            </td>
                                                            <td class="text-success">$38.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">423445721</a>
                                                            </td>
                                                            <td class="text-danger">$-2.60</td>
                                                            <td>
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td>
                                                            <td>Oct 24, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$76.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Oct 08, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$5.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Sep 15, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div id="kt_customer_details_invoices_3" class="py-0 tab-pane fade"
                                                role="tabpanel">
                                                <table id="kt_customer_details_invoices_table_3"
                                                    class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                                    <thead
                                                        class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                                        <tr class="text-start text-muted gs-0">
                                                            <th class="min-w-100px">Order ID</th>
                                                            <th class="min-w-100px">Amount</th>
                                                            <th class="min-w-100px">Status</th>
                                                            <th class="min-w-125px">Date</th>
                                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">426445943</a>
                                                            </td>
                                                            <td class="text-success">$31.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Feb 09, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">984445943</a>
                                                            </td>
                                                            <td class="text-success">$52.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">324442313</a>
                                                            </td>
                                                            <td class="text-danger">$-0.80</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Jan 04, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$5.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Sep 15, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">102445788</a>
                                                            </td>
                                                            <td class="text-success">$38.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">423445721</a>
                                                            </td>
                                                            <td class="text-danger">$-2.60</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Oct 24, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$76.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Oct 08, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">523445943</a>
                                                            </td>
                                                            <td class="text-danger">$-1.30</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>May 30, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">231445943</a>
                                                            </td>
                                                            <td class="text-success">$204.00</td>
                                                            <td>
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td>
                                                            <td>Apr 22, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div id="kt_customer_details_invoices_4" class="py-0 tab-pane fade"
                                                role="tabpanel">
                                                <table id="kt_customer_details_invoices_table_4"
                                                    class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                                    <thead
                                                        class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                                        <tr class="text-start text-muted gs-0">
                                                            <th class="min-w-100px">Order ID</th>
                                                            <th class="min-w-100px">Amount</th>
                                                            <th class="min-w-100px">Status</th>
                                                            <th class="min-w-125px">Date</th>
                                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">102445788</a>
                                                            </td>
                                                            <td class="text-success">$38.00</td>
                                                            <td>
                                                                <span class="badge badge-light-info">In progress</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">423445721</a>
                                                            </td>
                                                            <td class="text-danger">$-2.60</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Oct 24, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">102445788</a>
                                                            </td>
                                                            <td class="text-success">$38.00</td>
                                                            <td>
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">423445721</a>
                                                            </td>
                                                            <td class="text-danger">$-2.60</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Oct 24, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">426445943</a>
                                                            </td>
                                                            <td class="text-success">$31.00</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Feb 09, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">984445943</a>
                                                            </td>
                                                            <td class="text-success">$52.00</td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td>Nov 01, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">324442313</a>
                                                            </td>
                                                            <td class="text-danger">$-0.80</td>
                                                            <td>
                                                                <span class="badge badge-light-danger">Rejected</span>
                                                            </td>
                                                            <td>Jan 04, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$76.00</td>
                                                            <td>
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td>
                                                            <td>Oct 08, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-gray-600 text-hover-primary">312445984</a>
                                                            </td>
                                                            <td class="text-success">$76.00</td>
                                                            <td>
                                                                <span class="badge badge-light-info">In progress</span>
                                                            </td>
                                                            <td>Oct 08, 2020</td>
                                                            <td class="text-end">
                                                                <button
                                                                    class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
