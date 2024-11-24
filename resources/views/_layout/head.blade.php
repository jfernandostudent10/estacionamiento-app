<!-- Favicon Tags Start -->
<link rel="icon" href="{{ asset('img/favicon-v2.ico') }}" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF"/>
<!-- Favicon Tags End -->
<!-- Font Tags Start -->
<link rel="preconnect" href="https://fonts.gstatic.com"/>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet"/>
{{--<link rel="stylesheet" href="/font/CS-Interface/style.css"/>--}}
<!-- Font Tags End -->
<!-- Vendor Styles Start -->
{{--<link rel="stylesheet" href="/css/vendor/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/vendor/OverlayScrollbars.min.css"/>--}}
@yield('css')
<!-- Vendor Styles End -->
<!-- Template Base Styles Start -->
{{--<link rel="stylesheet" href="/css/styles.css"/>
<link rel="stylesheet" href="/css/main.css"/>--}}
<!-- Template Base Styles End -->
<script src="{{ asset('js/base/loader.js') }}"></script>
@livewireStyles
@vite(['resources/css/app.css', 'resources/js/app.js'])