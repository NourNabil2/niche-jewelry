<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة تحكم الأتيليه • NICH JEWELRY')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Cormorant+Garamond:wght@400;600&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      body {
        background-color: #f7f5f0;
        margin: 0;
        font-family: 'Cairo', 'Montserrat', sans-serif;
      }
      .admin-layout {
        display: flex;
        min-height: 100vh;
      }
      .admin-sidebar {
        width: 260px;
        background: #12100d;
        color: #ffffff;
        padding: 32px 20px;
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
      }
      .admin-brand {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 22px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #e4cca0;
        margin-bottom: 36px;
        padding-bottom: 18px;
        border-bottom: 1px solid rgba(228, 204, 160, 0.18);
        text-decoration: none;
        display: block;
      }
      .admin-nav {
        display: flex;
        flex-direction: column;
        gap: 6px;
        flex: 1;
      }
      .admin-nav a {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255, 255, 255, 0.72);
        text-decoration: none;
        padding: 11px 14px;
        border-radius: 4px;
        font-size: 13.5px;
        font-weight: 500;
        transition: all 0.2s ease;
      }
      .admin-nav a:hover,
      .admin-nav a.active {
        background: rgba(197, 155, 63, 0.14);
        color: #e4cca0;
      }
      .admin-main {
        flex: 1;
        padding: 40px 48px;
        overflow-y: auto;
      }
      .admin-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e8e3d8;
      }
      .alert-success {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
        padding: 12px 18px;
        border-radius: 4px;
        margin-bottom: 24px;
        font-size: 13.5px;
      }
      .table-card {
        background: #ffffff;
        border: 1px solid #e8e3d8;
        border-radius: 6px;
        overflow: hidden;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        text-align: right;
      }
      th {
        background: #faf8f5;
        padding: 14px 18px;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #666;
        border-bottom: 1px solid #e8e3d8;
      }
      td {
        padding: 16px 18px;
        font-size: 13.5px;
        border-bottom: 1px solid #f2eee6;
        color: #181715;
      }
      tr:last-child td {
        border-bottom: none;
      }
      .badge-status {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
      }
      .badge-pending { background: #fff3e0; color: #e65100; }
      .badge-paid { background: #e8f5e9; color: #2e7d32; }
      .badge-review { background: #ede7f6; color: #512da8; }
      .badge-shipped { background: #e3f2fd; color: #1565c0; }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <a href="{{ route('admin.dashboard') }}" class="admin-brand">
              NICH JEWELRY<br>
              <span style="font-size:10px; letter-spacing:0.25em; color:var(--gold-primary);">ATELIER CONTROL</span>
            </a>
            
            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                  📊 لوحة الإحصائيات
                </a>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                  💎 مجوهرات الكتالوج
                </a>
                <a href="{{ route('admin.charms.index') }}" class="{{ request()->routeIs('admin.charms.*') ? 'active' : '' }}">
                  ✦ دلايات الـ 3D Atelier
                </a>
                <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                  🛍️ طلبات وتفصيل العملاء
                </a>
                <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                  ⚙️ إعدادات العملة والمتجر
                </a>
            </nav>

            <div style="margin-top:auto; padding-top:20px; border-top:1px solid rgba(255,255,255,0.1);">
                <a href="{{ route('home', ['locale' => 'ar']) }}" target="_blank" style="color:#e4cca0; font-size:12px; text-decoration:none; display:flex; align-items:center; gap:6px;">
                  <span>⇱ عرض المتجر الحي</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <div class="admin-topbar">
                <div>
                  <span class="eyebrow">إدارة الدار والنظام</span>
                  <h1 style="font-family:var(--font-serif); font-size:28px; margin:4px 0 0;">@yield('page_title', 'لوحة التحكم')</h1>
                </div>
                <div>
                  @yield('topbar_actions')
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success">
                  ✓ {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
