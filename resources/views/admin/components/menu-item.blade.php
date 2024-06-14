<div class="menu-item {{ Request::is($route . '*') ? 'here show' : '' }} {{ $showArrow ? 'menu-accordion' : '' }}"
    {{ $showArrow ? 'data-kt-menu-trigger="click"' : '' }}>
    @if (!empty($subItems))
        <span class="menu-link">
            <span class="menu-icon">
                <i class="{{ $icon }} fs-2"></i>
            </span>
            <span class="menu-title">{{ $title }}</span>
            @if ($showArrow)
                <span class="menu-arrow"></span>
            @endif
        </span>

        <div class="menu-sub menu-sub-accordion">
            @foreach ($subItems as $subItem)
                <div class="menu-item">
                    <a class="menu-link {{ Request::url() === route($subItem['route']) ? 'active' : '' }}"
                        href="{{ route($subItem['route']) }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ $subItem['title'] }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <a class="menu-link" href="{{ route($route . '.index') }}">
            <span class="menu-icon">
                <i class="{{ $icon }} fs-2"></i>
            </span>
            <span class="menu-title">{{ $title }}</span>
        </a>
    @endif
</div>
