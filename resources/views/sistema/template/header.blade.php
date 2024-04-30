<div class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}"
    data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}"
    data-kt-sticky-animation="false">
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>

        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="#" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}" class="h-30px" />
            </a>
        </div>

        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">

            <div class="app-header-menu app-header-mobile-drawer align-items-stretch"></div>

            <div class="app-navbar flex-shrink-0">
                <div class="app-navbar-item ms-1 ms-md-4">
                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
                        <i class="ki-duotone ki-notification-status fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true"
                        id="kt_menu_notifications">
                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                            style="background-image:url('{{ asset('assets/media/misc/menu-header-bg.jpg') }}')">
                            <h3 class="text-white fw-semibold px-9 mt-10 mb-6">Notificações
                                <span class="fs-8 opacity-75 ps-3">5 relatórios</span>
                            </h3>

                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9">
                                <li class="nav-item">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active"
                                        data-bs-toggle="tab" href="#kt_topbar_notifications_1">Alertas</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                                <div class="scroll-y mh-325px my-5 px-8">
                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-warning">
                                                    <i class="bi bi-lightbulb fs-2 text-warning"></i>
                                                </span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary fw-bold">Project
                                                    Redux</a>
                                                <div class="text-gray-400 fs-7">New frontend admin theme</div>
                                            </div>
                                        </div>

                                        <span class="badge badge-light fs-8">2 days</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-success">
                                                    <i class="bi bi-lightbulb fs-2 text-success"></i>
                                                </span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary fw-bold">Project
                                                    Breafing</a>
                                                <div class="text-gray-400 fs-7">Product launch status update</div>
                                            </div>
                                        </div>

                                        <span class="badge badge-light fs-8">21 Jan</span>
                                    </div>
                                </div>

                                <div class="py-3 text-center border-top">
                                    <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">Ver Todos
                                        <i class="ki-duotone ki-arrow-right fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-35px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        @if (Auth::user()->imagem && File::exists(public_path('storage/img/usuarios/' . Auth::user()->imagem)))
                            <img src="{{ asset('storage/img/usuarios/' . Auth::user()->imagem) }}"
                                alt="{{ Auth::user()->nome }}" class="rounded-3" />
                        @else
                            <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="{{ Auth::user()->nome }}"
                                class="w-100" />
                        @endif
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    @if (Auth::user()->imagem && File::exists(public_path('storage/img/usuarios/' . Auth::user()->imagem)))
                                        <img src="{{ asset('storage/img/usuarios/' . Auth::user()->imagem) }}"
                                            alt="{{ Auth::user()->nome }}" />
                                    @else
                                        <img src="{{ asset('assets/media/avatars/blank.png') }}"
                                            alt="{{ Auth::user()->nome }}" class="w-100" />
                                    @endif
                                </div>

                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ strtok(Auth::user()->nome, ' ') }}
                                        <span
                                            class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ Auth::user()->roles->first()->nome }}</span>
                                    </div>
                                    <a href="#"
                                        class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5">
                            <a href="{{ route('usuarios.show', Auth::user()->id) }}" class="menu-link px-5">Meu
                                Perfil</a>
                        </div>

                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-text">Minhas Ideias</span>
                                <span class="menu-badge">
                                    <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                </span>
                            </a>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">Linguagem
                                    <span
                                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">Português
                                        <img class="w-15px h-15px rounded-1 ms-2"
                                            src="{{ asset('/assets/media/flags/brazil.svg') }}"
                                            alt="" /></span></span>
                            </a>
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link d-flex px-5 active">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1"
                                                src="{{ asset('/assets/media/flags/brazil.svg') }}" alt="" />
                                        </span>Português</a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link d-flex px-5">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1"
                                                src="{{ asset('assets/media/flags/united-states.svg') }}"
                                                alt="" />
                                        </span>Inglês</a>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item px-5">
                            <a href="{{ route('logout') }}" class="menu-link px-5">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="app-wrapper flex-column flex-row-fluid">
    @include('sistema.template.menu')
    <div class="app-main flex-column flex-row-fluid">
