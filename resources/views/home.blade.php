@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'دار نيش للمجوهرات • استوديو الصياغة ثلاثي الأبعاد والذهب الخالص' : 'NICH JEWELRY • Fine Jewelry & 3D Glider Atelier')

@section('content')

  <!-- 1. Editorial Quiet Luxury Hero Banner (Powered by Admin Theme Customizer) -->
  @php
    $isAr = app()->getLocale() == 'ar';
    $heroBadge = \App\Models\Setting::get($isAr ? 'hero_badge_ar' : 'hero_badge_en', $isAr ? 'استوديو الصياغة ثلاثي الأبعاد ✦ ذهب نقي 14K' : '3D Atelier Studio ✦ Solid 14K Gold');
    $heroTitle = \App\Models\Setting::get($isAr ? 'hero_title_ar' : 'hero_title_en', $isAr ? 'صُممت لتنزلق بنعومة. صياغة تعبّر عنكِ.' : 'Crafted to glide softly. Jewelry that expresses you.');
    $heroSubtitle = \App\Models\Setting::get($isAr ? 'hero_subtitle_ar' : 'hero_subtitle_en', $isAr ? 'عيشي تجربة تخصيص المجوهرات الراقية في بيئة ثلاثية الأبعاد تفاعلية فورية. نشقي دلايات عرق اللؤلؤ الطبيعي، الحروف المرصعة بالماس، والأشكال المصنوعة من الذهب الخالص عيار 14K عبر مساري إسورة جلايدر™ بوجهيها الأمامي والخلفي.' : 'Experience fine jewelry personalization in an instant interactive 3D studio. Slide natural mother of pearl charms, diamond-set initials, and solid 14K gold motifs on the dual-track Glider™ bangle.');
    $heroImage = \App\Models\Setting::get('hero_image_url', '/images/products/panther-hero.png');
    $heroCtaPrimary = \App\Models\Setting::get($isAr ? 'hero_cta_primary_ar' : 'hero_cta_primary_en', $isAr ? 'صممي في استوديو الـ 3D' : 'Design in 3D Studio');
    $heroCtaSecondary = \App\Models\Setting::get($isAr ? 'hero_cta_secondary_ar' : 'hero_cta_secondary_en', $isAr ? 'تصفحي المجموعات' : 'Explore Collections');
  @endphp
  <!-- 1. Cartier Panthère Quiet Luxury Editorial Hero (Clean, Breathable & Iconic) -->
  <section class="panthere-hero-section">
    <img src="{{ asset('assets/images/hero_black_panther.jpg') }}" alt="Majestic Black Panther beside solid 14K gold bangle" class="panthere-hero-bg">
    <div class="panthere-hero-scrim"></div>
    <div class="panthere-bottom-blend"></div>
    <div class="container">
      <div class="panthere-hero-content">
        <span class="panthere-eyebrow">
          ✦ {{ app()->getLocale() == 'ar' ? 'ذهب خالص 14K • براءة اختراع جلايدر™' : 'Solid 14K Gold • Patented Glider™' }}
        </span>
        <h1 class="panthere-title">
          {{ app()->getLocale() == 'ar' ? 'صُممت لتنزلق.' : 'Crafted to Glide.' }}
        </h1>
        <p class="panthere-sub">
          {{ app()->getLocale() == 'ar' 
            ? 'إسورة جلايدر™ بوجهين • دلايات الذهب وعرق اللؤلؤ الطبيعي ونقش تذكاري مجاني.' 
            : 'The patented dual-track bangle. Custom slider charms and complimentary laser inscription.' }}
        </p>
        <div class="panthere-cta-row">
          <a href="{{ route('studio') }}" class="panthere-btn-gold">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
            <span>{{ app()->getLocale() == 'ar' ? 'صممي في استوديو الـ 3D ✦' : 'Design in 3D Studio ✦' }}</span>
          </a>
          <a href="{{ route('collections') }}" class="panthere-btn-outline">
            <span>{{ app()->getLocale() == 'ar' ? 'تصفحي المجموعات ←' : 'Explore Collections →' }}</span>
          </a>
        </div>

        <!-- Minimal Atelier Hallmarks -->
        <div class="panthere-hallmarks">
          <span>✦ {{ app()->getLocale() == 'ar' ? 'عيار 14 قيراط' : 'Solid 14K' }}</span>
          <span>✦ {{ app()->getLocale() == 'ar' ? 'نقش ليزر مجاني' : 'Bespoke Engraving' }}</span>
          <span>✦ {{ app()->getLocale() == 'ar' ? 'شحن مؤمّن للخليج' : 'Insured GCC Courier' }}</span>
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
          <div class="cat-card-img" style="padding:22%;">
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

  <!-- 3. Interactive 3D Studio Feature Spotlight -->
  <section class="spotlight-split">
    <div class="container">
      <div class="split-grid">
        <div class="glider-interactive-card">
          <div class="studio-preview-img-wrap" style="position:relative;">
            <span class="product-badge is-3d">✦ {{ app()->getLocale() == 'ar' ? 'استوديو تفاعلي حي 3D' : 'Live 3D Studio' }}</span>
            <img src="{{ asset('assets/images/bangle_gold_studio.jpg') }}" id="spotlightMetalImg" alt="3D Glider Bangle Finish Preview">
            
            <!-- Floating Mini Charms Rail Teaser -->
            <div style="position:absolute; bottom:12px; left:12px; right:12px; background:rgba(255,255,255,0.88); backdrop-filter:blur(8px); -webkit-backdrop-filter:blur(8px); border-radius:30px; padding:6px 14px; display:flex; align-items:center; justify-content:space-between; border:1px solid rgba(212,175,55,0.35); box-shadow:0 4px 12px rgba(0,0,0,0.06);">
              <span style="font-size:11px; font-weight:600; color:#181715;">{{ app()->getLocale() == 'ar' ? 'دلايات جلايدر™ الانزلاقية:' : 'Glider™ Charms on Track:' }}</span>
              <div style="display:flex; gap:8px; align-items:center;">
                <img src="{{ asset('assets/charms/bee_gold.png') }}" style="width:20px; height:20px; object-fit:contain;" alt="">
                <img src="{{ asset('assets/charms/heart_gold.png') }}" style="width:18px; height:18px; object-fit:contain;" alt="">
                <img src="{{ asset('assets/charms/star_gold.png') }}" style="width:18px; height:18px; object-fit:contain;" alt="">
                <img src="{{ asset('assets/charms/letter_n_gold.png') }}" style="width:17px; height:17px; object-fit:contain;" alt="">
              </div>
            </div>
          </div>
          <div class="metal-preview-bar">
            <div style="display:flex; align-items:center; gap:12px;">
              <span style="font-size:11.5px; font-weight:700; color:#181715;">{{ app()->getLocale() == 'ar' ? 'عيار المعدن:' : 'Metal Alloy:' }}</span>
              <div style="display:flex; gap:10px;">
                <span class="swatch-sphere gold active" title="14K Yellow Gold" onclick="switchSpotlightMetal('yellow', this)"></span>
                <span class="swatch-sphere white" title="925 Sterling Silver" onclick="switchSpotlightMetal('white', this)"></span>
                <span class="swatch-sphere rose" title="14K Rose Gold" onclick="switchSpotlightMetal('rose', this)"></span>
              </div>
            </div>
            <a href="{{ route('studio') }}?metal=yellow" id="spotlightOpenStudioBtn" class="btn btn-gold btn-sm">
              {{ app()->getLocale() == 'ar' ? 'افتحي في الـ 3D ✦' : 'Launch 3D Studio ✦' }}
            </a>
          </div>
        </div>

        <div>
          <span class="eyebrow">{{ app()->getLocale() == 'ar' ? 'هندسة المسار المزدوج الحصرية' : 'Patented Dual-Track Engineering' }}</span>
          <h2 class="section-heading mt-1">{{ app()->getLocale() == 'ar' ? 'صممي قصتكِ بحرية عبر مساري الإسورة.' : 'Sculpt Your Story on Front & Back Tracks.' }}</h2>
          <p style="font-size:14.5px; color:#555; line-height:1.75; margin-top:14px;">
            {{ app()->getLocale() == 'ar' 
              ? 'بخلاف أساور الدلايات التقليدية، تتميز إسورتنا المصاغة من الذهب الخالص عيار 14 قيراط بمسارين غائرين دقيقين على الوجهين. اسحبي الدلايات، رتبي المسافات، ودوري القطع بزاوية 90 درجة قبل طلب صياغتها.' 
              : 'Unlike static charm bracelets, our precision-milled 14K gold bangle features an open recessed glider rail on both faces. Drag charms directly into your preferred spacing, rotate pieces in 90° increments, and inspect every millimeter before commissioning your piece.' }}
          </p>

          <div class="feature-steps">
            <div class="feature-step-box">
              <div class="feature-step-num">01</div>
              <div class="feature-step-title">{{ app()->getLocale() == 'ar' ? 'مساران أمامي وخلفي' : 'Front & Back Channels' }}</div>
              <div class="feature-step-desc">{{ app()->getLocale() == 'ar' ? 'نسقي حروف الاسم بالماس في الأمام، ودلايات خاصة بالخلف.' : 'Customize initials on the front and secret meaningful charms on the back side.' }}</div>
            </div>
            <div class="feature-step-box">
              <div class="feature-step-num">02</div>
              <div class="feature-step-title">{{ app()->getLocale() == 'ar' ? 'سحب مباشر في الـ 3D' : 'Direct 3D Drag & Drop' }}</div>
              <div class="feature-step-desc">{{ app()->getLocale() == 'ar' ? 'حركي أي دلاية بالماوس أو اللمس بسلاسة على طول الإسورة.' : 'Grab any charm in 3D space and slide it along the track effortlessly.' }}</div>
            </div>
            <div class="feature-step-box">
              <div class="feature-step-num">03</div>
              <div class="feature-step-title">{{ app()->getLocale() == 'ar' ? 'تدوير دقيق 90 درجة' : '90° Precision Rotation' }}</div>
              <div class="feature-step-desc">{{ app()->getLocale() == 'ar' ? 'وجهي الأشكال عمودياً أو أفقياً بنقرة زر واحدة.' : 'Orient icons & symbols vertically or horizontally with one click.' }}</div>
            </div>
            <div class="feature-step-box">
              <div class="feature-step-num">04</div>
              <div class="feature-step-title">{{ app()->getLocale() == 'ar' ? 'نقش داخلي وتجربة AR' : 'Engraving & AR Try-On' }}</div>
              <div class="feature-step-desc">{{ app()->getLocale() == 'ar' ? 'انقشي تاريخاً تذكارياً وشاهدي الإسورة على معصمكِ بالواقع المعزز.' : 'Inscribe a bespoke motto inside and preview in mobile Augmented Reality.' }}</div>
            </div>
          </div>

          <a href="{{ route('studio') }}" class="btn btn-primary">{{ app()->getLocale() == 'ar' ? 'افتحي استوديو الصياغة 3D ←' : 'Launch Full 3D Customizer →' }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Best Sellers Product Grid -->
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
                <span class="price-current">
                  {{ \App\Services\CurrencyService::format($product->base_price, $product->price_kwd) }}
                </span>
                @if($product->compare_price)
                  <span class="price-compare">
                    {{ \App\Services\CurrencyService::format($product->compare_price) }}
                  </span>
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

  <!-- 5. Meet the Glider Charms Interactive Strip -->
  <section class="page-section" style="background:var(--bg-warm); border-top:1px solid var(--border-light); border-bottom:1px solid var(--border-light);">
    <div class="container">
      <div class="text-center mb-3">
        <span class="eyebrow">{{ app()->getLocale() == 'ar' ? 'ذهب 14K وألماس طبيعي' : '14K Gold & Natural Diamonds' }}</span>
        <h2 class="section-heading mt-1">{{ app()->getLocale() == 'ar' ? 'اكتشفي دلايات جلايدر المفرغة' : 'Meet the Cutout Glider Charms' }}</h2>
        <p style="font-size:13.5px; color:#666; max-width:560px; margin:10px auto 0;">
          {{ app()->getLocale() == 'ar' 
            ? 'اضغطي على أي دلاية لتجربتها مباشرة على الإسورة داخل استوديو الصياغة 3D.' 
            : 'Click any signature token to try it directly inside the 3D Bangle Studio or explore its solid gold craftsmanship.' }}
        </p>
      </div>
      <div class="charm-strip-grid">
        <div class="glider-token-card">
          <img src="{{ asset('assets/charms/bee_gold.png') }}" alt="Bee Charm">
          <div style="font-size:12px; font-weight:600; margin-bottom:4px;">{{ app()->getLocale() == 'ar' ? 'نحلة عرق اللؤلؤ' : 'Mother of Pearl Bee' }}</div>
          <div style="font-size:11px; color:#737373; margin-bottom:12px;">{{ \App\Services\CurrencyService::format(45.00, 13.860) }}</div>
          <div style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('studio') }}?charm=bee" class="btn btn-gold btn-sm" style="width:100%; padding:7px;">{{ app()->getLocale() == 'ar' ? 'تجربة في الـ 3D ✦' : 'Try in 3D ✦' }}</a>
            <a href="{{ route('product.show', ['slug' => 'charm-bee-mop']) }}" style="font-size:10px; font-weight:600; color:#555; text-decoration:underline;">{{ app()->getLocale() == 'ar' ? 'تفاصيل القطعة' : 'View Piece' }}</a>
          </div>
        </div>
        <div class="glider-token-card">
          <img src="{{ asset('assets/charms/martini_gold.png') }}" alt="Martini Charm">
          <div style="font-size:12px; font-weight:600; margin-bottom:4px;">{{ app()->getLocale() == 'ar' ? 'كأس المارتيني' : 'Martini with Olive' }}</div>
          <div style="font-size:11px; color:#737373; margin-bottom:12px;">{{ \App\Services\CurrencyService::format(45.00, 13.860) }}</div>
          <div style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('studio') }}?charm=martini" class="btn btn-gold btn-sm" style="width:100%; padding:7px;">{{ app()->getLocale() == 'ar' ? 'تجربة في الـ 3D ✦' : 'Try in 3D ✦' }}</a>
            <a href="{{ route('product.show', ['slug' => 'charm-martini-olive']) }}" style="font-size:10px; font-weight:600; color:#555; text-decoration:underline;">{{ app()->getLocale() == 'ar' ? 'تفاصيل القطعة' : 'View Piece' }}</a>
          </div>
        </div>
        <div class="glider-token-card">
          <img src="{{ asset('assets/charms/cherries.png') }}" alt="Cherries Charm">
          <div style="font-size:12px; font-weight:600; margin-bottom:4px;">{{ app()->getLocale() == 'ar' ? 'كرز المينا الأحمر' : 'Enamel Cherries' }}</div>
          <div style="font-size:11px; color:#737373; margin-bottom:12px;">{{ \App\Services\CurrencyService::format(45.00, 13.860) }}</div>
          <div style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('studio') }}?charm=cherries" class="btn btn-gold btn-sm" style="width:100%; padding:7px;">{{ app()->getLocale() == 'ar' ? 'تجربة في الـ 3D ✦' : 'Try in 3D ✦' }}</a>
            <a href="{{ route('collections', ['category' => 'charms']) }}" style="font-size:10px; font-weight:600; color:#555; text-decoration:underline;">{{ app()->getLocale() == 'ar' ? 'تفاصيل القطعة' : 'View Piece' }}</a>
          </div>
        </div>
        <div class="glider-token-card">
          <img src="{{ asset('assets/charms/heart_gold.png') }}" alt="Heart Charm">
          <div style="font-size:12px; font-weight:600; margin-bottom:4px;">{{ app()->getLocale() == 'ar' ? 'قلب الذهب بافيه' : 'Pavé Gold Heart' }}</div>
          <div style="font-size:11px; color:#737373; margin-bottom:12px;">{{ \App\Services\CurrencyService::format(45.00, 13.860) }}</div>
          <div style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('studio') }}?charm=heart" class="btn btn-gold btn-sm" style="width:100%; padding:7px;">{{ app()->getLocale() == 'ar' ? 'تجربة في الـ 3D ✦' : 'Try in 3D ✦' }}</a>
            <a href="{{ route('product.show', ['slug' => 'charm-pave-heart']) }}" style="font-size:10px; font-weight:600; color:#555; text-decoration:underline;">{{ app()->getLocale() == 'ar' ? 'تفاصيل القطعة' : 'View Piece' }}</a>
          </div>
        </div>
        <div class="glider-token-card">
          <img src="{{ asset('assets/charms/eye_gold.png') }}" alt="Evil Eye Charm">
          <div style="font-size:12px; font-weight:600; margin-bottom:4px;">{{ app()->getLocale() == 'ar' ? 'عين الحماية الزرقاء' : 'Evil Eye Token' }}</div>
          <div style="font-size:11px; color:#737373; margin-bottom:12px;">{{ \App\Services\CurrencyService::format(45.00, 13.860) }}</div>
          <div style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('studio') }}?charm=eye" class="btn btn-gold btn-sm" style="width:100%; padding:7px;">{{ app()->getLocale() == 'ar' ? 'تجربة في الـ 3D ✦' : 'Try in 3D ✦' }}</a>
            <a href="{{ route('collections', ['category' => 'charms']) }}" style="font-size:10px; font-weight:600; color:#555; text-decoration:underline;">{{ app()->getLocale() == 'ar' ? 'تفاصيل القطعة' : 'View Piece' }}</a>
          </div>
        </div>
        <div class="glider-token-card">
          <img src="{{ asset('assets/charms/star_gold.png') }}" alt="Star Charm">
          <div style="font-size:12px; font-weight:600; margin-bottom:4px;">{{ app()->getLocale() == 'ar' ? 'نجمة الذهب اللامعة' : 'Solid Gold Star' }}</div>
          <div style="font-size:11px; color:#737373; margin-bottom:12px;">{{ \App\Services\CurrencyService::format(45.00, 13.860) }}</div>
          <div style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('studio') }}?charm=star" class="btn btn-gold btn-sm" style="width:100%; padding:7px;">{{ app()->getLocale() == 'ar' ? 'تجربة في الـ 3D ✦' : 'Try in 3D ✦' }}</a>
            <a href="{{ route('collections', ['category' => 'charms']) }}" style="font-size:10px; font-weight:600; color:#555; text-decoration:underline;">{{ app()->getLocale() == 'ar' ? 'تفاصيل القطعة' : 'View Piece' }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. Craftsmanship Editorial Split -->
  <section class="page-section">
    <div class="container">
      <div class="split-grid">
        <div>
          <span class="eyebrow">{{ app()->getLocale() == 'ar' ? 'فخامة مسؤولة' : 'Responsible Luxury' }}</span>
          <h2 class="section-heading mt-1">{{ app()->getLocale() == 'ar' ? 'ذهب 14K معاد تدويره وألماس طبيعي نقي.' : 'Recycled 14K Gold & Conflict-Free Diamonds.' }}</h2>
          <p style="font-size:14.5px; color:#555; line-height:1.8; margin:16px 0 24px;">
            {{ app()->getLocale() == 'ar' 
              ? 'تُصاغ كل قطعة في دار نيش للمجوهرات يدوياً بدقة فائقة من الذهب الخالص عيار 14 والفضة الإسترليني 925. تخضع مسارات الإسورة لفحص مجهري يضمن انسياب الدلايات بنعومة الحرير لعقود قادمة.' 
              : 'Every NICH JEWELRY piece is cast to order in small batches using 100% recycled 14K solid gold and sterling silver. Each charm track undergoes microscopic tolerance inspection so your charms glide with silk-like smoothness for decades to come.' }}
          </p>
          <div style="display:flex; gap:14px; flex-wrap:wrap;">
            <a href="{{ route('about') }}" class="btn btn-outline">{{ app()->getLocale() == 'ar' ? 'قصة دار نيش' : 'Read Our Story' }}</a>
            <a href="{{ route('about') }}#sizing" class="btn btn-ghost">{{ app()->getLocale() == 'ar' ? 'دليل مقاسات المعصم' : 'Wrist Sizing Guide' }}</a>
          </div>
        </div>
        <div style="border-radius:var(--radius-md); overflow:hidden; box-shadow:var(--shadow-sm); border:1px solid var(--border-light);">
          <img src="{{ asset('assets/images/craftsmanship_editorial.jpg') }}" alt="14K Gold Jewelry Craftsmanship on Travertine Stone" style="width:100%; height:100%; object-fit:cover; display:block;">
        </div>
      </div>
    </div>
  </section>

  <!-- 7. Verified Client Reviews -->
  <section class="page-section" style="padding-top:10px;">
    <div class="container">
      <div class="text-center mb-3">
        <span class="eyebrow">{{ app()->getLocale() == 'ar' ? 'شهادات المقتنين' : 'Collector Notes' }}</span>
        <h2 class="section-heading mt-1">{{ app()->getLocale() == 'ar' ? 'محبوبة عبر أكثر من 40 دولة' : 'Loved Across 40+ Countries' }}</h2>
      </div>
      <div class="testimonials-grid">
        <div class="testimonial-card">
          <div style="color:#c59b3f; font-size:14px; letter-spacing:2px;">★★★★★</div>
          <p class="serif" style="font-size:21px; line-height:1.35;">
            {{ app()->getLocale() == 'ar' 
              ? '“حرية تحريك الحروف بالـ 3D ووضع دلاية النحلة في المسار الخلفي جعلت تجربة الإهداء استثنائية بكل المقاييس.”' 
              : '“Being able to drag my initials around on the 3D bracelet and place my Bee charm on the back channel made the experience unforgettable.”' }}
          </p>
          <div style="margin-top:auto; font-size:11px; color:#737373; font-weight:600; text-transform:uppercase; letter-spacing:0.12em;">
            Sophia M. &bull; New York &bull; Verified Collector
          </div>
        </div>
        <div class="testimonial-card">
          <div style="color:#c59b3f; font-size:14px; letter-spacing:2px;">★★★★★</div>
          <p class="serif" style="font-size:21px; line-height:1.35;">
            {{ app()->getLocale() == 'ar' 
              ? '“الذهب الإيطالي عيار 14 يتناغم بسلاسة مع أساوري اليومية. قفل الصندوق المخفي قوي ومحكم بشكل مذهل.”' 
              : '“The warm Italian 14K gold matches my everyday heirloom stack flawlessly. The concealed box clasp feels indestructible.”' }}
          </p>
          <div style="margin-top:auto; font-size:11px; color:#737373; font-weight:600; text-transform:uppercase; letter-spacing:0.12em;">
            Nadia K. &bull; Kuwait City &bull; Verified Collector
          </div>
        </div>
        <div class="testimonial-card">
          <div style="color:#c59b3f; font-size:14px; letter-spacing:2px;">★★★★★</div>
          <p class="serif" style="font-size:21px; line-height:1.35;">
            {{ app()->getLocale() == 'ar' 
              ? '“اخترت إسورة الفضة 925 مع الحروف المرصعة بالألماس بافيه لتخرج أختي، ومن يومها لا تفارق معصمها أبداً.”' 
              : '“Bought the 925 Silver Glider with pavé diamond letters for my sister’s graduation. She never takes it off.”' }}
          </p>
          <div style="margin-top:auto; font-size:11px; color:#737373; font-weight:600; text-transform:uppercase; letter-spacing:0.12em;">
            Claire V. &bull; London &bull; Verified Collector
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 8. Collector VIP CTA Banner -->
  <section class="container" style="margin-bottom:80px;">
    <div class="vip-cta-banner">
      <div>
        <span class="eyebrow" style="color:var(--gold-primary);">{{ app()->getLocale() == 'ar' ? 'امتياز انضمام المقتنين الجدد' : 'Atelier Welcome Privilege' }}</span>
        <h2 class="serif" style="font-size:clamp(26px, 3vw, 38px); font-weight:400; margin-top:6px;">
          {{ app()->getLocale() == 'ar' ? 'وفري 15% على أول إسورة جلايدر تصممينها' : 'Save 15% on Your First Custom Glider Build' }}
        </h2>
        <p style="font-size:13px; color:#c8c1b6; margin-top:6px;">
          {{ app()->getLocale() == 'ar' ? 'استخدمي الرمز الترويجي' : 'Apply promo code' }} <strong style="color:#c59b3f;">NICH15</strong> {{ app()->getLocale() == 'ar' ? 'في حقيبة التسوق أو عند إتمام الطلب.' : 'inside your bag or at checkout.' }}
        </p>
      </div>
      <div style="display:flex; gap:12px; flex-wrap:wrap;">
        <button class="btn btn-gold" onclick="navigator.clipboard?.writeText('NICH15'); alert('تم نسخ الكود: NICH15');">
          {{ app()->getLocale() == 'ar' ? 'نسخ الكود: NICH15' : 'Copy Code: NICH15' }}
        </button>
        <a href="{{ route('studio') }}" class="btn" style="background:rgba(255,255,255,0.1); color:#fff; border-color:rgba(255,255,255,0.35);">
          {{ app()->getLocale() == 'ar' ? 'ابدأي التصميم الآن' : 'Start Designing' }}
        </a>
      </div>
    </div>
  </section>

@endsection

@push('scripts')
<script>
  window.activateHeroPanel = function(idx) {
    const panels = document.querySelectorAll('.accordion-hero-panel');
    panels.forEach((p, i) => {
      p.classList.toggle('active', i === idx);
    });
  };

  const spotlightImgs = {
    yellow: '{{ asset("assets/images/bangle_gold_studio.jpg") }}',
    white:  '{{ asset("assets/images/bangle_silver_studio.jpg") }}',
    rose:   '{{ asset("assets/images/bangle_rose_studio.jpg") }}'
  };

  window.switchSpotlightMetal = function(metalKey, btnEl) {
    document.querySelectorAll('.metal-pill, .swatch-sphere').forEach(b => b.classList.remove('active'));
    if (btnEl) btnEl.classList.add('active');
    const img = document.getElementById('spotlightMetalImg');
    const studioBtn = document.getElementById('spotlightOpenStudioBtn');
    if (img) img.src = spotlightImgs[metalKey];
    if (studioBtn) studioBtn.href = '{{ route("studio") }}?metal=' + metalKey;
  };
</script>
@endpush
