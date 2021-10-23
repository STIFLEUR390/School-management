@props(['route', 'sub', 'icon'])

@isset($icon)
    <li class="{{ currentRouteActive($route) }}">
        <a href="{{ route($route) }}">
            <i class="{{ $icon }}"></i>
            <span>{{ $slot }}</span>
        </a>
    </li>
@endisset

@isset($sub)
    <li class="{{ currentRouteActive($route) }}">
        <a href="{{ route($route) }}">
            <i class="icon-Commit">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            {{ $slot }}
        </a>
    </li>
@endisset
