<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--<a href="{{ route('dashboard') }}">
            <img alt="Logo" src="{{ asset('/assets/media/logos/default-dark.svg') }}"
                class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('/assets/media/logos/default-small.svg') }}"
                class="h-20px app-sidebar-logo-minimize" />
        </a>-->

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
            <div class="my-5 mx-3">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">

                    <x-menu-item icon="bi bi-person" title="Usuarios" route="usuarios" :showArrow="false" />

                    @if (auth()->user() && auth()->user()->roles->contains('name', 'Admin'))
                        <x-menu-item icon="bi bi-people fs-2" title="Clientes" route="clientes"
                            :subItems="[
                                ['title' => 'Todos Clientes', 'route' => 'clientes.index'],
                                ['title' => 'Adicionar Novo', 'route' => 'clientes.create'],
                            ]" />
                    @endif

                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Desenhos</span>
                        </div>
                    </div>

                    <x-menu-item icon="bi bi-card-list" title="Ideias / Briefing" route="ideias"
                        :subItems="[
                            ['title' => 'Todos Ideias', 'route' => 'ideias.index'],
                            ['title' => 'Adicionar Nova', 'route' => 'ideias.create'],
                        ]" />

                    <x-menu-item icon="bi bi-check-all" title="Aprovações" route="aprovacoes" :subItems="[
                        ['title' => 'Todos Aprovações', 'route' => 'aprovacoes.index'],
                        ['title' => 'Adicionar Nova', 'route' => 'aprovacoes.create'],
                    ]" />

                    @if (auth()->user() && auth()->user()->roles->contains('name', 'Admin'))
                        <div class="menu-item pt-5">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">Financeiro</span>
                            </div>
                        </div>

                        <x-menu-item icon="bi bi-cash-coin" title="Investimentos" route="aprovacoes.index"
                            :subItems="[
                                ['title' => 'Categoria Investimentos', 'route' => 'aprovacoes.index'],
                                ['title' => 'Todos Investimentos', 'route' => 'aprovacoes.index'],
                                ['title' => 'Adicionar Novo', 'route' => 'aprovacoes.index'],
                            ]" />

                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="bi bi-box-seam fs-2"></i>
                                </span>
                                <span class="menu-title">Produtos</span>
                                <span class="menu-arrow"></span>
                            </span>

                            <div class="menu-sub menu-sub-accordion" kt-hidden-height="128"
                                style="display: none; overflow: hidden;">
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
                        </div>

                        <x-menu-item icon="bi bi-piggy-bank" title="Vendas" route="aprovacoes.index"
                            :subItems="[
                                ['title' => 'Todas Vendas', 'route' => 'aprovacoes.index'],
                                ['title' => 'Adicionar Nova', 'route' => 'aprovacoes.create'],
                            ]" />


                        <div class="menu-item pt-5">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">Categoria</span>
                            </div>
                        </div>

                        <x-menu-item icon="bi bi-briefcase" title="Fornecedores" route="aprovacoes.index"
                            :subItems="[
                                ['title' => 'Todos Fornecedores', 'route' => 'aprovacoes.index'],
                                ['title' => 'Adicionar Novo', 'route' => 'aprovacoes.create'],
                            ]" />

                        <x-menu-item icon="bi bi-boxes" title="Pedidos" route="aprovacoes.index" :subItems="[
                            ['title' => 'Todos Pedidos', 'route' => 'aprovacoes.index'],
                            ['title' => 'Adicionar Novo', 'route' => 'aprovacoes.create'],
                        ]" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
