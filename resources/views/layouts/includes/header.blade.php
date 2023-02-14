<header class="header">
    <nav class="navbar w-100 py-0 navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container mw-100">

            <!-- Sidebar Toggler -->
            <button type="button" id="sidebarToggler" class="btn p-0 border-0">
                <i class="bi bi-bootstrap"></i>
            </button>

            <!-- Mobile menu Toggler-->
            {{-- <button data-trigger="navbar_main" class="d-lg-none btn btn-warning" type="button">Show navbar</button> --}}
            <button class="d-lg-none btn btn-warning" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobile-menu" aria-controls="mobile-menu">Show navbar</button>
            <!-- Mobile menu -->
            @include('layouts/includes/particles/mobile-menu')

            <nav id="topbar" class="topbar me-auto">
                <!-- Top menu -->
                @if (count($mainMenu) > 0)
                    <ul class="navbar-nav">
                        @foreach ($mainMenu as $item)
                            @include('layouts/includes/particles/top-menu')
                        @endforeach
                    </ul>
                @endif
            </nav>

            <!-- Settings Toggler -->
            <button class="bi bi-gear btn btn-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#settings-menu" aria-controls="settings-menu"></button>

            <!-- User menu -->
            @include('layouts/includes/particles/user-menu')

        </div>
    </nav>
    <!-- Settings menu -->
    @include('layouts/includes/particles/settings-menu')
</header>
