@if ($item['depth'] == 0)
    @if (count($item['children']) == 0)
        <li class="nav-item @if ($item['active']) active @endif">
            <a class="nav-link" href="{{ $item['url'] }}">{{ $item['title'] }}</a>
        </li>
    @else
        <li class="nav-item dropdown @if ($item['active']) active @endif">
            <a class="nav-link dropdown-toggle" href="javascript:void(0);"
                data-bs-toggle="dropdown">{{ $item['title'] }}</a>
            <ul class="dropdown-menu">
                @foreach ($item['children'] as $item)
                    @include('layouts/includes/particles/top-menu', $item)
                @endforeach
            </ul>
        </li>
    @endif
@else
    @if (count($item['children']) == 0)
        <li class="@if ($item['active']) active @endif">
            <a class="dropdown-item" href="{{ $item['url'] }}">{{ $item['title'] }}</a>
            @if ($item['active'])
                <span class="bi bi-dot"></span>
            @endif
        </li>
    @else
        <li class="@if ($item['active']) active @endif">
            <a class="dropdown-item" href="javascript:void(0);">{{ $item['title'] }} &raquo;</a>
            @if ($item['active'])
                <span class="bi bi-dot"></span>
            @endif
            <ul class="submenu dropdown-menu">
                @foreach ($item['children'] as $item)
                    @include('layouts/includes/particles/top-menu', $item)
                @endforeach
            </ul>
        </li>
    @endif
@endif
