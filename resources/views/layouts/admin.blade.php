<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة تحكم الأتيليه • NICH JEWELRY')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Cormorant+Garamond:wght@400;600&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    
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
        width: 270px;
        background: #12100d;
        color: #ffffff;
        padding: 28px 18px;
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
        box-sizing: border-box;
      }
      .admin-brand {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 20px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #e4cca0;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(228, 204, 160, 0.18);
        text-decoration: none;
        display: block;
      }
      .admin-nav {
        display: flex;
        flex-direction: column;
        gap: 4px;
        flex: 1;
        overflow-y: auto;
      }
      .admin-nav a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.72);
        text-decoration: none;
        padding: 10px 14px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s ease;
      }
      .admin-nav a:hover,
      .admin-nav a.active {
        background: rgba(197, 155, 63, 0.16);
        color: #e4cca0;
      }
      .admin-nav .nav-section-title {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: rgba(228, 204, 160, 0.5);
        margin: 12px 10px 4px;
        font-weight: 700;
      }
      .admin-main {
        flex: 1;
        padding: 36px 44px;
        overflow-y: auto;
      }
      .admin-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
        padding-bottom: 18px;
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
      .alert-error {
        background: #ffebee;
        color: #c62828;
        border: 1px solid #ffcdd2;
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
        box-shadow: 0 1px 3px rgba(0,0,0,0.03);
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
        padding: 14px 18px;
        font-size: 13px;
        border-bottom: 1px solid #f2eee6;
        color: #181715;
      }
      tr:last-child td {
        border-bottom: none;
      }
      .badge-status {
        display: inline-block;
        padding: 3px 9px;
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
              <span style="font-size:9.5px; letter-spacing:0.25em; color:var(--gold-primary);">ATELIER EXECUTIVE</span>
            </a>
            
            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                  📊 لوحة الإحصائيات
                </a>

                <div class="nav-section-title">الكتالوج والتصاميم</div>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                  💎 مجوهرات الكتالوج والأسعار
                </a>
                <a href="{{ route('admin.charms.index') }}" class="{{ request()->routeIs('admin.charms.*') ? 'active' : '' }}">
                  ✦ دلايات الـ 3D Atelier
                </a>
                <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                  🛍️ طلبات وتفصيل العملاء
                </a>

                <div class="nav-section-title">التسويق والمبيعات</div>
                <a href="{{ route('admin.promotions.index') }}" class="{{ request()->routeIs('admin.promotions.*') ? 'active' : '' }}">
                  🏷️ العروض وكوبونات الخصم
                </a>
                <a href="{{ route('admin.banners.index') }}" class="{{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                  🖼️ البانرات والشرائح الإعلانية
                </a>
                <a href="{{ route('admin.marketing.index') }}" class="{{ request()->routeIs('admin.marketing.*') ? 'active' : '' }}">
                  🎯 ربط البيكسل والإعلانات
                </a>

                <div class="nav-section-title">الهوية والواجهة</div>
                <a href="{{ route('admin.theme.index') }}" class="{{ request()->routeIs('admin.theme.*') ? 'active' : '' }}">
                  🎨 تخصيص الهيرو والتصميم
                </a>
                <a href="{{ route('admin.about.index') }}" class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                  📜 قصة الدار والحرفية
                </a>
                <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                  ⚙️ إعدادات العملة والمتجر
                </a>

                <div class="nav-section-title">الحساب والأمان</div>
                <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                  👤 الملف الشخصي وكلمة السر
                </a>
            </nav>

            <div style="margin-top:auto; padding-top:16px; border-top:1px solid rgba(255,255,255,0.1); display:flex; flex-direction:column; gap:10px;">
                <a href="{{ asset('downloads/NICHE_PLATFORM_COMPLETE_GUIDE_AND_MARKETING_ROADMAP.pdf') }}" target="_blank" style="color:#e4cca0; font-size:11.5px; text-decoration:none; display:flex; align-items:center; gap:6px; background:rgba(197, 155, 63, 0.12); padding:8px 10px; border-radius:4px; border:1px solid rgba(228,204,160,0.25);">
                  <span>📄 كتيب الدار وخطة التسويق (PDF)</span>
                </a>
                <a href="{{ route('home', ['locale' => 'ar']) }}" target="_blank" style="color:rgba(255,255,255,0.8); font-size:12px; text-decoration:none; display:flex; align-items:center; gap:6px;">
                  <span>⇱ عرض المتجر الحي للزوار</span>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:rgba(255,255,255,0.6); font-size:12px; cursor:pointer; padding:0; display:flex; align-items:center; gap:6px; font-family:inherit;">
                      <span>🚪 تسجيل الخروج</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <div class="admin-topbar">
                <div>
                  <span class="eyebrow">إدارة الدار والنظام</span>
                  <h1 style="font-family:var(--font-serif); font-size:26px; margin:4px 0 0;">@yield('page_title', 'لوحة التحكم')</h1>
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

            @if(session('error'))
                <div class="alert-error">
                  ⚠ {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
