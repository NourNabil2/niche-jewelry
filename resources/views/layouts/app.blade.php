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

    <!-- Marketing & Ad Tracking Integrations -->
    @php
        $metaPixel = \App\Models\Setting::get('meta_pixel_id');
        $tiktokPixel = \App\Models\Setting::get('tiktok_pixel_id');
        $snapPixel = \App\Models\Setting::get('snapchat_pixel_id');
        $ga4Id = \App\Models\Setting::get('ga4_measurement_id');
        $gtmId = \App\Models\Setting::get('gtm_container_id');
        $announcementActive = \App\Models\Setting::get('announcement_bar_active', '1') == '1';
        $announcementText = app()->getLocale() == 'ar' 
            ? \App\Models\Setting::get('announcement_bar_ar', 'شحن آمن ومؤمّن مجاناً لكافة دول الخليج العربي والشرق الأوسط للطلبات فوق 300$')
            : \App\Models\Setting::get('announcement_bar_en', 'Complimentary insured courier delivery across GCC on orders over $300');
    @endphp

    @if(!empty($gtmId))
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ $gtmId }}');</script>
        <!-- End Google Tag Manager -->
    @endif

    @if(!empty($ga4Id))
        <!-- Google Analytics 4 (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $ga4Id }}"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '{{ $ga4Id }}');
        </script>
    @endif

    @if(!empty($metaPixel))
        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $metaPixel }}');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{ $metaPixel }}&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
    @endif

    @if(!empty($tiktokPixel))
        <!-- TikTok Pixel Code -->
        <script>
        !function (w, d, t) {
          w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=d.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=d.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
          ttq.load('{{ $tiktokPixel }}');
          ttq.page();
        }(window, document, 'ttq');
        </script>
        <!-- End TikTok Pixel Code -->
    @endif

    @if(!empty($snapPixel))
        <!-- Snap Pixel Code -->
        <script type='text/javascript'>
        (function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()
        {a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};
        a.queue=[];var s='script';r=t.createElement(s);r.async=!0;
        r.src=n;var u=t.getElementsByTagName(s)[0];
        u.parentNode.insertBefore(r,u);})(window,document,
        'https://sc-static.net/scevent.min.js');
        snaptr('init', '{{ $snapPixel }}', {});
        snaptr('track', 'PAGE_VIEW');
        </script>
        <!-- End Snap Pixel Code -->
    @endif

    <!-- Global Client Tracking Helper Function -->
    <script>
      window.trackNicheEvent = function(eventName, data) {
        data = data || {};
        try {
          // Meta Pixel
          if (typeof window.fbq === 'function') {
            window.fbq('track', eventName, data);
          }
          // TikTok Pixel
          if (window.ttq && typeof window.ttq.track === 'function') {
            window.ttq.track(eventName, data);
          }
          // Snap Pixel
          if (typeof window.snaptr === 'function') {
            var snapMap = {
              'AddToCart': 'ADD_CART',
              'ViewContent': 'VIEW_CONTENT',
              'InitiateCheckout': 'START_CHECKOUT',
              'Purchase': 'PURCHASE'
            };
            window.snaptr('track', snapMap[eventName] || eventName, data);
          }
          // Google Analytics 4
          if (typeof window.gtag === 'function') {
            window.gtag('event', eventName, data);
          }
        } catch (e) {
          console.warn('Tracking dispatch notice:', e);
        }
      };
    </script>

    <!-- Core Store & Internationalization Scripts -->
    <script src="{{ asset('js/db.js') }}"></script>
    <script src="{{ asset('js/store.js') }}"></script>
    <script src="{{ asset('js/i18n.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>

    <style>
      .atelier-top-switchers {
        display: flex;
        align-items: center;
        gap: 8px;
      }
    </style>

    @stack('styles')
</head>
<body>
    @if(!empty($gtmId))
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif

    <!-- Global Currency Switcher & Dynamic Announcement Bar -->
    @if($announcementActive)
    <div style="background:#14120e; color:#e4cca0; padding:7px 0; font-size:11.5px; letter-spacing:0.08em; border-bottom:1px solid rgba(228,204,160,0.18);">
      <div class="container" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
        <div style="display:flex; align-items:center; gap:6px;">
          <span style="color:var(--gold-primary);">✦</span>
          <span>{{ $announcementText }}</span>
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
    @endif

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
