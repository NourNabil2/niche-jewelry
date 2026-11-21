/* ==========================================================================
   NICH JEWELRY — DUMMY DATABASE & CATALOG SEED
   ========================================================================== */

window.EP_DB = {
  brand: {
    name: 'NICH JEWELRY',
    tagline: 'Bespoke Fine Jewelry & 3D Glider Atelier',
    freeShippingThreshold: 150,
    taxRate: 0.08
  },

  boutiques: [
    {
      id: 'btq_kuwait_avenues',
      name_ar: 'بوتيك غراند أفينيو - الكويت (الفلاجشيب)',
      name_en: 'The Avenues Flagship Boutique - Kuwait',
      country_ar: 'الكويت',
      country_en: 'Kuwait',
      city_ar: 'مدينة الكويت',
      city_en: 'Kuwait City',
      location_ar: 'مجمع الأفنيوز، منطقة برستيج (Prestige District)، الدور الأرضي',
      location_en: 'The Avenues Mall, Prestige District, Ground Floor',
      hours_ar: 'السبت - الخميس: 10:00 ص – 10:00 م | الجمعة: 1:00 م – 10:00 م',
      hours_en: 'Sat–Thu: 10:00 AM – 10:00 PM | Fri: 1:00 PM – 10:00 PM',
      phone: '+965 2200 4455',
      whatsapp: '+965 9988 7766',
      map_url: 'https://maps.google.com/?q=The+Avenues+Mall+Kuwait',
      is_flagship: true,
      status: 'active',
      services_ar: ['صالة كبار الشخصيات VIP', 'استشارة تصميم 3D مخصصة', 'استلام مباشر وصيانة فورية'],
      services_en: ['Private VIP Salon', 'Bespoke 3D Atelier Consultation', 'Instant In-Boutique Pickup & Care']
    },
    {
      id: 'btq_kuwait_salhiya',
      name_ar: 'بوتيك الصالحية الفاخر - الكويت',
      name_en: 'Salhiya Luxury Boutique - Kuwait',
      country_ar: 'الكويت',
      country_en: 'Kuwait',
      city_ar: 'العاصمة، الكويت',
      city_en: 'Capital City, Kuwait',
      location_ar: 'مجمع الصالحية التجاري، الميزانين الأول، ردهة المجوهرات',
      location_en: 'Salhiya Complex, Mezzanine 1, Fine Jewelry Gallery',
      hours_ar: 'يومياً: 10:00 ص – 9:30 م',
      hours_en: 'Daily: 10:00 AM – 9:30 PM',
      phone: '+965 2244 8899',
      whatsapp: '+965 9988 7766',
      map_url: 'https://maps.google.com/?q=Salhiya+Complex+Kuwait',
      is_flagship: false,
      status: 'active',
      services_ar: ['معاينة التشكيلات الحصرية', 'نقش ليزر تذكاري فوري', 'خدمة الضيافة الملكية'],
      services_en: ['Exclusive Previews', 'On-Site Laser Inscription', 'Complimentary Concierge Service']
    }
  ],

  promos: {
    'NICHE15': { code: 'NICHE15', type: 'percent', value: 15, minSubtotal: 0, label: '15% Off Entire Order' },
    'NICH15': { code: 'NICH15', type: 'percent', value: 15, minSubtotal: 0, label: '15% Off Entire Order' },
    'ELISE15': { code: 'ELISE15', type: 'percent', value: 15, minSubtotal: 0, label: '15% Off Entire Order' },
    'ATELIER20': { code: 'ATELIER20', type: 'percent', value: 20, minSubtotal: 500, label: '20% Off Orders $500+' },
    'WELCOME50': { code: 'WELCOME50', type: 'fixed', value: 50, minSubtotal: 300, label: '$50 Off Orders $300+' }
  },

  metals: {
    yellow: { key: 'yellow', name: '18K Yellow Gold', short: '18K Gold', stamp: '18K AU' },
    white:  { key: 'white',  name: '925 Sterling Silver', short: '925 Silver', stamp: '925 AG' },
    rose:   { key: 'rose',   name: '18K Rose Gold', short: '18K Rose', stamp: '18K RG' }
  },

  sizes: [
    { key: 'XS', label: 'XS (5.5")', wristMm: '135–145 mm' },
    { key: 'S',  label: 'S (6.0")',  wristMm: '146–158 mm' },
    { key: 'M',  label: 'M (6.5")',  wristMm: '159–171 mm' },
    { key: 'L',  label: 'L (7.0")',  wristMm: '172–184 mm' }
  ],

  charmsCatalog: {
    symbols: [
      { id: 'bee', title: 'Mother of Pearl Bee', imgUrl: '/assets/charms/bee_gold.png', widthMm: 4.6, heightMm: 4.4, price: 45 },
      { id: 'martini', title: 'Martini with Olive', imgUrl: '/assets/charms/martini_gold.png', widthMm: 4.8, heightMm: 4.3, price: 45 },
      { id: 'cherries', title: 'Red Enamel Cherries', imgUrl: '/assets/charms/cherries.png', widthMm: 4.4, heightMm: 4.4, price: 45 },
      { id: 'heart', title: 'Solid Gold Heart', imgUrl: '/assets/charms/heart_gold.png', widthMm: 4.3, heightMm: 4.2, price: 45 },
      { id: 'eye', title: 'Evil Eye Charm', imgUrl: '/assets/charms/eye_gold.png', widthMm: 4.8, heightMm: 3.8, price: 45 },
      { id: 'star', title: 'Gold Star Charm', imgUrl: '/assets/charms/star_gold.png', widthMm: 4.4, heightMm: 4.4, price: 45 }
    ],
    letters: 'abcdefghijklmnopqrstuvwxyz'.split(''),
    numbers: '0123456789'.split('')
  },

  products: [
    {
      id: 'glider-18k-gold',
      sku: 'EP-GLD-001',
      title: 'Personalized Glider Charm Bangle™',
      title_ar: 'إسورة جلايدر™ بوجهين من الذهب الخالص عيار 18K',
      category_ar: 'أساور جلايدر™',
      description_ar: 'إسورتنا الأيقونية الحاصلة على براءة اختراع والمصممة بمسارين مفرغين متوازيين على الوجهين الأمامي والخلفي. زحلقي الحروف الذهبية والأيقونات المرصعة بالألماس بحرية تامة.',
      specs_ar: ["ذهب خالص عيار 18 قيراط (AU 750) معاد تدويره ومستدام", "مسار جلايدر مزدوج عالي الدقة (أمامي وخلفي)", "قفل خفي بزر ضغط ونقرة أمان مسموعة", "عرض الإسورة: 5.0 مم • عمق المسار: 0.85 مم", "تتسع حتى 8 دلايات لكل مسار (16 دلاية في المجمل)"],
      category: 'Bangles',
      categorySlug: 'bangles',
      price: 410,
      compareAtPrice: 465,
      defaultMetal: 'yellow',
      availableMetals: ['yellow', 'white', 'rose'],
      imagesByMetal: {
        yellow: '/assets/images/bangle_gold_studio.jpg',
        white:  '/assets/images/bangle_silver_studio.jpg',
        rose:   '/assets/images/bangle_rose_studio.jpg'
      },
      gallery: [
        '/assets/images/bangle_gold_studio.jpg',
        '/assets/images/hero_editorial.jpg',
        '/assets/images/craftsmanship_editorial.jpg',
        '/assets/images/bangle_silver_studio.jpg'
      ],
      badge: '3D Studio',
      customizable3d: true,
      hasSizes: true,
      rating: 4.9,
      reviewCount: 142,
      description: 'Our patented signature hinged bangle engineered with precision dual-sided recessed glider tracks. Slide solid 18K gold initials, Mother of Pearl icons, and natural pavé diamond charms onto both the front and back channels—drag, rotate, and rearrange freely anytime.',
      specs: [
        'Solid 18K Recycled Gold or 925 Sterling Silver',
        'Dual-track precision glider channel (Front & Back)',
        'Concealed push-button box clasp with safety click',
        'Band Height: 5.0mm • Channel Depth: 0.85mm',
        'Holds up to 8 charms per side (16 total)'
      ]
    },
    {
      id: 'glider-925-silver',
      sku: 'EP-SLV-002',
      title: '925 Sterling Silver Glider Bangle',
      title_ar: 'إسورة جلايدر™ من الفضة الإسترليني 925 الإيطالية',
      category_ar: 'أساور جلايدر™',
      description_ar: 'فضة إسترليني إيطالية نقية عيار 925 مصقولة يدوياً ومطلية بالروديوم المقاوم للأكسدة، مزودة بمسار جلايدر المزدوج للتنسيق والانزلاق الفوري في استوديو الـ 3D.',
      specs_ar: ["فضة إسترليني 925 مختومة بختم الأتيليه مع طلاء الروديوم البلاتيني", "متوافقة بالكامل مع كافة دلايات جلايدر (أحرف، أرقام ورموز)", "مقاومة للماء ومناسبة للبشرة الحساسة"],
      category: 'Bangles',
      categorySlug: 'bangles',
      price: 225,
      compareAtPrice: null,
      defaultMetal: 'white',
      availableMetals: ['white', 'yellow', 'rose'],
      imagesByMetal: {
        white:  '/assets/images/bangle_silver_studio.jpg',
        yellow: '/assets/images/bangle_gold_studio.jpg',
        rose:   '/assets/images/bangle_rose_studio.jpg'
      },
      gallery: [
        '/assets/images/bangle_silver_studio.jpg',
        '/assets/images/hero_editorial.jpg',
        '/assets/images/bangle_gold_studio.jpg'
      ],
      badge: '3D Studio',
      customizable3d: true,
      hasSizes: true,
      rating: 4.8,
      reviewCount: 68,
      description: 'Hand-polished Italian 925 sterling silver with rhodium anti-tarnish finish and our signature dual-sided charm glider groove. Designed for cool minimalist stacking and effortless customization in our 3D Atelier.',
      specs: [
        'Hallmarked 925 Sterling Silver with Platinum-family Rhodium plating',
        'Compatible with all Glider Charms (letters, numbers & icons)',
        'Water-resistant & hypoallergenic finish'
      ]
    },
    {
      id: 'glider-rose-gold',
      sku: 'EP-RSG-003',
      title: '18K Rose Gold Blush Glider Bangle',
      title_ar: 'إسورة جلايدر™ المخملية من الذهب الوردي عيار 18K',
      category_ar: 'أساور جلايدر™',
      description_ar: 'مصاغة من الذهب الوردي الدافئ عيار 18 قيراط، تعانق المعصم بنعومة بيضاوية وتضم مساري جلايدر لحفر أجمل الذكريات على الوجهين.',
      specs_ar: ["ذهب وردي خالص عيار 18 قيراط (75% ذهب نقي مسبوك بالنحاس النبيل)", "سطح داخلي مصقول كمرآة مع ختم العيار الرسمي", "قابلة للتخصيص بالكامل على المسارين الأمامي والخلفي"],
      category: 'Bangles',
      categorySlug: 'bangles',
      price: 430,
      compareAtPrice: null,
      defaultMetal: 'rose',
      availableMetals: ['rose', 'yellow', 'white'],
      imagesByMetal: {
        rose:   '/assets/images/bangle_rose_studio.jpg',
        yellow: '/assets/images/bangle_gold_studio.jpg',
        white:  '/assets/images/bangle_silver_studio.jpg'
      },
      gallery: [
        '/assets/images/bangle_rose_studio.jpg',
        '/assets/images/craftsmanship_editorial.jpg'
      ],
      badge: '3D Studio',
      customizable3d: true,
      hasSizes: true,
      rating: 4.9,
      reviewCount: 41,
      description: 'Cast in warm blush-toned 18K Rose Gold, this slim hinged oval cuff hugs the wrist comfortably while housing our dual-sided charm glider rail.',
      specs: [
        'Solid 18K Rose Gold (75% Pure Gold alloyed with copper)',
        'High-gloss mirror interior with embossed hallmark',
        'Dual front & back glider capability'
      ]
    },
    {
      id: 'glider-wide-cuff',
      sku: 'EP-WDE-004',
      title: 'Atelier Collector Stack Duo (2 Bangles)',
      title_ar: 'طقم إسوارتين متراصتين من مجموعة المقتنين (Duo Stack)',
      category_ar: 'أساور جلايدر™',
      description_ar: 'تنسيق متراص يجمع بين إسوارتين جلايدر من الذهب عيار 18K ببريق متكامل يعكس قمة الفخامة العصرية على معصمكِ.',
      specs_ar: ["إسوارتان جلايدر أصليتان من الذهب الخالص عيار 18K", "توفير استثنائي لمقتني الدار بنسبة تتجاوز 15%", "علبة إهداء حصرية وتغليف فاخر مختوم بالشمع الأحمر"],
      category: 'Bangles',
      categorySlug: 'bangles',
      price: 760,
      compareAtPrice: 820,
      defaultMetal: 'yellow',
      availableMetals: ['yellow', 'white', 'rose'],
      imagesByMetal: {
        yellow: '/assets/images/hero_editorial.jpg',
        white:  '/assets/images/bangle_silver_studio.jpg',
        rose:   '/assets/images/bangle_rose_studio.jpg'
      },
      gallery: [
        '/assets/images/hero_editorial.jpg',
        '/assets/images/bangle_gold_studio.jpg'
      ],
      badge: 'Save $60',
      customizable3d: true,
      hasSizes: true,
      rating: 5.0,
      reviewCount: 34,
      description: 'Pair our iconic 18K Personalized Glider Bangle with a matching everyday stacking band at preferred atelier pricing. Customize your primary bangle directly in our 3D studio.',
      specs: [
        'Includes 1x Personalized Glider Bangle + 1x Hammered Mirror Band',
        'Packaged in dual velvet collector presentation box'
      ]
    },
    {
      id: 'charm-bee-mop',
      sku: 'EP-CHM-101',
      title: 'Mother of Pearl Bee Glider Charm',
      title_ar: 'دلاية نحلة عرق اللؤلؤ والذهب الخالص عيار 18K',
      category_ar: 'دلايات جلايدر',
      description_ar: 'منحوتة يدوياً من عرق اللؤلؤ الطبيعي المتلألئ مع أجنحة من الذهب عيار 18 قيراط، مصممة للانزلاق بسلاسة فائقة.',
      specs_ar: ["ذهب خالص عيار 18 قيراط وعرق لؤلؤ أسترالي طبيعي", "لسان انزلاق حرف T حاصل على براءة اختراع", "أبعاد القطعة: 4.6 × 4.4 مم"],
      category: 'Glider Charms',
      categorySlug: 'charms',
      price: 65,
      compareAtPrice: null,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/charms/bee_gold.png' },
      gallery: ['/assets/charms/bee_gold.png', '/assets/charms/bee_white.png'],
      isCharmImage: true,
      badge: 'Best Seller',
      customizable3d: false,
      hasSizes: false,
      rating: 4.9,
      reviewCount: 93,
      description: 'Sculpted in solid 18K yellow gold and inlaid with luminous hand-carved white Mother of Pearl wings and glossy black enamel stripes. Engineered to glide smoothly onto any Nich Jewelry bangle track.',
      specs: [
        '18K Solid Yellow Gold frame & slider notch',
        'Genuine Iridescent Mother of Pearl wing inlays',
        'Dimensions: 4.6mm x 4.4mm'
      ]
    },
    {
      id: 'charm-martini-olive',
      sku: 'EP-CHM-102',
      title: 'Martini with Enamel Olive Charm',
      title_ar: 'دلاية كأس المارتيني والزيتونة بالمينا والذهب 18K',
      category_ar: 'دلايات جلايدر',
      description_ar: 'دلاية مرحة وأنيقة مصاغة من الذهب عيار 18 ومطلية بالمينا الخضراء للزيتونة، تضفي لمسة عصرية فريدة على مسار إسورتكِ.',
      specs_ar: ["ذهب خالص 18K ومينا فرنسية سائلة معالجة حرارياً", "حركة انزلاقية حرة بزاوية 360 درجة", "أبعاد القطعة: 4.8 × 4.3 مم"],
      category: 'Glider Charms',
      categorySlug: 'charms',
      price: 60,
      compareAtPrice: null,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/charms/martini_gold.png' },
      gallery: ['/assets/charms/martini_gold.png', '/assets/charms/martini_white.png'],
      isCharmImage: true,
      badge: 'Cult Favorite',
      customizable3d: false,
      hasSizes: false,
      rating: 5.0,
      reviewCount: 112,
      description: 'Equal parts playful and refined. Our signature cocktail glider features crisp white enamel and a hand-painted pimento green olive skewer set in 18K solid gold.',
      specs: [
        '18K Solid Yellow Gold & Italian vitreous enamel',
        'Fits seamlessly into Front & Back glider tracks'
      ]
    },
    {
      id: 'charm-pave-heart',
      sku: 'EP-CHM-103',
      title: 'Pavé Diamond Open Heart Charm',
      title_ar: 'دلاية قلب الذهب الخالص المرصع بالألماس بافيه 18K',
      category_ar: 'دلايات جلايدر',
      description_ar: 'قلب مفعم بالبريق مرصع بأحجار الماس الطبيعي النقي بتقنية المايكرو-بافيه على قاعدة من الذهب الخالص عيار 18 قيراط.',
      specs_ar: ["ذهب خالص 18K وألماس طبيعي بدرجة نقاء VS1 ولون F", "تثبيت محكم بحافة ناعمة مضادة للخدش", "أبعاد القطعة: 4.3 × 4.2 مم"],
      category: 'Glider Charms',
      categorySlug: 'charms',
      price: 95,
      compareAtPrice: null,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/charms/heart_gold.png' },
      gallery: ['/assets/charms/heart_gold.png'],
      isCharmImage: true,
      badge: 'Natural Diamonds',
      customizable3d: false,
      hasSizes: false,
      rating: 4.9,
      reviewCount: 77,
      description: 'Twelve conflict-free G-H VS natural micro-pavé diamonds set into an airy open heart silhouette. Catches light from every wrist movement.',
      specs: [
        '0.08 ctw Conflict-Free G-H VS Natural Diamonds',
        'Solid 18K Yellow Gold',
        '4.3mm x 4.2mm glider profile'
      ]
    },
    {
      id: 'charm-cherries-enamel',
      sku: 'EP-CHM-104',
      title: 'Rouge Enamel Cherries Charm',
      title_ar: 'دلاية كرز المينا القرمزي والذهب الخالص عيار 18K',
      category_ar: 'دلايات جلايدر',
      description_ar: 'حبات الكرز القرمزية بلمعان زجاجي مذهل على غصن من الذهب النقي عيار 18، صُممت لتنشر البهجة على معصمكِ.',
      specs_ar: ["ذهب خالص عيار 18 قيراط ومينا قرمزية شفافة", "انزلاق سلس وآمن لا يسقط حتى فتح قفل الإسورة", "أبعاد القطعة: 4.4 × 4.4 مم"],
      category: 'Glider Charms',
      categorySlug: 'charms',
      price: 55,
      compareAtPrice: null,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/charms/cherries.png' },
      gallery: ['/assets/charms/cherries.png'],
      isCharmImage: true,
      badge: 'New',
      customizable3d: false,
      hasSizes: false,
      rating: 4.8,
      reviewCount: 29,
      description: 'Glossy cherry-red enamel pair suspended from delicate 18K gold stems. Adds a vivid Parisian pop of color to your everyday stack.',
      specs: [
        '18K Yellow Gold stems & slider channel',
        'Hand-fired cherry crimson & leaf green enamel'
      ]
    },
    {
      id: 'charm-evil-eye',
      sku: 'EP-CHM-105',
      title: 'Protective Evil Eye Glider Charm',
      title_ar: 'دلاية عين الحسد الزرقاء بالياقوت والألماس 18K',
      category_ar: 'دلايات جلايدر',
      description_ar: 'تميمة الحماية الأزلية مرصعة بحجر ياقوت أزرق طبيعي في المركز وهالة من الألماس البراق على الذهب عيار 18.',
      specs_ar: ["ذهب خالص 18K، ياقوت أزرق طبيعي وألماس نقي", "رمز حماية عريق بصياغة حِرفية متوارثة", "أبعاد القطعة: 4.8 × 3.8 مم"],
      category: 'Glider Charms',
      categorySlug: 'charms',
      price: 75,
      compareAtPrice: null,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/charms/eye_gold.png' },
      gallery: ['/assets/charms/eye_gold.png'],
      isCharmImage: true,
      badge: null,
      customizable3d: false,
      hasSizes: false,
      rating: 4.9,
      reviewCount: 54,
      description: 'Hand-crafted protective talisman featuring rich cobalt sapphire enamel, white mother-of-pearl sclera, and a 18K gold outline.',
      specs: [
        '18K Yellow Gold',
        'Precision 4.8mm wide horizontal glider cut'
      ]
    },
    {
      id: 'charm-pave-letter',
      sku: 'EP-CHM-106',
      title: 'Diamond Pavé Initial Glider (A–Z)',
      title_ar: 'دلاية حرف شخصي بالألماس الطبيعي بافيه (A-Z) عيار 18K',
      category_ar: 'دلايات جلايدر',
      description_ar: 'حرفكِ أو حرف من تحبين مصاغ بالذهب عيار 18 ومرصع بمايكرو-بافيه من الألماس الطبيعي لبريق استثنائي لا ينطفئ.',
      specs_ar: ["ذهب خالص 18K وألماس طبيعي نقي عالي البريق", "متوفرة بكافة الحروف الإنجليزية من A إلى Z", "متوافقة مع الصياغة الفورية للأسماء في استوديو 3D"],
      category: 'Glider Charms',
      categorySlug: 'charms',
      price: 85,
      compareAtPrice: null,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/charms/letter_e_pave.png' },
      gallery: ['/assets/charms/letter_e_pave.png', '/assets/charms/letter_a_pave.png', '/assets/charms/letter_m_pave.png', '/assets/charms/letter_s_pave.png'],
      isCharmImage: true,
      hasLetterPicker: true,
      badge: 'Customizable',
      customizable3d: false,
      hasSizes: false,
      rating: 5.0,
      reviewCount: 164,
      description: 'Spell names, dates, or secret initials with shimmering natural micro-pavé diamond letters milled to glide effortlessly along our signature bangle channel.',
      specs: [
        'Available in full alphabet A–Z',
        '0.05–0.09 ctw G-H VS Natural Diamonds',
        'Precision laser-milled 18K gold housing'
      ]
    },
    {
      id: 'necklace-mop-medallion',
      sku: 'EP-NCK-201',
      title: 'Lumière Mother of Pearl Medallion Necklace',
      title_ar: 'قلادة بوصلة عرق اللؤلؤ والألماس والذهب 18K',
      category_ar: 'سلاسل وقلائد',
      description_ar: 'ميدالية ملكية تستحضر بوصلة النجوم بعرق اللؤلؤ الطبيعي ونجمة مركزية من الألماس على سلسلة ذهب عيار 18 قابلة للتعديل.',
      specs_ar: ["ذهب خالص عيار 18 قيراط وعرق لؤلؤ طبيعي وألماس", "سلسلة قابلة للتعديل بطول 40 سم و 45 سم", "قفل لوبستر آمن ومختوم بختم الدار"],
      category: 'Necklaces',
      categorySlug: 'necklaces',
      price: 340,
      compareAtPrice: 380,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/images/necklace_pendant_studio.jpg' },
      gallery: ['/assets/images/necklace_pendant_studio.jpg', '/assets/images/hero_editorial.jpg'],
      badge: 'Best Seller',
      customizable3d: false,
      hasSizes: false,
      rating: 4.9,
      reviewCount: 47,
      description: 'Suspended from a luminous 18K solid gold cable chain (adjustable 16"–18"), our Lumière Medallion pairs milky white Mother of Pearl with bezel-set natural diamond stars.',
      specs: [
        '18K Solid Yellow Gold 16"–18" adjustable cable chain',
        '14mm Natural White Mother of Pearl cabochon',
        '0.04 ctw Bezel-Set Diamonds'
      ]
    },
    {
      id: 'earrings-pave-huggies',
      sku: 'EP-EAR-301',
      title: 'Étoile Diamond Pavé Sculpted Huggies',
      title_ar: 'أقراط بافيه دائرية من الألماس والذهب الخالص عيار 18K',
      category_ar: 'أقراط بافيه',
      description_ar: 'أقراط هوجي دائرية مرصعة بصفين متوازيين من الألماس الطبيعي البافيه، صُممت للأناقة اليومية الدائمة بأعلى درجات الراحة.',
      specs_ar: ["ذهب خالص عيار 18 قيراط وزوج أقراط متكامل", "قفل كليك مريح وآمن للنوم والارتداء المستمر", "قطر القرط: 11 مم"],
      category: 'Earrings',
      categorySlug: 'earrings',
      price: 295,
      compareAtPrice: null,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/images/earrings_huggie_studio.jpg' },
      gallery: ['/assets/images/earrings_huggie_studio.jpg'],
      badge: 'Sold as Pair',
      customizable3d: false,
      hasSizes: false,
      rating: 4.8,
      reviewCount: 38,
      description: 'Chubby, sculptural 18K gold hoops traced along the front arc with continuous sparkle of natural pavé diamonds. Engineered with a seamless snap click closure built for sleeping and showering.',
      specs: [
        '18K Solid Yellow Gold • Outer Diameter: 12mm',
        '0.16 ctw G-H VS Natural Diamonds',
        'Sold as a matched pair'
      ]
    },
    {
      id: 'ring-bezel-stack',
      sku: 'EP-RNG-401',
      title: 'Atelier Dual Bezel & Pavé Ring Set',
      title_ar: 'خاتم سوليتير بيزل المتراص بالألماس والذهب 18K',
      category_ar: 'خواتم متراصة',
      description_ar: 'خاتم أنيق بحجر ماسي عائم في إطار بيزل ناعم بدون مخالب، صُمم ليتراص بتناغم مطلق مع خواتم الدار الأخرى.',
      specs_ar: ["ذهب خالص عيار 18 قيراط وألماسة طبيعية بوزن 0.20 قيراط", "إطار بيزل أملس يمنع التعلق بالأقمشة", "متوفر بكافة المقاسات الرسمية"],
      category: 'Rings',
      categorySlug: 'rings',
      price: 320,
      compareAtPrice: 360,
      defaultMetal: 'yellow',
      availableMetals: ['yellow'],
      imagesByMetal: { yellow: '/assets/images/ring_solitaire_studio.jpg' },
      gallery: ['/assets/images/ring_solitaire_studio.jpg', '/assets/images/craftsmanship_editorial.jpg'],
      badge: 'Save $40',
      customizable3d: false,
      hasSizes: false,
      rating: 4.9,
      reviewCount: 52,
      description: 'Two effortless stacking silhouettes crafted as one harmonious pair: an oval bezel-set natural diamond solitaire ring and a delicate half-eternity pavé band.',
      specs: [
        'Solid 18K Yellow Gold',
        'Combined 0.24 ctw Natural White Diamonds',
        'Available in Ring Sizes 5–9 (specify in gift note or checkout)'
      ]
    }
  ],

  initialReviews: {
    'glider-18k-gold': [
      { id: 'rev_1', author: 'Sophia M.', location: 'New York, NY', rating: 5, date: '2026-10-18', title: 'Even better in person!', body: 'Used the 3D studio to plan my initials on the front and the Bee + Martini charms hidden on the back side. The hinge click feels super solid and luxurious.', verified: true },
      { id: 'rev_2', author: 'Nadia K.', location: 'Dubai, UAE', rating: 5, date: '2026-10-04', title: 'My everyday staple', body: 'Being able to slide the charms around on the wrist track makes it so fun. Warm 18K gold color matches my Cartier Love bangle seamlessly.', verified: true },
      { id: 'rev_3', author: 'Claire V.', location: 'London, UK', rating: 5, date: '2026-09-22', title: 'The best anniversary gift', body: 'Ordered XS with 4 pavé diamond initials. Packaging felt like an unwrapping ritual.', verified: true }
    ],
    'charm-bee-mop': [
      { id: 'rev_4', author: 'Amira A.', location: 'Cairo, EG', rating: 5, date: '2026-10-12', title: 'Tiny work of art', body: 'The shimmer on the Mother of Pearl wings is stunning against the gold track.', verified: true }
    ],
    'charm-martini-olive': [
      { id: 'rev_5', author: 'Hannah R.', location: 'Los Angeles, CA', rating: 5, date: '2026-10-25', title: 'So chic & cute!', body: 'Everyone notices this tiny martini charm on my wrist.', verified: true }
    ]
  },

  initialOrders: [
    {
      orderNumber: 'NJ-2026-4108',
      createdAt: '2026-10-15T14:22:00Z',
      status: 'Delivered',
      stepIndex: 4, // 0 Confirmed -> 1 Handcrafting -> 2 Inspection -> 3 In Transit -> 4 Delivered
      shippingAddress: {
        fullName: 'Layla Hassan',
        email: 'layla@example.com',
        phone: '+20 100 555 0192',
        street: '14 Zamalek Corniche El Nil',
        city: 'Cairo',
        country: 'Egypt',
        postal: '11211'
      },
      paymentMethod: 'Visa ending in 4242',
      promoCode: 'NICH15',
      subtotal: 500,
      discount: 75,
      shippingCost: 0,
      tax: 34,
      total: 459,
      items: [
        {
          uid: 'hist_item_1',
          type: 'custom-bangle',
          productId: 'glider-18k-gold',
          title: 'Personalized Glider Charm Bangle™ (Custom 3D)',
          metal: 'yellow',
          size: 'S',
          qty: 1,
          unitPrice: 500,
          image: '/assets/images/bangle_gold_studio.jpg',
          frontCharms: [
            { title: 'Mother of Pearl Bee', imgUrl: '/assets/charms/bee_gold.png', rotationDeg: 0 },
            { title: 'Martini with Olive', imgUrl: '/assets/charms/martini_gold.png', rotationDeg: 0 }
          ],
          backCharms: []
        }
      ]
    }
  ]
};

