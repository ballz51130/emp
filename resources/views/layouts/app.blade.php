<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @guest

                @else
                @if(Auth::user()->type == 1)
                <a class="navbar-brand ml-3" href="{{ url('admin/mainadmin') }}">
                    หน้าแรก
                </a>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        จัดการ
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('admin/manageuser') }}"> พนักงาน </a>
                        <a class="dropdown-item" href="{{ url('admin/manageposition') }}"> ตำแหน่งาน</a>
                        <a class="dropdown-item" href="{{ url('admin/managedepartment') }}">ฝ่าย / แผนก</a>
                    </div>
                </div>
                <a class="navbar-brand ml-3" href="{{ url('admin\export') }}">
                    Report
                </a>
                @else
                <a class="navbar-brand ml-3" href="{{ url('/home') }}">
                    หน้าแรก
                </a>
                <a class="navbar-brand ml-3" href="{{ url('/profile') }}">
                    Profile
                </a>
                <a class="navbar-brand ml-3" href="{{ url('/leave') }}">
                    การลา
                </a>
                @endif
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <!-- alert -->
        @if(session()->has('jsAlert'))
        <script>
            alert("{{ session()->get('jsAlert') }}");

        </script>
        @endif
        <script>
            $('.form-group row').change(function () {
                $(this).find('.is-invalid').removeClass('is-invalid');
                $(this).find('message').remove();
            });

        </script>
    </div>
</body>

</html>
