<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{ route('dashboard') }}">
            <img alt="Logo" src="{{ asset('/assets/media/logos/default-dark.svg') }}"
                class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('/assets/media/logos/default-small.svg') }}"
                class="h-20px app-sidebar-logo-minimize" />
        </a>

        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>

    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">

                    <div class="menu-item {{ Request::is('usuarios*') ? 'here show' : '' }}">
                        <a class="menu-link" href="{{ route('usuarios.index') }}">
                            <span class="menu-icon">
                                <i class="bi bi-person fs-2"></i>
                            </span>
                            <span class="menu-title">Usuarios</span>
                        </a>
                    </div>

                    @can('admin')
                    <div data-kt-menu-trigger="click" class="menu-item {{ Request::is('clientes*') ? 'here show' : '' }} menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-people fs-2"></i>
                            </span>
                            <span class="menu-title">Clientes</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('clientes') ? 'active' : '' }}" href="{{ route('clientes.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todos Clientes</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('clientes/create') ? 'active' : '' }}" href="{{ route('clientes.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Adicionar Novo</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endcan

                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Desenhos</span>
                        </div>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item {{ Request::is('ideias*') ? 'here show' : '' }} menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-card-list fs-2"></i>
                            </span>
                            <span class="menu-title">Ideias / Briefing</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('ideias') ? 'active' : '' }}" href="{{ route('ideias.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todas Ideias</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('ideias/create') ? 'active' : '' }}" href="{{ route('ideias.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Adicionar Nova</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item {{ Request::is('aprovacoes*') ? 'here show' : '' }} menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-check-all fs-2"></i>
                            </span>
                            <span class="menu-title">Aprovações</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('aprovacoes') ? 'active' : '' }}" href="{{ route('aprovacoes.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todas Aprovações</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('aprovacoes/create') ? 'active' : '' }}" href="{{ route('aprovacoes.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Adicionar Nova</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    @can('admin')
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Financeiro</span>
                        </div>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-cash-coin fs-2"></i>
                            </span>
                            <span class="menu-title">Investimentos</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Categoria Investimentos</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todos Investimentos</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Adicionar Novo</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-box-seam fs-2"></i>
                            </span>
                            <span class="menu-title">Produtos</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion" kt-hidden-height="128" style="display: none; overflow: hidden;">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                <span class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Atributos</span>
                                    <span class="menu-arrow"></span>
                                </span>

                                <div class="menu-sub menu-sub-accordion" kt-hidden-height="83"
                                    style="display: none; overflow: hidden;">
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Tamanhos</span>
                                        </a>
                                    </div>

                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Tipos dos produtos</span>
                                        </a>
                                    </div>

                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Cores das camisetas</span>
                                        </a>
                                    </div>

                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Cores das estampas</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todos Produtos</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Adicionar Novo</span>
                                </a>
                            </div>
                        </div>

                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="bi bi-piggy-bank fs-2"></i>
                                </span>
                                <span class="menu-title">Vendas</span>
                                <span class="menu-arrow"></span>
                            </span>

                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Todas Vendas</span>
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Adicionar Nova</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Categoria</span>
                        </div>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-briefcase fs-2"></i>
                            </span>
                            <span class="menu-title">Fornecedores</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todos Fornecedores</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Adicionar Novo</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-boxes fs-2"></i>
                            </span>
                            <span class="menu-title">Pedidos</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todos Pedidos</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Adicionar Novo</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
