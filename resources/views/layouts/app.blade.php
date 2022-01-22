<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title','Site')</title>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')


    @livewireStyles
</head>
<body>
    <div id="app">


        <nav class="navbar navbar-expand-lg   navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        {{-- All links--}}

                        <!--start dropdown links Make -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Make
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('code.make.index') }}">Make All</a></li>
                                <li><a class="dropdown-item" href="{{ route('code.make.create') }}">Make Create</a></li>
                                <li><a class="dropdown-item" href="{{ route('code.make.edit') }}">Make Edit</a></li>
                                <li><a class="dropdown-item" href="{{ route('code.make.show') }}">Make Show</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                {{-- Create Link--}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('code.form.create') }}">
                                        {{ __('Create Form') }}</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('code.strapi.create') }}">Strapi Create</a></li>@
                            </ul>
                        </li>
                        <!--end dropdown links Make -->
                        {{-- All links--}}

                        <!--start dropdown links Project -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Project
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('code.project.index') }}">Project All</a></li>
                                <li><a class="dropdown-item" href="{{ route('code.project.create') }}">Project Create</a></li>
                                <li><a class="dropdown-item" href="{{ route('code.project.edit') }}">Project Edit</a></li>
                                <li><a class="dropdown-item" href="{{ route('code.project.show') }}">Project Show</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <!--end dropdown links Project -->


                        {{-- All links--}}

                        <!--start dropdown links Bank -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Bank
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('code.bank.index') }}">Bank All</a></li>

                                <li><a class="dropdown-item" href="{{ route('backups') }}">Backup</a></li>
                                {{-- <li><a class="dropdown-item" href="{{ route('code.bank.create') }}">Bank Create</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('code.bank.edit') }}">Bank Edit</a></li>
                        <li><a class="dropdown-item" href="{{ route('code.bank.show') }}">Bank Show</a></li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <!--end dropdown links Bank -->

                    <!--start dropdown links Post -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Post
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('stor.post.index') }}">Post All</a></li>
                            <li><a class="dropdown-item" href="{{ route('stor.post.create') }}">Post Create</a></li>
                            <li><a class="dropdown-item" href="{{ route('stor.post.edit') }}">Post Edit</a></li>
                            <li><a class="dropdown-item" href="{{ route('stor.post.show') }}">Post Show</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <!--end dropdown links Post -->
                    <!--start dropdown links Category -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('test.category.index') }}">Category All</a></li>
                            <li><a class="dropdown-item" href="{{ route('test.category.create') }}">Category Create</a></li>
                            <li><a class="dropdown-item" href="{{ route('test.category.edit') }}">Category Edit</a></li>
                            <li><a class="dropdown-item" href="{{ route('test.category.show') }}">Category Show</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <!--end dropdown links Category -->



                    </ul>
                    </li>

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    </div>
    @livewireScripts
</body>
</html>
