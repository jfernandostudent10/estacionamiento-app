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

                                @if(auth()->user()->can('vehicles.index') && (auth()->user()->hasRole('student') || auth()->user()->hasRole('teacher')))
                                    <li>
                                        <a href="{{ route('vehicles.index') }}">
                                            <i data-acorn-icon="car" class="icon d-none" data-acorn-size="18"></i>
                                            <span class="label">Vehículos</span>
                                        </a>
                                    </li>
                                @endif

                                @if(auth()->user()->can('approve-vehicles.index') || auth()->user()->hasRole('super-admin'))
                                    <li>
                                        <a href="{{ route('approve-vehicles.index') }}">
                                            <i data-acorn-icon="car" class="icon d-none" data-acorn-size="18"></i>
                                            <span class="label">Aprobar Vehículos</span>
                                        </a>
                                    </li>
                                @endif

                                @if(auth()->user()->can('users.index') || auth()->user()->hasRole('super-admin'))
                                    <li>
                                        <a href="#" data-bs-target="#account">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-user icon"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                                            <span class="label">Usuarios</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="{{ route('users.index', ['role' => 'student']) }}">
                                                    <iconify-icon icon="eva:people-outline" class="icon" width="18" height="18"></iconify-icon>

                                                    <span class="label">Estudiantes</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('users.index', ['role' => 'teacher']) }}">
                                                    <iconify-icon icon="hugeicons:teacher" class="icon" width="18" height="18"></iconify-icon>
                                                    <span class="label">Docentes</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('users.index', ['role' => 'administrative']) }}">
                                                    <iconify-icon icon="streamline:office-building-1" class="icon" width="18" height="18"></iconify-icon>
                                                    <span class="label">Administrativos</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('users.index', ['role' => 'vigilant']) }}">
                                                    <iconify-icon icon="material-symbols:security" class="icon" width="18" height="18"></iconify-icon>
                                                    <span class="label">Vigilantes</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Menu End -->

                <!-- Page Content Start -->
                <div class="col">
                    <!-- Title and Top Buttons Start -->
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
