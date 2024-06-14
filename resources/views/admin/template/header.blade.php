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
                <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-35px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img src="{{ asset(Auth::user()->getProfileImage()) }}" alt="{{ Auth::user()->nome }}" class="rounded-3" />
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{ asset(Auth::user()->getProfileImage()) }}" alt="{{ Auth::user()->nome }}" class="rounded-3" />
                                </div>

                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ strtok(Auth::user()->nome, ' ') }}
                                        <span
                                            class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ Auth::user()->roles->first()->nome }}</span>
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5">
                            <a href="{{ route('usuarios.show', Auth::user()->id) }}" class="menu-link px-5">Meu Perfil</a>
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
                            <a href="{{ route('login.destroy') }}" class="menu-link px-5">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="app-wrapper flex-column flex-row-fluid">
    @include('admin.template.menu')
    <div class="app-main flex-column flex-row-fluid">
