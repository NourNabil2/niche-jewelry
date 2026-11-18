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

    <style>
      /* Global Floating Currency & Atelier Bar */
      .atelier-top-switchers {
        display: flex;
        align-items: center;
        gap: 8px;
      }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Global Currency Switcher Sub-Strip -->
    <div style="background:#14120e; color:#e4cca0; padding:6px 0; font-size:11px; letter-spacing:0.1em; border-bottom:1px solid rgba(228,204,160,0.15);">
      <div class="container" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
        <div>
          <span>✦ {{ app()->getLocale() == 'ar' ? 'شحن مؤمّن مجاني لكافة مدن الكويت والخليج للطلبات فوق $150' : 'Complimentary Insured Delivery Across Kuwait & GCC on Orders Over $150' }}</span>
        </div>
        <div class="atelier-top-switchers">
          <span style="color:#aaa; font-size:10px; text-transform:uppercase;">{{ app()->getLocale() == 'ar' ? 'العملة:' : 'Currency:' }}</span>
          <a href="{{ route('currency.switch', 'KWD') }}" class="currency-pill-btn {{ \App\Services\CurrencyService::current() == 'KWD' ? 'active' : '' }}" style="padding:2px 8px; font-size:10.5px;">
            د.ك KWD
          </a>
          <a href="{{ route('currency.switch', 'USD') }}" class="currency-pill-btn {{ \App\Services\CurrencyService::current() == 'USD' ? 'active' : '' }}" style="padding:2px 8px; font-size:10.5px;">
            $ USD
          </a>
        </div>
      </div>
    </div>

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
