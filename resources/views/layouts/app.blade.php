<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NICH JEWELRY • Fine Jewelry & 3D Glider Atelier')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Core Atelier Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Meta CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Core Store & Internationalization Scripts -->
    <script src="{{ asset('js/db.js') }}"></script>
    <script src="{{ asset('js/store.js') }}"></script>
    <script src="{{ asset('js/i18n.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>

    @stack('styles')
</head>
<body>

    <!-- Global Sticky Header Mount -->
    @include('components.header')

    <!-- Main Dynamic Body Content -->
    <main>
        @yield('content')
    </main>

    <!-- Global Royal Footer -->
    @include('components.footer')

    <!-- Global Cart Drawer & Mobile Navigation -->
    @include('components.cart-drawer')

    @stack('scripts')
</body>
</html>
