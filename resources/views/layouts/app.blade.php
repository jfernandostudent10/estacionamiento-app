<!DOCTYPE html>
<html lang="es" data-footer="true">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>UTP+ Estacionamiento| {{ $title ?? ''}}</title>
    <meta name="description" content="{{ $description ?? ''}}"/>
    <!-- Favicon Tags Start -->
    @include('_layout.head')
</head>

<body>
<div id="root">
    <div id="nav" class="nav-container d-flex">
        <div class="nav-content d-flex">
            <!-- Logo Start -->
            <div class="logo position-relative">
                <a href="{{ route('home') }}">
                    <!-- Logo can be added directly -->
                    <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

                    <!-- Or added via css to provide different ones for different color themes -->
                    <img src="{{ asset('img/favicon-v2.ico') }}" alt="" style="width: 40px">
                </a>
            </div>
            <!-- Logo End -->

            <!-- User Menu Start -->
            <div class="user-container d-flex">
                <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="profile" alt="profile" src="https://class.utp.edu.pe/static/media/student.42525dea.svg" />
                    <div class="name text-black">
                        {{ Auth::user()->name }} <br>
                        <span class="mt-1">
                            {{ Auth::user()->getCurrentRoles() }}
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end user-menu wide">
                    <div class="row mb-1 ms-0 me-0">
                        <div class="col-12 pe-1 ps-1">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                        <span class="align-middle">Cerrar sesion</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Menu End -->

            <!-- Icons Menu Start -->
            {{--<ul class="list-unstyled list-inline text-center menu-icons">
                <li class="list-inline-item">
                    <a href="#" id="colorButton" style="color: var(--dark-text-darker)">
                        <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                        <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
                    </a>
                </li>

            </ul>--}}
            <!-- Icons Menu End -->

            <!-- Menu Start -->
            <div class="menu-container flex-grow-1">
                <ul id="menu" class="menu">

                </ul>
            </div>
            <!-- Menu End -->

            <!-- Mobile Buttons Start -->
            <div class="mobile-buttons-container">
                <!-- Menu Button Start -->
                <a href="#" id="mobileMenuButton" class="menu-button">
                    <i data-acorn-icon="menu"></i>
                </a>
                <!-- Menu Button End -->
            </div>
            <!-- Mobile Buttons End -->
        </div>
        <div class="nav-shadow"></div>
    </div>

    <main>
        <div class="container">
            <div class="row">
                <!-- Menu Start -->
                <div class="col-auto d-none d-lg-flex">
                    <ul class="sw-25 side-menu mb-0 primary" id="menuSide">
                        <li>
                            <a href="#" data-bs-target="#dashboard">
                                <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">
                                        <i data-acorn-icon="navigate-diagonal" class="icon d-none" data-acorn-size="18"></i>
                                        <span class="label">Home</span>
                                    </a>
                                </li>

                                @can('vehicles.index')
                                    <li>
                                        <a href="{{ route('vehicles.index') }}">
                                            <i data-acorn-icon="car" class="icon d-none" data-acorn-size="18"></i>
                                            <span class="label">Vehículos</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('approve-vehicles.index')
                                    <li>
                                        <a href="{{ route('approve-vehicles.index') }}">
                                            <i data-acorn-icon="car" class="icon d-none" data-acorn-size="18"></i>
                                            <span class="label">Aprobar Vehículos</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Menu End -->

                <!-- Page Content Start -->
                <div class="col">
                    <!-- Title and Top Buttons Start -->
                    {{--@yield('content')--}}
                    {{ $slot }}
                    <!-- User Cards End -->
                </div>
                <!-- Page Content End -->
            </div>
        </div>
    </main>

    <!-- Layout Footer Start -->
    <footer>
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted text-medium">Utp {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Layout Footer End -->
</div>


@include('_layout.scripts')
</body>
</html>
