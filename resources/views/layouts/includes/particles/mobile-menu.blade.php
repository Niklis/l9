<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobile-menu" aria-labelledby="mobile-menu-label">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobile-menu-label">Mobile-menu</h5>
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
