<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    {{-- <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    @yield('headerStyle')

    @livewireStyles
</head>

<body>
    <script>
        var __logs = false;

        function setSideBarState(state = 'sidebar--open', removeExistingState = true) {
            let rootClassList = document.body.classList;
            //remove all 'sidebar--' classes
            removeExistingState && rootClassList.forEach(item => item.startsWith('sidebar--') && rootClassList.remove(
            item));
            //set sidebar state
            state && rootClassList.add(...state.split(' '));
            //save to localstorage    
            localStorage.setItem('sidebar-state', state);
            __logs && console.log('Sidebar-state:', state);
        }

        //Sidebar state or default
        setSideBarState(localStorage.getItem('sidebar-state'));
    </script>

    <span class="screen-darken"></span>
    
    <!-- Content  -->
    <div class="wrapper-horizontal">

        <!-- sidebar -->
        @include('layouts/includes/aside')

        <div class="wrapper-vertical w-100">

            <!-- header -->
            @include('layouts/includes/header')

            <main class="main py-4 w-100">
                @yield('content')
            </main>

            <!-- footer -->
            @include('layouts/includes/footer')
        </div>
    </div>

    @yield('footerScript')

    @livewireScripts

    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>
