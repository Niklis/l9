<header class="header">
    <nav class="navbar w-100 py-0 navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container mw-100">

            <!-- Sidebar Toggler -->
            <button type="button" id="sidebarToggler" class="btn p-0 border-0">
                <i class="bi bi-bootstrap"></i>
            </button>

            <!-- Mobile menu Toggler-->
            <button class="d-lg-none btn btn-warning" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobile-menu" aria-controls="mobile-menu">{{ __('Show navbar') }}</button>

            <!-- Mobile menu -->
            <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobile-menu"
                aria-labelledby="mobile-menu-label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="mobile-menu-label">{{ __('Mobile-menu') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <nav class="offcanvas-body">
                    @if (count($mainMenu) > 0)
                        <ul class="nav list-group">
                            @foreach ($mainMenu as $item)
                                @include('layouts/includes/particles/aside-menu', $item)
                            @endforeach
                        </ul>
                    @endif
                </nav>
            </div>

            <!-- Top menu -->
            <nav id="topbar" class="topbar me-auto">
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
