@extends('admin.template.auth.master')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Sistema de Gerenciamento</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Faça login no Administrador</div>
                            </div>

                            @include('admin.template.auth.alerts')

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email ou Username" name="login"
                                    class="form-control bg-transparent" />
                            </div>

                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Senha" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                            </div>

                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="{{ route('password.forget') }}" class="link-primary">Esqueceu a senha ?</a>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
