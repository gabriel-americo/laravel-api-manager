@extends('admin.template.auth.master')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" action="{{ route('password.reset.store') }}"
                            method="POST">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-dark fw-bolder mb-3">{{ __('Reset Password') }}</h1>

                                <div class="text-gray-500 fw-semibold fs-6">{{ __('Already reset password?') }}
                                    <a href="{{ route('login') }}" class="link-primary fw-bold">{{ __('Login') }}</a>
                                </div>
                            </div>

                            @include('admin.template.auth.alerts')

                            <input type="text" hidden name="token" value="{{ $token }}">

                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">

                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" id="newpassword" type="password"
                                            placeholder="{{ __('Password') }}" name="password" autocomplete="off" />
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-duotone ki-eye-slash fs-2"></i>
                                            <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>

                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>

                                <div class="text-muted">Use 6 ou mais caracteres com uma mistura de letras, números e
                                    símbolos.</div>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="password" id="confirmpassword" placeholder="Repetir Senha"
                                    name="confirm-password" autocomplete="off" class="form-control bg-transparent" />
                            </div>

                            <div class="d-grid mb-10">
                                <button id="btnAtualizarSenha" type="submit" class="btn btn-primary">
                                    <span class="indicator-label">{{ __('Submit') }}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
