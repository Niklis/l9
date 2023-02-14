 <!-- Sidebar  -->
 <aside id="sidebar" class="sidebar">
     <div class="sidebar__header d-flex justify-content-center p-2">
         <a class="navbar-brand" href="{{ url('/') }}">
             {{ config('app.name', 'Laravel') }}
         </a>
     </div>

     <nav class="sidebar__nav">
         <!-- Aside menu -->
         @if (count($mainMenu) > 0)
             <ul class="nav list-group">
                 @foreach ($mainMenu as $item)
                     @include('layouts/includes/particles/aside-menu', $item)
                 @endforeach
             </ul>
         @endif
     </nav>

     <div class="sidebar__footer d-flex justify-content-start p-2">
         FOOTER
     </div>
 </aside>
