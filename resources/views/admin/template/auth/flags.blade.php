<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
    <div class="me-10">
        <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base"
            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
            data-kt-menu-offset="0px, 0px">
            <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3"
                src="{{ asset('/assets/media/flags/' . $languageConfig['flag']) }}" alt="" />
            <span data-kt-element="current-lang-name" class="me-1">{{ $languageConfig['name'] }}</span>
            <span class="d-flex flex-center rotate-180">
                <i class="ki-duotone ki-down fs-5 text-muted m-0"></i>
            </span>
        </button>

        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7"
            data-kt-menu="true" id="kt_auth_lang_menu">
            <div class="menu-item px-3">
                <a href="{{ route('lang.switch', 'pt_BR') }}" class="menu-link d-flex px-5" data-kt-lang="Português">
                    <span class="symbol symbol-20px me-4">
                        <img data-kt-element="lang-flag" class="rounded-1"
                            src="{{ asset('/assets/media/flags/brazil.svg') }}" alt="" />
                    </span>
                    <span data-kt-element="lang-name">Português</span>
                </a>
            </div>

            <div class="menu-item px-3">
                <a href="{{ route('lang.switch', 'en') }}" class="menu-link d-flex px-5" data-kt-lang="Ingles">
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