@if (count($item['children']) == 0)
    <li>
        <a class="nav-link @if($item['active']) nav-link--active @endif" href="{{ $item['url'] }}">{{ $item['title'] }}</a>
    </li>
@else
    <li class="has-submenu">
        <a class="nav-link @if($item['active']) nav-link--open @endif" href="javascript:void(0);">
            <span>{{ $item['title'] }}</span>
            <i class="bi bi-chevron-right"></i>
        </a>
        <ul class="submenu list-group collapse @if($item['active']) show @endif">
        @foreach ($item['children'] as $item)
            @include('layouts/includes/particles/aside-menu', $item)
        @endforeach
        </ul>
    </li>
@endif
