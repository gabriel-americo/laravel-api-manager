@extends('admin.template.auth.master')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" action="{{ route('password.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-dark fw-bolder mb-3">Esqueceu a Senha ?</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Insira seu e-mail para redefinir sua senha.
                                </div>
                            </div>

                            @include('admin.template.auth.alerts')

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email" name="email"
                                    class="form-control bg-transparent" />
                            </div>

                            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                <button type="submit" class="btn btn-primary me-4">
                                    <span class="indicator-label">Enviar</span>
                                </button>
                                <a href="{{ route('login') }}" class="btn btn-light">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
