@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'قصة الدار والحرفية اليدوية • NICH JEWELRY' : 'Our Story, Craftsmanship & Sizing • NICH JEWELRY')

@push('styles')
<style>
  .story-hero {
    background: #12100d;
    color: #f7f5f0;
    padding: 72px 0;
    text-align: center;
    position: relative;
    border-bottom: 1px solid rgba(228, 204, 160, 0.2);
  }

  .story-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 52px;
    align-items: center;
    padding: 72px 0;
  }

  @media (max-width: 860px) {
    .story-split { grid-template-columns: 1fr; gap: 32px; }
  }

  .sizing-card {
    background: #ffffff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius-md);
    padding: 40px;
    box-shadow: var(--shadow-sm);
  }

  .sizing-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 24px;
    font-size: 13px;
  }

  .sizing-table th, .sizing-table td {
    padding: 12px 14px;
    border-bottom: 1px solid var(--border-light);
    text-align: right;
  }

  html[dir="ltr"] .sizing-table th, html[dir="ltr"] .sizing-table td {
    text-align: left;
  }

  .sizing-table th {
    font-size: 10.5px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--text-muted);
  }

  .faq-list {
    max-width: 820px;
    margin: 0 auto;
  }

  .faq-item {
    background: #ffffff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius-sm);
    margin-bottom: 12px;
    padding: 0 24px;
  }

  .faq-q {
    width: 100%;
    background: none;
    border: none;
    padding: 18px 0;
    text-align: inherit;
    font-size: 14.5px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    color: var(--text-dark);
    font-family: inherit;
  }

  .faq-a {
    display: none;
    padding-bottom: 20px;
    font-size: 13.5px;
    color: #555;
    line-height: 1.8;
  }

  .faq-item.open .faq-a { display: block; }

  .atelier-concierge-card {
    background: #ffffff;
    border: 1px solid #e8e3d8;
    border-radius: 8px;
    padding: 32px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 24px;
    margin-top: 40px;
  }
</style>
@endpush

@section('content')
  @php
    $isAr = app()->getLocale() == 'ar';
    $tagline = \App\Models\Setting::get($isAr ? 'about_tagline_ar' : 'about_tagline_en', $isAr ? 'صياغة كويتية خالدة بروح الفخامة المعاصرة' : 'Timeless Kuwaiti craftsmanship with contemporary haute joaillerie spirit');
    $story = \App\Models\Setting::get($isAr ? 'about_story_ar' : 'about_story_en', $isAr ? 'تأسست دار نيش في قلب الكويت كدار صياغة راقية تجمع بين التراث اليدوي العريق وتقنيات الصياغة ثلاثية الأبعاد المعاصرة.' : 'Founded in Kuwait, Niche Atelier blends centuries-old artisanal goldsmithing with contemporary interactive 3D design.');
    $craft = \App\Models\Setting::get($isAr ? 'about_craft_ar' : 'about_craft_en', $isAr ? 'تمر كل إسورة جلايدر™ بـ 18 مرحلة صياغة دقيقة، من الصب الدقيق، الصقل اليدوي للمسار المزدوج بمستوى الميكرون، وحتى ترصيع الأحجار الكريمة على أيدي أمهر الصاغة.' : 'Every Glider™ bangle passes through 18 precision craft stages, from lost-wax casting to micron-tolerance rail hand-polishing and micro-pavé gem setting.');
    $sizingGuide = \App\Models\Setting::get($isAr ? 'about_sizing_guide_ar' : 'about_sizing_guide_en', $isAr ? 'نوفر 4 مقاسات مدروسة لتناسب كل معصم: XS, S, M, L. يوصى بلف شريط القياس حول المعصم وإضافة 0.5 بوصة لحرية انزلاق الدلايات.' : 'Available in 4 tailored wrist sizes: XS, S, M, L. Measure your wrist snugly and add 0.5 inches for optimal charm gliding drape.');
    $address = \App\Models\Setting::get($isAr ? 'atelier_address_ar' : 'atelier_address_en', 'برج الحمراء الفاخر، شرق، مدينة الكويت');
    $whatsapp = \App\Models\Setting::get('atelier_whatsapp', '+965 9999 1234');
    $email = \App\Models\Setting::get('atelier_email', 'concierge@niche-jewelry.com');
    $phone = \App\Models\Setting::get('atelier_phone', '+965 2200 4400');
  @endphp

  <!-- Hero Heritage Section -->
  <section class="story-hero">
    <div class="container">
      <span class="eyebrow" style="color:var(--gold-primary);">{{ $isAr ? 'تراث الصياغة والهندسة الراقية' : 'Heritage & High Jewelry Engineering' }}</span>
      <h1 class="section-heading mt-1" style="color:#ffffff; font-size:38px;">{{ $tagline }}</h1>
      <p style="font-size:15px; color:#d1c9bd; max-width:680px; margin:16px auto 0; line-height:1.8;">
        {{ $story }}
      </p>
    </div>
  </section>

  <!-- Craftsmanship & 18 Stages Story -->
  <section class="container story-split">
    <div style="border-radius:var(--radius-md); overflow:hidden; border:1px solid var(--border-light); box-shadow:var(--shadow-md);">
      <img src="{{ asset('assets/images/craftsmanship_editorial.jpg') }}" alt="NICH JEWELRY Atelier Craftsmanship" style="width:100%; display:block;">
    </div>
    <div>
      <span class="eyebrow" style="color:var(--gold-primary);">{{ $isAr ? 'ذهب نقي عيار 14K • بدون تفريغ' : 'Solid 14K Gold • No Hollow Casts' }}</span>
      <h2 class="section-heading mt-1">{{ $isAr ? '18 مرحلة صياغة يدوية فائقة الدقة' : '18 Precision Atelier Craft Stages' }}</h2>
      <p style="font-size:14.5px; color:#555; line-height:1.8; margin:18px 0;">
        {{ $craft }}
      </p>
      <div style="margin-top:28px;">
        <a href="{{ route('studio') }}" class="btn btn-gold">
          {{ $isAr ? 'استكشفي استوديو الصياغة 3D ←' : 'Experience 3D Studio →' }}
        </a>
      </div>
    </div>
  </section>

  <!-- Interactive Wrist Sizing Calculator -->
  <section id="sizing" style="background:var(--bg-warm); border-top:1px solid var(--border-light); border-bottom:1px solid var(--border-light); padding:72px 0;">
    <div class="container">
      <div class="text-center mb-3">
        <span class="eyebrow">{{ $isAr ? 'تطابق بيضاوي مثالي' : 'Precision Oval Fit' }}</span>
        <h2 class="section-heading mt-1">{{ $isAr ? 'حاسبة مقاس المعصم التفاعلية' : 'Interactive Wrist Size Finder' }}</h2>
        <p style="font-size:14px; color:#666; max-width:580px; margin:10px auto 0; line-height:1.6;">
          {{ $sizingGuide }}
        </p>
      </div>

      <div class="sizing-card" style="max-width:760px; margin:0 auto;">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:16px;">
          <label for="wristSlider" style="font-size:12.5px; font-weight:700; text-transform:uppercase; letter-spacing:0.1em;">
            {{ $isAr ? 'محيط معصمكِ بالسنتيمتر:' : 'Your Snug Wrist Measurement:' }}
          </label>
          <span class="serif" style="font-size:26px; font-weight:600; color:#8b661d; direction:ltr;" id="wristReadout">15.2 cm (6.0")</span>
        </div>

        <input type="range" id="wristSlider" min="13.0" max="19.0" step="0.1" value="15.2" style="width:100%; accent-color:#c59b3f; cursor:pointer; height:8px;">

        <div style="margin-top:24px; padding:20px; background:var(--bg-cream); border:1px solid #e7cd84; border-radius:8px; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:16px;">
          <div>
            <div style="font-size:10.5px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#737373;">
              {{ $isAr ? 'المقاس الموصى به لإسورة جلايدر™' : 'Recommended Bangle Size' }}
            </div>
            <div class="serif" style="font-size:28px; font-weight:600; direction:ltr;" id="recommendedSizeLabel">S (6.0" Circumference)</div>
          </div>
          <a href="{{ route('studio', ['size' => 'S']) }}" id="recommendedStudioLink" class="btn btn-primary btn-sm">
            {{ $isAr ? 'تخصيص مقاس S في استوديو 3D ←' : 'Customize Size S in 3D →' }}
          </a>
        </div>

        <table class="sizing-table">
          <thead>
            <tr>
              <th>{{ $isAr ? 'المقاس' : 'Size' }}</th>
              <th>{{ $isAr ? 'محيط الإسورة' : 'Bangle Circumference' }}</th>
              <th>{{ $isAr ? 'يناسب معصم (ملم)' : 'Fits Wrist (mm)' }}</th>
              <th>{{ $isAr ? 'يناسب معصم (بوصة)' : 'Fits Wrist (inches)' }}</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><strong>XS</strong></td><td style="direction:ltr;">5.5" Oval</td><td style="direction:ltr;">130 – 144 mm</td><td style="direction:ltr;">5.1" – 5.6"</td></tr>
            <tr><td><strong>S</strong></td><td style="direction:ltr;">6.0" Oval</td><td style="direction:ltr;">145 – 158 mm</td><td style="direction:ltr;">5.7" – 6.2"</td></tr>
            <tr><td><strong>M</strong></td><td style="direction:ltr;">6.5" Oval</td><td style="direction:ltr;">159 – 171 mm</td><td style="direction:ltr;">6.3" – 6.7"</td></tr>
            <tr><td><strong>L</strong></td><td style="direction:ltr;">7.0" Oval</td><td style="direction:ltr;">172 – 188 mm</td><td style="direction:ltr;">6.8" – 7.4"</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Atelier Concierge & Direct Contact Info -->
  <section class="container" style="padding:68px 0 20px;">
    <div class="text-center mb-3">
      <span class="eyebrow">{{ $isAr ? 'خدمة الضيافة والاستشارة' : 'Kuwait Concierge & Atelier' }}</span>
      <h2 class="section-heading mt-1">{{ $isAr ? 'تواصل مع صاغة دار نيش' : 'Consult with Our Goldsmiths' }}</h2>
    </div>

    <div class="atelier-concierge-card">
      <div>
        <div style="font-size:12px; font-weight:700; color:#888; text-transform:uppercase; margin-bottom:4px;">{{ $isAr ? 'مقر الأتيليه' : 'Atelier Location' }}</div>
        <div style="font-weight:600; color:#181715; font-size:14.5px;">{{ $address }}</div>
      </div>
      <div>
        <div style="font-size:12px; font-weight:700; color:#888; text-transform:uppercase; margin-bottom:4px;">{{ $isAr ? 'محادثة واتساب فورية' : 'WhatsApp Concierge' }}</div>
        <div style="font-weight:600; color:#c59b3f; font-size:14.5px; direction:ltr;">
          <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" style="color:#c59b3f; text-decoration:none;">{{ $whatsapp }} ⇱</a>
        </div>
      </div>
      <div>
        <div style="font-size:12px; font-weight:700; color:#888; text-transform:uppercase; margin-bottom:4px;">{{ $isAr ? 'البريد الإلكتروني للطلبات الخاصة' : 'Private Commissions' }}</div>
        <div style="font-weight:600; color:#181715; font-size:14.5px; direction:ltr;">
          <a href="mailto:{{ $email }}" style="color:inherit; text-decoration:none;">{{ $email }}</a>
        </div>
      </div>
      <div>
        <div style="font-size:12px; font-weight:700; color:#888; text-transform:uppercase; margin-bottom:4px;">{{ $isAr ? 'الهاتف المباشر' : 'Direct Line' }}</div>
        <div style="font-weight:600; color:#181715; font-size:14.5px; direction:ltr;">{{ $phone }}</div>
      </div>
    </div>
  </section>

  <!-- Care & FAQ -->
  <section id="care" class="container" style="padding:48px 0 68px;">
    <div class="text-center mb-3">
      <span class="eyebrow">{{ $isAr ? 'العناية والأسئلة الشائعة' : 'Care & Inquiries' }}</span>
      <h2 class="section-heading mt-1">{{ $isAr ? 'الأسئلة الأكثر تكراراً' : 'Frequently Asked Questions' }}</h2>
    </div>

    <div class="faq-list">
      <div class="faq-item open">
        <button class="faq-q" onclick="this.parentElement.classList.toggle('open')">
          <span>{{ $isAr ? 'كيف تثبت الدلايات داخل مسار إسورة جلايدر™ دون أن تسقط؟' : 'How do charms stay inside the track without falling off?' }}</span>
          <span>+</span>
        </button>
        <div class="faq-a">
          {{ $isAr 
            ? 'تُصاغ كل دلاية ببروز انزلاقي على شكل حرف T يستقر بدقة داخل التجويف المحفور في الإسورة. طالما الإسورة مغلقة على معصمك، تنزلق الدلايات بنعومة وتدور بالعرض ولكنها لا يمكن أن تسقط حتى تفتحي قفل الأمان الخفي.'
            : 'Each charm is precision-milled with a T-shaped tongue that rests securely inside the recessed channel. While the bangle is clasped on your wrist, charms slide effortlessly and rotate horizontally, but cannot detach until the clasp is opened.' }}
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="this.parentElement.classList.toggle('open')">
          <span>{{ $isAr ? 'هل الذهب مصمت وحقيقي مع شهادة فحص؟' : 'Is the gold solid and certified?' }}</span>
          <span>+</span>
        </button>
        <div class="faq-a">
          {{ $isAr
            ? 'نعم بكل تأكيد، نستخدم حصرياً الذهب الخالص عيار 14K النقي وغير المفرغ والفضة الإسترلينية 925، ومختومة بختم الأتيليه الكويتي الرسمي مع بطاقة ضمان وتوثيق لكل قطعة.'
            : 'Absolutely. We exclusively cast in solid 14K gold and 925 sterling silver, hallmarked with official atelier stamps and accompanied by an authenticity certificate.' }}
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="this.parentElement.classList.toggle('open')">
          <span>{{ $isAr ? 'هل يمكنني شراء دلايات إضافية لاحقاً وإضافتها للإسورة؟' : 'Can I collect more charms later for my bangle?' }}</span>
          <span>+</span>
        </button>
        <div class="faq-a">
          {{ $isAr
            ? 'نعم، تتسع الإسورة لما يصل إلى 8 دلايات على المسار الأمامي و 8 على المسار الخلفي (16 دلاية بالإجمالي). يمكنك اقتناء دلايات جديدة في كل مناسبة وإضافتها بنفسك بكل سهولة.'
            : 'Yes, every bangle accommodates up to 8 charms on the front track and 8 on the back (16 total). You can collect standalone charms at any future milestone and glide them on effortlessly.' }}
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  function updateSizingReadout() {
    const slider = document.getElementById('wristSlider');
    if (!slider) return;
    const cm = parseFloat(slider.value);
    const inches = (cm / 2.54).toFixed(1);
    const mm = Math.round(cm * 10);
    document.getElementById('wristReadout').textContent = `${cm.toFixed(1)} cm (${inches}")`;

    let sizeKey = 'S';
    let label = 'S (6.0" Circumference)';
    if (mm < 145) { sizeKey = 'XS'; label = 'XS (5.5" Circumference)'; }
    else if (mm < 159) { sizeKey = 'S'; label = 'S (6.0" Circumference)'; }
    else if (mm < 172) { sizeKey = 'M'; label = 'M (6.5" Circumference)'; }
    else { sizeKey = 'L'; label = 'L (7.0" Circumference)'; }

    document.getElementById('recommendedSizeLabel').textContent = label;
    const link = document.getElementById('recommendedStudioLink');
    if (link) {
      const isAr = "{{ app()->getLocale() }}" === 'ar';
      link.href = "{{ route('studio') }}?size=" + sizeKey;
      link.textContent = isAr ? `تخصيص مقاس ${sizeKey} في استوديو 3D ←` : `Customize Size ${sizeKey} in 3D →`;
    }
  }

  const slider = document.getElementById('wristSlider');
  slider?.addEventListener('input', updateSizingReadout);
</script>
@endpush
