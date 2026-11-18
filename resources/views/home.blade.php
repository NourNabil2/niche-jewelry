@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'دار نيش للمجوهرات • استوديو الصياغة ثلاثي الأبعاد والذهب الخالص' : 'NICH JEWELRY • Fine Jewelry & 3D Glider Atelier')

@push('styles')
<style>
    /* Quiet Luxury Editorial Hero */
    .hero-section {
      position: relative;
      min-height: 82vh;
      max-height: 820px;
      display: flex;
      align-items: center;
      overflow: hidden;
      background: #0d0c0a;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: 68% 45%;
      animation: subtlePantherZoom 26s ease-in-out infinite alternate;
      transform-origin: center center;
      will-change: transform;
    }

    @keyframes subtlePantherZoom {
      0% { transform: scale(1.0); }
      100% { transform: scale(1.045); }
    }

    .hero-scrim {
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, rgba(8, 7, 6, 0.92) 0%, rgba(8, 7, 6, 0.68) 42%, rgba(8, 7, 6, 0.18) 72%, rgba(8, 7, 6, 0.04) 100%);
      pointer-events: none;
    }

    html[dir="rtl"] .hero-scrim {
      background: linear-gradient(270deg, rgba(8, 7, 6, 0.94) 0%, rgba(8, 7, 6, 0.70) 42%, rgba(8, 7, 6, 0.20) 72%, rgba(8, 7, 6, 0.04) 100%);
    }

    .hero-bottom-blend {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 70px;
      background: linear-gradient(to top, #0d0c0a 0%, transparent 100%);
      pointer-events: none;
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 580px;
      color: #ffffff;
      padding: 72px 0 80px;
      animation: heroContentFade 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes heroContentFade {
      0% { opacity: 0; transform: translateY(18px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .hero-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.24em;
      text-transform: uppercase;
      color: var(--gold-primary, #c59b3f);
      margin-bottom: 20px;
    }

    .hero-eyebrow::before {
      content: "";
      width: 22px;
      height: 1px;
      background: var(--gold-primary, #c59b3f);
      opacity: 0.8;
    }

    .hero-title {
      font-family: var(--font-serif);
      font-size: clamp(38px, 5.2vw, 68px);
      font-weight: 400;
      line-height: 1.08;
      margin-bottom: 20px;
      color: #ffffff;
      letter-spacing: -0.01em;
    }

    .hero-sub {
      font-size: 15px;
      font-weight: 300;
      line-height: 1.75;
      color: rgba(245, 243, 239, 0.85);
      max-width: 480px;
      margin-bottom: 34px;
    }

    .hero-cta-row {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .hero-btn-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: linear-gradient(135deg, #e4cca0 0%, #c59b3f 100%);
      color: #12100d !important;
      font-size: 12.5px;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 14px 30px;
      border-radius: 2px;
      text-decoration: none;
      box-shadow: 0 4px 18px rgba(197, 155, 63, 0.25);
      transition: transform 0.25s var(--ease), box-shadow 0.25s var(--ease);
    }

    .hero-btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 24px rgba(197, 155, 63, 0.40);
    }

    .hero-btn-secondary {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: #ffffff !important;
      font-size: 12.5px;
      font-weight: 500;
      letter-spacing: 0.06em;
      text-decoration: none;
      padding: 13px 24px;
      border: 1px solid rgba(255, 255, 255, 0.28);
      border-radius: 2px;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(8px);
      transition: all 0.25s var(--ease);
    }

    .hero-btn-secondary:hover {
      border-color: #e4cca0;
      color: #e4cca0 !important;
      background: rgba(228, 204, 160, 0.08);
      transform: translateY(-1px);
    }

    .hero-hallmarks {
      display: flex;
      align-items: center;
      gap: 22px;
      margin-top: 42px;
      padding-top: 24px;
      border-top: 1px solid rgba(255, 255, 255, 0.12);
      flex-wrap: wrap;
    }

    .hero-hallmark-item {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 11.5px;
      letter-spacing: 0.05em;
      color: rgba(255, 255, 255, 0.68);
    }

    .hero-hallmark-bullet {
      color: var(--gold-primary, #c59b3f);
      font-size: 9px;
    }

    @media (max-width: 900px) {
      .hero-section {
        min-height: 86vh;
        max-height: none;
        align-items: flex-end;
      }
      .hero-bg {
        object-position: center 25%;
      }
      .hero-scrim {
        background: linear-gradient(180deg, rgba(8, 7, 6, 0.20) 0%, rgba(8, 7, 6, 0.65) 45%, rgba(8, 7, 6, 0.95) 100%) !important;
      }
      .hero-content {
        padding: 180px 0 44px;
        text-align: center;
        max-width: 100%;
      }
      .hero-eyebrow {
        justify-content: center;
      }
      .hero-eyebrow::before {
        display: none;
      }
      .hero-sub {
        margin: 0 auto 28px;
      }
      .hero-cta-row {
        justify-content: center;
        flex-direction: column;
        gap: 12px;
      }
      .hero-btn-primary,
      .hero-btn-secondary {
        width: 100%;
        max-width: 320px;
        justify-content: center;
      }
      .hero-hallmarks {
        justify-content: center;
        gap: 14px;
        margin-top: 32px;
        padding-top: 20px;
      }
    }
</style>
@endpush

@section('content')

  <!-- 1. Editorial Quiet Luxury Hero Banner -->
  <section class="hero-section">
    <img src="{{ asset('assets/images/hero_editorial.jpg') }}" alt="14K Gold Glider Charm Bangle worn beside majestic black panther" class="hero-bg">
    <div class="hero-scrim"></div>
    <div class="hero-bottom-blend"></div>
    <div class="container">
      <div class="hero-content">
        <span class="hero-eyebrow" data-i18n="hero.eyebrow">
          {{ app()->getLocale() == 'ar' ? 'استوديو الصياغة ثلاثي الأبعاد • ذهب خالص 14K' : 'The 3D Atelier • 14K Solid Gold' }}
        </span>
        <h1 class="hero-title" data-i18n="hero.title">
          {!! app()->getLocale() == 'ar' ? 'صُممت لتنزلق بنعومة<br>صياغة تعبر عنكِ' : 'Crafted to Glide.<br>Designed by You.' !!}
        </h1>
        <p class="hero-sub" data-i18n="hero.sub">
          {{ app()->getLocale() == 'ar' ? 'صممي إسورة جلايدر™ بوجهيها بحرية مطلقة في بيئة ثلاثية الأبعاد تنبض بالفخامة والحِرفية.' : 'Personalize your bespoke dual-track Glider Bangle™ in real-time 3D craftsmanship.' }}
        </p>
        <div class="hero-cta-row">
          <a href="{{ route('studio') }}" class="hero-btn-primary">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
            <span data-i18n="hero.cta_studio">{{ app()->getLocale() == 'ar' ? 'صممي في الـ 3D ✦' : 'Design in 3D Studio ✦' }}</span>
          </a>
          <a href="{{ route('collections') }}" class="hero-btn-secondary">
            <span data-i18n="hero.cta_shop">{{ app()->getLocale() == 'ar' ? 'استكشفي المجموعات ←' : 'Explore Collections →' }}</span>
          </a>
        </div>

        <!-- Atelier Hallmark Bar -->
        <div class="hero-hallmarks">
          <span class="hero-hallmark-item">
            <span class="hero-hallmark-bullet">✦</span>
            <span data-i18n="hero.hallmark_gold">{{ app()->getLocale() == 'ar' ? 'ذهب نقي عيار 14 قيراط' : '14K Recycled Solid Gold' }}</span>
          </span>
          <span class="hero-hallmark-item">
            <span class="hero-hallmark-bullet">✦</span>
            <span data-i18n="hero.hallmark_glide">{{ app()->getLocale() == 'ar' ? 'تقنية جلايدر™ بوجهين' : 'Patented Dual-Track Glide™' }}</span>
          </span>
          <span class="hero-hallmark-item">
            <span class="hero-hallmark-bullet">✦</span>
            <span data-i18n="hero.hallmark_engraving">{{ app()->getLocale() == 'ar' ? 'نقش تذكاري داخلي مجاني' : 'Complimentary Bespoke Engraving' }}</span>
          </span>
        </div>
      </div>
    </div>
  </section>

  <!-- Press & Guarantee Strip -->
  <section class="press-strip">
    <div class="container press-inner">
      <span>{{ app()->getLocale() == 'ar' ? 'نُشر في كبرى المجلات' : 'Featured In' }}</span>
      <div class="press-logos">
        <span>Vogue</span>
        <span>Harper&rsquo;s Bazaar</span>
        <span>Elle Atelier</span>
        <span>Town &amp; Country</span>
      </div>
      <span style="color:#1b1b1b; font-weight:600;">{{ app()->getLocale() == 'ar' ? 'ضمان حِرفي مدى الحياة • ذهب نقي 14K' : 'Lifetime Track Warranty • Solid 14K Gold' }}</span>
    </div>
  </section>

  <!-- 2. Shop by Category -->
  <section class="page-section">
    <div class="container">
      <div class="section-header-row">
        <div>
          <span class="eyebrow">{{ app()->getLocale() == 'ar' ? 'التصنيفات المختارة' : 'Curated Categories' }}</span>
          <h2 class="section-heading mt-1">{{ app()->getLocale() == 'ar' ? 'تشكيلات المجوهرات الراقية' : 'Fine Jewelry Silhouettes' }}</h2>
        </div>
        <a href="{{ route('collections') }}" class="btn btn-outline btn-sm">{{ app()->getLocale() == 'ar' ? 'تصفحي الكتالوج بالكامل ←' : 'View Entire Catalog →' }}</a>
      </div>

      <div class="category-grid">
        <a href="{{ route('collections', ['category' => 'bangles']) }}" class="cat-card">
          <div class="cat-card-img">
            <img src="{{ asset('assets/images/bangle_gold_studio.jpg') }}" alt="Glider Bangles">
          </div>
          <div class="cat-card-title">{{ app()->getLocale() == 'ar' ? 'أساور جلايدر' : 'Glider Bangles' }}</div>
        </a>
        <a href="{{ route('collections', ['category' => 'charms']) }}" class="cat-card">
          <div class="cat-card-img" style="padding:26%;">
            <img src="{{ asset('assets/charms/bee_gold.png') }}" alt="Glider Charms" style="object-fit:contain;">
          </div>
          <div class="cat-card-title">{{ app()->getLocale() == 'ar' ? 'دلايات جلايدر' : 'Cutout Charms' }}</div>
        </a>
        <a href="{{ route('collections', ['category' => 'necklaces']) }}" class="cat-card">
          <div class="cat-card-img">
            <img src="{{ asset('assets/images/necklace_pendant_studio.jpg') }}" alt="Necklaces">
          </div>
          <div class="cat-card-title">{{ app()->getLocale() == 'ar' ? 'القلائد والسلاسل' : 'Medallion Necklaces' }}</div>
        </a>
        <a href="{{ route('collections', ['category' => 'earrings']) }}" class="cat-card">
          <div class="cat-card-img">
            <img src="{{ asset('assets/images/earrings_huggie_studio.jpg') }}" alt="Earrings">
          </div>
          <div class="cat-card-title">{{ app()->getLocale() == 'ar' ? 'أقراط بافيه' : 'Pavé Huggies' }}</div>
        </a>
        <a href="{{ route('collections', ['category' => 'rings']) }}" class="cat-card">
          <div class="cat-card-img">
            <img src="{{ asset('assets/images/ring_solitaire_studio.jpg') }}" alt="Rings">
          </div>
          <div class="cat-card-title">{{ app()->getLocale() == 'ar' ? 'خواتم الدار' : 'Stacking Rings' }}</div>
        </a>
      </div>
    </div>
  </section>

  <!-- 3. Dynamic Best Sellers (Served from MySQL via Eloquent) -->
  <section class="page-section">
    <div class="container">
      <div class="section-header-row">
        <div>
          <span class="eyebrow">{{ app()->getLocale() == 'ar' ? 'مختارات الأتيليه' : 'Atelier Favorites' }}</span>
          <h2 class="section-heading mt-1">{{ app()->getLocale() == 'ar' ? 'الأكثر طلباً ومبيعاً' : 'Signature Best Sellers' }}</h2>
        </div>
        <a href="{{ route('collections') }}" class="btn btn-outline btn-sm">{{ app()->getLocale() == 'ar' ? 'عرض كافة القطع ←' : 'Shop All Pieces →' }}</a>
      </div>

      <div class="product-grid">
        @foreach($featuredProducts as $product)
          <div class="product-card">
            <div class="product-card-img-wrap">
              @if($product->category === 'bangles')
                <span class="product-badge is-3d">3D Studio</span>
              @endif
              <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
                <img src="{{ asset($product->images[0] ?? 'assets/images/bangle_gold_studio.jpg') }}" alt="{{ $product->title }}" class="product-card-img">
              </a>
            </div>
            <div class="product-card-body">
              <span class="product-card-category">{{ strtoupper($product->category) }}</span>
              <h3 class="product-card-title">
                <a href="{{ route('product.show', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
              </h3>
              <div class="product-card-price-row">
                <span class="price-current">${{ number_format($product->base_price, 2) }}</span>
                @if($product->compare_price)
                  <span class="price-compare">${{ number_format($product->compare_price, 2) }}</span>
                @endif
              </div>
              <div class="product-card-actions">
                @if($product->category === 'bangles')
                  <a href="{{ route('studio') }}" class="btn btn-gold btn-sm" style="width:100%; justify-content:center;">
                    {{ app()->getLocale() == 'ar' ? 'تخصيص في الـ 3D ✦' : 'Customize in 3D ✦' }}
                  </a>
                @else
                  <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn-outline btn-sm" style="width:100%; justify-content:center;">
                    {{ app()->getLocale() == 'ar' ? 'عرض التفاصيل' : 'View Details' }}
                  </a>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
