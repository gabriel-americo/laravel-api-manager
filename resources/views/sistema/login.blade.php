<!DOCTYPE html>
<html lang="pt">

<head>
    <base href="../../../" />
    <title>Sistema de Gerenciamento | E-commerce</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="refresh" content="600">

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="app-blank">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <a href="#" class="d-block d-lg-none mx-auto py-20">
                <img alt="Logo" src="{{ asset('assets/media/logos/default.svg') }}" class="theme-light-show h-25px" />
            </a>

            <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                    <div class="d-flex flex-stack py-2"></div>

                    <div class="py-20">
                        <form action="{{ route('login') }}" class="form w-100" novalidate="novalidate" method="POST">
                            <div class="card-body">
                                <div class="text-start mb-10">
                                    <h1 class="text-dark mb-3 fs-3x">Sistema de Gerenciamento</h1>
                                    <div class="text-gray-400 fw-semibold fs-6">Faça login no Administrador</div>
                                </div>

                                @if ($errors->all())
									@foreach ($errors->all() as $error)
										<div class="alert alert-danger">
											{{ $error }}
										</div>
									@endforeach
								@endif

                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Email ou Username" name="login" autocomplete="off" class="form-control form-control-solid" />
                                </div>

                                <div class="fv-row mb-7">
                                    <input type="password" placeholder="Senha" name="password" autocomplete="off" class="form-control form-control-solid" />
                                </div>

                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                                    <div></div>
                                    <a href="#" class="link-primary">Esqueceu a senha?</a>
                                </div>

                                <div class="d-flex flex-stack">
                                    <button class="btn btn-primary me-2 flex-shrink-0">
                                        <span class="indicator-label">Login</span>
                                    </button>

                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6">Ou</div>
                                        <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                                            <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="p-4" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>

                    <div class="m-0"></div>
                </div>
            </div>

            <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url(assets/media/auth/bg11.png)"></div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" ></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}" ></script>
</body>

</html>
