<!DOCTYPE html>
<html lang="pt">

<head>
    <base href="../../../" />
    <title>Sistema de Gerenciamento | CMS</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="refresh" content="600">

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="app-blank">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" action="{{ route("password.reset.post") }}" method="POST">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-dark fw-bolder mb-3">Configurar nova senha</h1>

                                <div class="text-gray-500 fw-semibold fs-6">Você já redefiniu a senha?
                                <a href="{{ route("login") }}" class="link-primary fw-bold">Entrar</a></div>
                            </div>

                            @if ($errors->all())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <input type="text" hidden name="token" value="{{ $token }}">

                            <div class="mb-3">
                                <input class="form-control bg-transparent" type="text" placeholder="E-mail" name="email" />
                            </div>

                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">

                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" id="newpassword" type="password" placeholder="Senha" name="password" autocomplete="off" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="ki-duotone ki-eye-slash fs-2"></i>
                                            <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>

                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>

                                <div class="text-muted">Use 6 ou mais caracteres com uma mistura de letras, números e símbolos.</div>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="password" id="confirmpassword" placeholder="Repetir Senha" name="confirm-password" autocomplete="off" class="form-control bg-transparent" />
                            </div>

                            <div class="d-grid mb-10">
                                <button id="btnAtualizarSenha" type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Enviar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
                    <div class="me-10">
                        <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            data-kt-menu-offset="0px, 0px">
                            <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3"
                                src="{{ asset('/assets/media/flags/brazil.svg') }}" alt="" />
                            <span data-kt-element="current-lang-name" class="me-1">Português</span>
                            <span class="d-flex flex-center rotate-180">
                                <i class="ki-duotone ki-down fs-5 text-muted m-0"></i>
                            </span>
                        </button>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7"
                            data-kt-menu="true" id="kt_auth_lang_menu">
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="Português">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1"
                                            src="{{ asset('/assets/media/flags/brazil.svg') }}" alt="" />
                                    </span>
                                    <span data-kt-element="lang-name">Português</span>
                                </a>
                            </div>

                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="Ingles">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1"
                                            src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />
                                    </span>
                                    <span data-kt-element="lang-name">Inglês</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#newpassword, #confirmpassword').on('input', function() {
                var newPassword = $('#newpassword').val();
                var confirmPassword = $('#confirmpassword').val();

                $('#confirmpassword').toggleClass('is-valid', newPassword === confirmPassword);
                $('#confirmpassword').toggleClass('is-invalid', newPassword !== confirmPassword);

                var isConfirmPasswordValid = $('#confirmpassword').hasClass('is-valid');

                // Desabilitar o botão de atualizar se o campo de confirmação de senha não for válido
                $('#btnAtualizarSenha').prop('disabled', !isConfirmPasswordValid);
            });
        });
    </script>
</body>

</html>
