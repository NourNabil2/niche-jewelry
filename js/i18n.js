// ==========================================================================
// niche JEWELRY — Quiet Luxury Bilingual Translation Engine (AR / EN)
// Classic Script & ESM compatible
// ==========================================================================

(function () {
  const TRANSLATIONS = {
    ar: {
      common: {
        lang_name: 'العربية',
        other_lang: 'English',
        switch_lang_code: 'en',
        currency: '$',
        bangle_title: 'إسورة جلايدر™ بوجهين للدلايات',
        save: 'حفظ التصميم',
        saved: 'تم الحفظ ✦',
        export_glb: 'تصدير 3D',
        close: 'إغلاق',
        loading: 'جاري التحميل...',
        back: 'رجوع',
        next: 'التالي',
        previous: 'السابق',
        view_piece: 'عرض التفاصيل',
        design_in_3d: 'صممي في الـ 3D ✦',
        add_to_bag: 'أضيفي للسلة',
        bag_added: 'تمت الإضافة للسلة ✦',
        reviews: 'تقييمات مقتني الدار',
        based_on_reviews: 'بناءً على تقييمات موثقة',
        stars: 'نجوم',
        details: 'التفاصيل',
        size_guide: 'دليل المقاسات',
        wrist_size: 'قياس المعصم',
        metal_finish: 'نوع ولون المعدن',
        yellow_gold: 'ذهب أصفر 14K',
        sterling_silver: 'فضة إسترليني 925',
        rose_gold: 'ذهب وردي 14K',
        solid_gold_tag: 'ذهب عيار 14 قيراط',
        silver_tag: 'فضة إسترليني 925',
        rose_gold_tag: 'ذهب وردي 14 قيراط'
      },
      nav: {
        shop_all: 'تسوقي الكل',
        studio_3d: 'استوديو الـ 3D',
        charms: 'الدلايات',
        our_story: 'قصة الدار',
        search: 'بحث',
        account: 'حسابي',
        wishlist: 'المفضلة',
        bag: 'حقيبة التسوق',
        announcement: 'شحن مؤمّن مجاني للطلبات فوق $150 • استخدمي كود NICH15 لخصم 15%',
        drawer_menu: 'القائمة',
        drawer_account: 'حسابكِ وطلباتكِ',
        drawer_orders: 'تتبع الطلبات السابقة',
        drawer_saved: 'التصاميم المحفوظة (المفضلة)',
        drawer_care: 'دليل العناية بالمجوهرات',
        drawer_size: 'دليل قياسات المعصم'
      },
      cart: {
        title: 'حقيبة التسوق',
        empty_title: 'حقيبتك فارغة حالياً',
        empty_sub: 'استكشفي أحدث تصاميم المجوهرات الراقية أو ابدئي بتخصيص إسورتكِ الخاصة في استوديو الـ 3D.',
        start_designing: 'ابدأي التصميم في الـ 3D ✦',
        subtotal: 'المجموع الفرعي',
        shipping: 'الشحن',
        free_insured: 'مجاني ومؤمّن',
        promo_label: 'كود الخصم',
        apply: 'تطبيق',
        promo_applied: 'تم تطبيق خصم 15% (NICH15)',
        promo_applied_hint: 'شحن مؤمّن مجاني مُفعّل للطلب!',
        checkout_btn: 'إتمام الطلب بأمان',
        continue_shopping: 'متابعة التسوق',
        remove_item: 'حذف القطعة',
        qty: 'الكمية'
      },
      footer: {
        trust_gold: 'ذهب عيار 14 قيراط مُعاد تدويره',
        trust_glider: 'إسورة جلايدر™ بوجهين حصرية',
        trust_shipping: 'شحن مؤمّن مجاني لكافة الوجهات',
        trust_warranty: 'ضمان الدار الحِرفي مدى الحياة',
        brand_desc: 'مجوهرات راقية مصاغة بعناية فائقة من الذهب الخالص عيار 14 قيراط المعاد تدويره والفضة الإسترليني 925. موطن إسورة جلايدر™ الحاصلة على براءة اختراع.',
        launch_studio: 'استوديو التصميم الـ 3D ✦',
        shop_title: 'مجموعات الدار',
        bangles: 'أساور جلايدر',
        cutout_charms: 'دلايات جلايدر المفرغة',
        necklaces: 'السلاسل والقلائد',
        earrings: 'أقراط بافيه الدائرية',
        rings: 'خواتم الدار المتراصة',
        atelier_title: 'الدار والرعاية',
        our_ethics: 'قصتنا ومصادرنا الأخلاقية',
        sizing_guide: 'دليل مقاسات المعصم',
        gold_care: 'العناية بالذهب والفضة',
        saved_designs: 'التصاميم المحفوظة في الـ 3D',
        track_order: 'تتبع حالة طلبكِ',
        collector_title: 'انضمي لقائمة مقتني الدار',
        collector_sub: 'احصلي على وصول مبكر لأحدث الدلايات الحصرية مع خصم 15% باستخدام كود',
        email_placeholder: 'أدخلي بريدكِ الإلكتروني',
        join_btn: 'انضمي',
        joined_success: 'أهلاً بكِ في قائمة مقتني الدار ✦',
        copyright: '© 2026 دار نيش للمجوهرات الراقية (niche JEWELRY). صياغة حِرفية متوارثة.',
        tag_gold: 'ذهب نقي عيار 14',
        tag_silver: 'فضة 925 إسترليني',
        tag_delivery: 'توصيل مؤمّن',
        tag_secure: 'دفع مشفر وآمن'
      },
      hero: {
        eyebrow: 'استوديو الصياغة ثلاثي الأبعاد ✦ ذهب نقي 14K',
        title: 'صُممت لتنزلق بنعومة.<br>صياغة تعبر عنكِ.',
        sub: 'عيشي تجربة تخصيص المجوهرات الراقية في بيئة ثلاثية الأبعاد تفاعلية فورية. نسّقي دلايات عرق اللؤلؤ الطبيعي، الحروف المرصعة بالماس، والأشكال المصنوعة من الذهب الخالص عيار 14K عبر مساري إسورة جلايدر™ بوجهيها الأمامي والخلفي.',
        cta_studio: 'صممي في استوديو الـ 3D',
        cta_shop: 'تصفحي المجموعات',
        record_ring: '✦ دار نيش للمجوهرات الفاخرة • استوديو 3D • 33⅓ RPM •',
        record_badge: 'أتيليه 14K',
        record_session: '33⅓ RPM • جلسة تصميم 01 • ابدأي التخصيص',
        press_vogue: 'ڤوغ (Vogue)',
        press_harpers: 'هاربرز بازار (Harper\'s Bazaar)',
        press_elle: 'إل أتيليه (Elle Atelier)',
        press_town: 'تاون آند كانتري (Town & Country)'
      },
      customizer: {
        studio_title: 'استوديو جلايدر™ ثلاثي الأبعاد • ذهب خالص 14K',
        back_to_catalog: 'العودة للمجموعات',
        front_side: 'الواجهة الأمامية',
        back_side: 'الواجهة الخلفية',
        step_front_title: 'الخطوة 1: تخصيص الواجهة الأمامية',
        step_front_desc: 'أضيفي الأشكال والحروف للوجه الأمامي من الإسورة.',
        step_back_title: 'الخطوة 2: تخصيص الواجهة الخلفية',
        step_back_desc: 'نسّقي دلايات الوجه الخلفي لتكتمل إطلالة الإسورة المزدوجة.',
        step_review_title: 'الخطوة 3: المعاينة النهائية والتأكيد',
        step_review_desc: 'راجعي تفاصيل القياس، تشطيب المعدن، ودلايات الوجهين قبل الإضافة للسلة.',
        step_badge_front: 'أمامي',
        step_badge_back: 'خلفي',
        step_badge_review: 'معاينة',
        metal_section_title: 'اختيار نوع المعدن وتشطيبه',
        size_section_title: 'تحديد مقاس المعصم',
        tray_empty_tip: 'لم يتم إضافة دلايات في هذا المسار بعد. اختاري أي شكل من الأدراج بالأسفل لإضافته فوراً.',
        center_evenly: 'توسيط بالتساوي',
        free_glide_tip: 'حرية الحركة: اضغطي واسحبي أي دلاية بالماوس أو اللمس لوضعها في أي مكان ترغبين به على الإسورة.',
        drag_tip_bar: 'اسحبي الدلايات بالماوس أو اللمس لتحريكها بحرية في مسار الإسورة',
        rot_badge: 'تدوير',
        swap_left: 'تحريك لليسار',
        swap_right: 'تحريك لليمين',
        rotate_90: 'تدوير 90 درجة',
        remove_charm: 'حذف الدلاية',
        replace_hint: 'محددة للاستبدال: اضغطي على أي دلاية بالأسفل لاستبدال القطعة المختارة.',
        cat_symbols: 'رموز وأشكال الدار',
        cat_letters: 'حروف مرصعة بالماس',
        cat_numbers: 'أرقام الحظ',
        charms_count_label: 'دلايات هذا المسار',
        charms_limit: 'الحد الأقصى 8 دلايات لكل جهة',
        next_to_back: 'التالي: تخصيص الواجهة الخلفية ←',
        prev_to_front: '→ السابق: الواجهة الأمامية',
        next_to_review: 'التالي: مراجعة الطلب والإضافة للسلة ←',
        prev_to_back: '→ السابق: تعديل الواجهة الخلفية',
        finish_and_buy: 'أضيفي الإسورة المخصصة للحقيبة ✦',
        dock_front_back: 'الأمامية: {f} · الخلفية: {b}',
        dock_flip_back: 'الخلفية',
        dock_flip_front: 'الأمامية',
        view_front_btn: 'أمامية',
        view_back_btn: 'خلفية',
        view_clasp_btn: 'القفل',
        view_top_btn: 'علوية',
        view_pause_btn: 'إيقاف',
        view_rotate_btn: 'تدوير',
        review_base_price: 'سعر الإسورة الأساسية',
        review_front_charms: 'دلايات الوجه الأمامي',
        review_back_charms: 'دلايات الوجه الخلفي',
        review_total: 'المجموع الإجمالي',
        size_xs: 'صغير جداً (5.5 إنش)',
        size_s: 'صغير (6.0 إنش)',
        size_m: 'متوسط (6.5 إنش)',
        size_l: 'كبير (7.0 إنش)'
      },
      catalog: {
        eyebrow: 'تشكيلة المجوهرات الراقية',
        title: 'كافة قطع دار نيش للمجوهرات',
        sub: 'مصنوعة يدوياً من الذهب الخالص عيار 14K المعاد تدويره والفضة الإسترليني 925. اختاري أي إسورة جلايدر لبدء تخصيصها في استوديو الـ 3D التفاعلي.',
        filter_all: 'كافة القطع',
        filter_bangles: 'أساور جلايدر',
        filter_charms: 'الدلايات',
        filter_necklaces: 'السلاسل والقلائد',
        filter_earrings: 'الأقراط',
        filter_rings: 'الخواتم',
        search_placeholder: 'ابحثي باسم القطعة أو الدلاية...',
        all_metals: 'كافة المعادن',
        sort_featured: 'الترتيب: الأكثر تميزاً',
        sort_low_high: 'السعر: من الأقل للأعلى',
        sort_high_low: 'السعر: من الأعلى للأقل',
        sort_rating: 'التقييم الأعلى',
        showing_count: 'عرض {n} قطعة من المجوهرات الراقية',
        badge_3d: 'استوديو 3D',
        badge_best_seller: 'الأكثر طلباً',
        badge_cult: 'المفضلة لدى المقتنين',
        badge_save: 'خصم {amount}'
      },
      product: {
        home: 'الرئيسية',
        jewelry: 'المجوهرات',
        loading: 'جاري تحميل تفاصيل القطعة...',
        reviews_heading: 'تقييمات مقتني الدار',
        write_review_title: 'أضيفي تقييماً موثقاً',
        your_name: 'اسمكِ الكريم',
        rating_label: 'التقييم',
        rating_5: '★★★★★ (5 نجوم — استثنائية ورائعة)',
        rating_4: '★★★★☆ (4 نجوم — ممتازة جداً)',
        rating_3: '★★★☆☆ (3 نجوم — جيدة)',
        headline: 'عنوان التجربة',
        headline_placeholder: 'موجز عن تجربة القطعة أو تشطيبها...',
        your_review: 'تفاصيل التقييم',
        your_review_placeholder: 'شاركينا انطباعكِ عن بريق الذهب، تناغم الدلايات، أو تجربة استوديو الـ 3D...',
        submit_review: 'إرسال التقييم الموثق',
        acc_materials_title: 'الصياغة اليدوية والمواصفات',
        acc_shipping_title: 'الشحن المؤمّن والإرجاع المجاني خلال 30 يوماً',
        acc_shipping_body: 'تشحن كل قطعة في تغليف الدار الكِتاني الفاخر مع تأمين شامل طوال رحلة التوصيل. شحن مجاني للطلبات فوق $150. يمكن إرجاع القطع غير المستخدمة خلال 30 يوماً.',
        acc_warranty_title: 'ضمان مسار جلايدر الحِرفي مدى الحياة',
        acc_warranty_body: 'نضمن دقة المفصلات والقفل المزدوج ومسارات الانزلاق مدى الحياة ضد أي عيوب تصنيعية.',
        gift_note_label: 'علبة كِتان فاخرة مع بطاقة إهداء مكتوبة بخط اليد مجاناً (اختياري)',
        gift_note_placeholder: 'أضيفي رسالتكِ الخاصة لنطبعها على البطاقة الفاخرة...',
        customizer_cta: 'خصّصي هذه الإسورة في استوديو الـ 3D التفاعلي ←',
        metal_finish: 'نوع وتشطيب المعدن',
        wrist_size: 'مقاس المعصم',
        size_guide_fit: 'دليل المقاس والملاءمة',
        choose_initial: 'اختاري الحرف الأولي',
        initial_label: 'الحرف {letter}',
        complete_stack_eyebrow: 'تنسيق متناغم',
        complete_stack_title: 'أكملي إطلالة مجوهراتكِ',
        view_all: 'عرض الكل',
        add_to_bag_price: 'أضيفي للحقيبة • ${price}',
        toast_wishlist_added: 'تم الحفظ في قائمة مفضلتكِ ♥',
        toast_wishlist_removed: 'تم الحذف من المفضلة'
      },
      wishlist: {
        eyebrow: 'خزانة التصاميم الشخصية',
        title: 'التصاميم المحفوظة والمفضلة',
        sub: 'احتفظي بقطع المجوهرات المفضلة لديكِ أو أعيدي فتح تصاميم أساور جلايدر ثلاثية الأبعاد في أي وقت.',
        empty_title: 'قائمة المفضلة فارغة حالياً',
        empty_sub: 'احفظي القطع الجاهزة من المجموعات أو اضغطي "حفظ ♥" داخل استوديو الـ 3D لتخزين أساوركِ المخصصة هنا.',
        open_studio: 'استوديو التصميم الـ 3D',
        browse_catalog: 'تصفحي المجوهرات',
        saved_bangles_title: 'أساور الـ 3D المحفوظة ({n})',
        create_new_design: '+ تصميم 3D جديد',
        saved_pieces_title: 'قطع المجوهرات المحفوظة ({n})',
        custom_3d_badge: 'تصميم 3D مخصص',
        size_label: 'المقاس',
        front_track_label: 'دلايات المسار الأمامي ({n}):',
        back_track_label: 'دلايات المسار الخلفي ({n}):',
        none: 'لا توجد',
        edit_in_3d: 'تعديل في الـ 3D',
        move_to_bag: 'إضافة للحقيبة',
        toast_removed: 'تم الحذف من المفضلة',
        toast_moved_to_bag: 'تم نقل الإسورة المخصصة إلى حقيبة التسوق!'
      },
      checkout: {
        eyebrow: 'دفع مشفر ومؤمّن بالكامل',
        title: 'إتمام الشراء من الدار',
        empty_eyebrow: 'حقيبة التسوق فارغة',
        empty_title: 'لا توجد قطع جاهزة للدفع',
        empty_desc: 'حقيبتكِ فارغة حالياً. صممي إسورة جلايدر مخصصة في الـ 3D أو تصفحي المجوهرات الراقية للمتابعة.',
        open_studio: 'فتح استوديو الـ 3D',
        browse_jewelry: 'تصفح المجوهرات',
        step_shipping: '1. تفاصيل عنوان الشحن',
        required: 'مطلوب',
        full_name: 'الاسم بالكامل',
        email: 'البريد الإلكتروني (لتتبع الشحنة)',
        phone: 'رقم الهاتف الجوال',
        country: 'الدولة',
        street: 'عنوان الشارع ورقم الشقة',
        city: 'المدينة',
        postal: 'الرمز البريدي',
        step_delivery: '2. طريقة الشحن والتوصيل المؤمّن',
        shipping_standard_title: 'توصيل بالناقل المؤمن (3-5 أيام عمل)',
        shipping_standard_sub: 'يشمل حقيبة سفر مخملية وتأميناً شاملاً',
        shipping_express_title: 'شحن جوي سريع عبر DHL Express (1-2 يوم عمل)',
        shipping_express_sub: 'تجهيز فوري وسريع في الأتيليه مع التوقيع عند الاستلام',
        free: 'مجاناً',
        step_payment: '3. تفاصيل الدفع الآمن',
        tab_card: 'بطاقة ائتمانية',
        tab_apple: 'Apple Pay',
        tab_cod: 'الدفع عند الاستلام',
        card_num: 'رقم البطاقة (تجريبي معبأ مسبقاً)',
        card_exp: 'تاريخ الانتهاء (شهر/سنة)',
        card_cvc: 'رمز الأمان (CVC)',
        apple_hint: 'سيتم تفعيل المصادقة الفورية لبصمة الوجه عبر Apple Pay فور الضغط على تأكيد الطلب.',
        cod_hint: 'ادفعي مباشرة لناقل الدار الخاص عند فحص القطعة واستلامها يداً بيد.',
        order_summary_title: 'ملخص الطلب',
        subtotal: 'المجموع الفرعي',
        promo_code: 'كود الخصم',
        promo_placeholder: 'مثال NICH15',
        apply: 'تطبيق',
        shipping: 'الشحن',
        tax: 'ضريبة تقديرية (8%)',
        total: 'المجموع الإجمالي',
        place_order: 'تأكيد الطلب والدفع بأمان',
        security_note: '🔒 تشفير آمن 256 بت • معتمد من دار نيش للمجوهرات',
        receipt_eyebrow: 'تم تأكيد طلبكِ بنجاح',
        receipt_title: 'شكراً لاقتنائكِ من دار نيش',
        receipt_sub: 'تم استلام طلبكِ وسيبدأ حِرفيو الدار في تحضير وتجهيز قطعتكِ بعناية فائقة.',
        order_number: 'رقم الطلب',
        track_in_account: 'تتبع الطلب في حسابي',
        continue_shopping: 'متابعة التسوق'
      },
      account: {
        portal_eyebrow: 'بوابة مقتنيات الدار',
        sign_in_title: 'تسجيل الدخول إلى حسابكِ',
        sign_in_desc: 'تتبعي تصاميم أساور الـ 3D، تاريخ الطلبات، وعناوين التوصيل المفضلة.',
        email: 'البريد الإلكتروني',
        password: 'كلمة المرور',
        sign_in_btn: 'دخول فوري للحساب',
        demo_hint: 'نسخة تجريبية: اضغطي على زر الدخول مباشرة لتسجيل الدخول الفوري.',
        header_eyebrow: 'الملف الشخصي لمقتني الدار',
        sign_out: 'تسجيل الخروج',
        tab_orders: 'سجل الطلبات والتتبع ({n})',
        tab_profile: 'معلومات التوصيل والشحن',
        tab_saved: 'أساور الـ 3D المحفوظة',
        status_placed: 'تم الطلب',
        status_crafted: 'قيد الصياغة',
        status_qa: 'فحص الجودة',
        status_shipped: 'في الطريق',
        status_delivered: 'تم التوصيل',
        carrier: 'شركة الشحن',
        tracking_num: 'رقم التتبع',
        order_date: 'تاريخ الطلب',
        items: 'القطع',
        total_paid: 'المبلغ المدفوع',
        profile_heading: 'عنوان التوصيل المسجل',
        save_profile: 'حفظ التعديلات',
        profile_saved: 'تم حفظ التعديلات بنجاح ✦',
        no_orders_yet: 'لا توجد طلبات سابقة مسجلة بعد.'
      },
      about_page: {
        hero_eyebrow: 'صياغة متوارثة وهندسة دقيقة',
        hero_title: 'قطع أصيلة صُممت لتدوم وهُندست في الـ 3D',
        hero_sub: 'وُلدت دار نيش من شغف إعادة ابتكار إسورة الدلايات الكلاسيكية إلى إسورة معمارية يومية تنزلق فيها الدلايات بسلاسة وصمت ودقة متناهية.',
        craft_eyebrow: 'ذهب خالص عيار 14 قيراط معاد تدويره',
        craft_title: 'ذهب نقي حقيقي • لا طلاء ولا أنابيب مجوفة',
        craft_p1: 'تُصنع إسورة جلايدر™ المزدوجة من الذهب النقي عيار 14 قيراط أو الفضة الإسترليني 925 عبر تقنيات حفر CNC دقيقة وتشطيب يدوي فائق، دون أي معادن رخيصة مطلية. يبلغ عمق كل مجرى بدقة 0.85 مم لتنزلق الدلايات بنعومة دون أن تعلق بالملابس.',
        craft_p2: 'تُرصع كافة دلايات الدار بأحجار الماس الطبيعية بدرجة نقاء G-H VS تحت المجهر، مقترنة بعرق اللؤلؤ الطبيعي المتلألئ والمينا الإيطالية المطلية يدوياً.',
        craft_cta: 'تجربة استوديو الـ 3D ←',
        sizing_eyebrow: 'تصميم بيضاوي مريح لمعصمكِ',
        sizing_title: 'محدد مقاس المعصم التفاعلي',
        sizing_sub: 'حركي شريط القياس حسب محيط معصمكِ الدقيق لاكتشاف مقاس الإسورة الموصى به من دار نيش.',
        sizing_label: 'قياس معصمكِ الدقيق:',
        recommended_size: 'المقاس الموصى به:',
        fit_note: 'نصيحة الملاءمة: صُممت أساور جلايدر بشكل بيضاوي يتبع الانحناء الطبيعي للمعصم لمنع دورانها أثناء الحركة.',
        th_size: 'المقاس',
        th_wrist_in: 'محيط المعصم (إنش)',
        th_wrist_cm: 'محيط المعصم (سم)',
        th_inner_dia: 'القطر الداخلي',
        faq_eyebrow: 'الأسئلة الشائعة',
        faq_title: 'كل ما تودين معرفته عن أساور جلايدر',
        faq_q1: 'كيف تعمل مسارات انزلاق الدلايات الحاصلة على براءة اختراع؟',
        faq_a1: 'تتميز الإسورة بمسارين محفورين بدقة على الوجهين الأمامي والخلفي. تُثبت الدلايات بأمان وتنزلق بسلاسة فائقة داخل المسار مع الحفاظ على استقرارها وثباتها عند التوقف.',
        faq_q2: 'هل الذهب المستخدم خالص ومستدام؟',
        faq_a2: 'نعم، نستخدم حصرياً الذهب الخالص عيار 14 قيراط المعاد تدويره والمعتمد من مجلس الصياغة المسؤولة (RJC)، لضمان بريق دائم لا يتغير أبداً مع مرور الزمن.',
        faq_q3: 'هل يمكنني تغيير وتبديل الدلايات بنفسي في المنزل؟',
        faq_a3: 'نعم بكل سهولة! يتيح القفل الذكي للإسورة فتح بوابة الإدخال لتغيير الدلايات وتنسيقها حسب رغبتكِ وفي أي مناسبة.'
      }
    },
    en: {
      common: {
        lang_name: 'English',
        other_lang: 'العربية',
        switch_lang_code: 'ar',
        currency: '$',
        bangle_title: 'Dual-Sided Glider Charm Bangle™',
        save: 'Save Design',
        saved: 'Saved ✦',
        export_glb: 'Export 3D',
        close: 'Close',
        loading: 'Loading...',
        back: 'Back',
        next: 'Next',
        previous: 'Previous',
        view_piece: 'View Piece',
        design_in_3d: 'Design in 3D ✦',
        add_to_bag: 'Add to Bag',
        bag_added: 'Added to Bag ✦',
        reviews: 'Collector Feedback',
        based_on_reviews: 'Based on verified reviews',
        stars: 'Stars',
        details: 'Details',
        size_guide: 'Size Guide',
        wrist_size: 'Wrist Size',
        metal_finish: 'Metal Finish',
        yellow_gold: '14K Yellow Gold',
        sterling_silver: '925 Sterling Silver',
        rose_gold: '14K Rose Gold',
        solid_gold_tag: '14K Solid Gold',
        silver_tag: '925 Sterling Silver',
        rose_gold_tag: '14K Rose Gold'
      },
      nav: {
        shop_all: 'Shop All',
        studio_3d: '3D Studio',
        charms: 'Charms',
        our_story: 'Our Story',
        search: 'Search',
        account: 'Account',
        wishlist: 'Wishlist',
        bag: 'Shopping Bag',
        announcement: 'COMPLIMENTARY INSURED DELIVERY OVER $150 • USE CODE NICH15 FOR 15% OFF',
        drawer_menu: 'Menu',
        drawer_account: 'Your Account & Orders',
        drawer_orders: 'Track Past Orders',
        drawer_saved: 'Saved 3D Designs',
        drawer_care: 'Jewelry Care Guide',
        drawer_size: 'Wrist Sizing Guide'
      },
      cart: {
        title: 'Shopping Bag',
        empty_title: 'Your Bag is Empty',
        empty_sub: 'Explore our latest fine jewelry creations or start customizing your signature bangle in our 3D Studio.',
        start_designing: 'Design in 3D Studio ✦',
        subtotal: 'Subtotal',
        shipping: 'Shipping',
        free_insured: 'Free Insured Delivery',
        promo_label: 'Promo Code',
        apply: 'Apply',
        promo_applied: '15% Off Applied (NICH15)',
        promo_applied_hint: 'Complimentary insured delivery included!',
        checkout_btn: 'Proceed to Secure Checkout',
        continue_shopping: 'Continue Shopping',
        remove_item: 'Remove item',
        qty: 'Qty'
      },
      footer: {
        trust_gold: 'Solid 14K Recycled Gold',
        trust_glider: 'Patented Dual-Track Glider™',
        trust_shipping: 'Complimentary Insured Shipping',
        trust_warranty: 'Lifetime Atelier Warranty',
        brand_desc: 'Thoughtfully engineered fine jewelry crafted in solid 14K recycled gold and 925 sterling silver. Home of the patented Dual-Sided Glider Charm Bangle™.',
        launch_studio: 'Launch 3D Studio ✦',
        shop_title: 'Shop Jewelry',
        bangles: 'Glider Bangles',
        cutout_charms: 'Cutout Glider Charms',
        necklaces: 'Medallion Necklaces',
        earrings: 'Pavé Huggie Hoops',
        rings: 'Stacking Rings',
        atelier_title: 'Atelier & Care',
        our_ethics: 'Our Story & Ethics',
        sizing_guide: 'Wrist Size Guide',
        gold_care: '14K Gold & Silver Care',
        saved_designs: 'Saved 3D Designs',
        track_order: 'Track Your Order',
        collector_title: 'Join the Collector List',
        collector_sub: 'Receive early access to limited enamel charms & enjoy 15% off with code',
        email_placeholder: 'Enter your email',
        join_btn: 'Join',
        joined_success: 'Welcome to the Collector List ✦',
        copyright: '© 2026 Niche Jewelry Atelier. Handcrafted Excellence.',
        tag_gold: 'Solid 14K Gold',
        tag_silver: '925 Silver',
        tag_delivery: 'Insured Delivery',
        tag_secure: 'Secure Checkout'
      },
      hero: {
        eyebrow: 'The Signature 3D Atelier • 14K Solid Gold',
        title: 'Crafted to Glide.<br>Designed by You.',
        sub: 'Experience fine jewelry personalization in real-time 3D. Arrange Mother of Pearl icons, diamond pavé letters, and solid 14K gold charms across both front and back channels of our hinged Glider Bangle™.',
        cta_studio: 'Design in 3D Studio',
        cta_shop: 'Shop Collections',
        record_ring: '✦ NICHE JEWELRY ATELIER • 3D GLIDER • 33⅓ RPM •',
        record_badge: '14K ATELIER',
        record_session: '33⅓ RPM • Session 01 • Tap to Design',
        press_vogue: 'Vogue',
        press_harpers: 'Harper\'s Bazaar',
        press_elle: 'Elle Atelier',
        press_town: 'Town & Country'
      },
      customizer: {
        studio_title: '3D Dual-Track Glider Atelier • Solid 14K Gold',
        back_to_catalog: 'Back to Collections',
        front_side: 'Front Side',
        back_side: 'Back Side',
        step_front_title: 'Step 1: Front Track Customization',
        step_front_desc: 'Add signature charms and pavé letters to the front channel of your bangle.',
        step_back_title: 'Step 2: Back Track Customization',
        step_back_desc: 'Personalize the reverse channel to create a truly dual-sided heirloom.',
        step_review_title: 'Step 3: Review & Summary',
        step_review_desc: 'Verify your wrist size, metal finish, and arranged tokens before adding to your bag.',
        step_badge_front: 'Front',
        step_badge_back: 'Back',
        step_badge_review: 'Review',
        metal_section_title: 'Select Metal Finish',
        size_section_title: 'Select Wrist Size',
        tray_empty_tip: 'No charms placed in this channel yet. Select any signature piece from the tray below.',
        center_evenly: 'Distribute Evenly',
        free_glide_tip: 'Free Glide Motion: Click or drag any charm along the track to position it anywhere.',
        drag_tip_bar: 'Drag charms with mouse or touch to glide along channels',
        rot_badge: 'deg',
        swap_left: 'Move Left',
        swap_right: 'Move Right',
        rotate_90: 'Rotate 90°',
        remove_charm: 'Remove Charm',
        replace_hint: 'Selected for replacement: tap any charm below to substitute.',
        cat_symbols: 'Symbols & Icons',
        cat_letters: 'Pavé Diamond Letters',
        cat_numbers: 'Lucky Numbers',
        charms_count_label: 'Track Charms',
        charms_limit: 'Up to 8 charms per track',
        next_to_back: 'Next: Back Track Customization →',
        prev_to_front: '← Previous: Front Track',
        next_to_review: 'Next: Review & Add to Bag →',
        prev_to_back: '← Previous: Edit Back Track',
        finish_and_buy: 'Add Customized Bangle to Bag ✦',
        dock_front_back: 'Front: {f} · Back: {b}',
        dock_flip_back: 'Back',
        dock_flip_front: 'Front',
        view_front_btn: 'Front',
        view_back_btn: 'Back',
        view_clasp_btn: 'Clasp',
        view_top_btn: 'Top',
        view_pause_btn: 'Pause',
        view_rotate_btn: 'Rotate',
        review_base_price: 'Base Bangle Price',
        review_front_charms: 'Front Track Charms',
        review_back_charms: 'Back Track Charms',
        review_total: 'Estimated Total',
        size_xs: 'XS (5.5" wrist)',
        size_s: 'S (6.0" wrist)',
        size_m: 'M (6.5" wrist)',
        size_l: 'L (7.0" wrist)'
      },
      catalog: {
        eyebrow: 'Fine Jewelry Collection',
        title: 'Shop All Fine Jewelry',
        sub: 'Crafted in solid 14K recycled gold and 925 sterling silver. Select a Glider Bangle to launch our interactive 3D Studio.',
        filter_all: 'All Pieces',
        filter_bangles: 'Glider Bangles',
        filter_charms: 'Charms',
        filter_necklaces: 'Necklaces',
        filter_earrings: 'Earrings',
        filter_rings: 'Rings',
        search_placeholder: 'Filter pieces by name or charm...',
        all_metals: 'All Metals',
        sort_featured: 'Sort: Featured',
        sort_low_high: 'Price: Low to High',
        sort_high_low: 'Price: High to Low',
        sort_rating: 'Top Rated',
        showing_count: 'Showing {n} fine jewelry pieces',
        badge_3d: '3D STUDIO',
        badge_best_seller: 'BEST SELLER',
        badge_cult: 'CULT FAVORITE',
        badge_save: 'SAVE {amount}'
      },
      product: {
        home: 'Home',
        jewelry: 'Jewelry',
        loading: 'Loading product details...',
        reviews_heading: 'Client Reviews',
        write_review_title: 'Write a Verified Review',
        your_name: 'Your Name',
        rating_label: 'Rating',
        rating_5: '★★★★★ (5 Stars — Exceptional)',
        rating_4: '★★★★☆ (4 Stars — Great)',
        rating_3: '★★★☆☆ (3 Stars — Good)',
        headline: 'Headline',
        headline_placeholder: 'Summary of your experience...',
        your_review: 'Your Review',
        your_review_placeholder: 'Share details about the finish, fit, or 3D studio...',
        submit_review: 'Submit Verified Review',
        acc_materials_title: 'Craftsmanship & Specifications',
        acc_shipping_title: 'Shipping & 30-Day Complimentary Returns',
        acc_shipping_body: 'Every piece ships in signature linen presentation packaging with full transit insurance. Complimentary shipping on orders over $150. Unworn stock pieces may be returned within 30 days.',
        acc_warranty_title: 'Lifetime Glider Track Warranty',
        acc_warranty_body: 'We guarantee the precision tolerances of your bangle\'s hinge, safety box clasp, and dual glider channels for life against mechanical defects.',
        gift_note_label: 'Complimentary Linen Gift Box & Handwritten Note (Optional)',
        gift_note_placeholder: 'Add a short message to include on your embossed card...',
        customizer_cta: 'Personalize This Bangle in Live 3D Studio →',
        metal_finish: 'Metal Finish',
        wrist_size: 'Wrist Size',
        size_guide_fit: 'Size Guide & Fit',
        choose_initial: 'Choose Initial',
        initial_label: 'Letter {letter}',
        complete_stack_eyebrow: 'Style Pairing',
        complete_stack_title: 'Complete Your Stack',
        view_all: 'View All',
        add_to_bag_price: 'Add To Bag • ${price}',
        toast_wishlist_added: 'Saved to your Wishlist ♥',
        toast_wishlist_removed: 'Removed from Wishlist'
      },
      wishlist: {
        eyebrow: 'Personal Atelier Vault',
        title: 'Wishlist & Saved 3D Designs',
        sub: 'Keep track of favorite fine jewelry pieces or reopen your saved Dual-Track 3D Bangle configurations anytime.',
        empty_title: 'Your Wishlist is Empty',
        empty_sub: 'Save finished jewelry pieces from the catalog or click "Save ♥" inside our 3D Studio to store custom bracelet creations here.',
        open_studio: 'Open 3D Studio',
        browse_catalog: 'Browse Catalog',
        saved_bangles_title: 'Saved 3D Bangle Designs ({n})',
        create_new_design: '+ Create New 3D Design',
        saved_pieces_title: 'Saved Jewelry Pieces ({n})',
        custom_3d_badge: 'Custom 3D',
        size_label: 'Size',
        front_track_label: 'Front Track ({n}):',
        back_track_label: 'Back Track ({n}):',
        none: 'None',
        edit_in_3d: 'Edit in 3D',
        move_to_bag: 'Move to Bag',
        toast_removed: 'Removed from Wishlist',
        toast_moved_to_bag: 'Custom 3D Bangle moved to your Shopping Bag!'
      },
      checkout: {
        eyebrow: 'Encrypted & Insured',
        title: 'Atelier Checkout',
        empty_eyebrow: 'Shopping Bag Empty',
        empty_title: 'No Items Ready for Checkout',
        empty_desc: 'Your bag is currently empty. Design a custom 3D glider bracelet or add fine jewelry pieces to proceed.',
        open_studio: 'Open 3D Studio',
        browse_jewelry: 'Browse Jewelry',
        step_shipping: '1. Collector Shipping Details',
        required: 'Required',
        full_name: 'Full Name',
        email: 'Email Address (for Tracking)',
        phone: 'Phone Number',
        country: 'Country',
        street: 'Street Address & Apartment',
        city: 'City',
        postal: 'Postal Code',
        step_delivery: '2. Insured Delivery Method',
        shipping_standard_title: 'Insured Signature Courier (3–5 Business Days)',
        shipping_standard_sub: 'Includes velvet travel pouch & transit insurance',
        shipping_express_title: 'Priority DHL Express Air (1–2 Business Days)',
        shipping_express_sub: 'Expedited atelier dispatch with signature required',
        free: 'FREE',
        step_payment: '3. Payment Details',
        tab_card: 'Credit Card',
        tab_apple: 'Apple Pay',
        tab_cod: 'Cash on Delivery',
        card_num: 'Card Number (Demo Pre-Filled)',
        card_exp: 'Expiration (MM/YY)',
        card_cvc: 'Security Code (CVC)',
        apple_hint: 'Instant Apple Pay biometric authorization will trigger upon clicking Complete Order.',
        cod_hint: 'Pay directly to our armored white-glove courier upon inspection & delivery.',
        order_summary_title: 'Order Summary',
        subtotal: 'Subtotal',
        promo_code: 'Promo Code',
        promo_placeholder: 'e.g. NICH15',
        apply: 'Apply',
        shipping: 'Shipping',
        tax: 'Estimated Tax (8%)',
        total: 'Total',
        place_order: 'Complete Insured Order',
        security_note: '🔒 256-Bit TLS Bank Encryption • Atelier Verified',
        receipt_eyebrow: 'Order Confirmed',
        receipt_title: 'Thank You for Your Order',
        receipt_sub: 'We have received your order. Our master jewelers will prepare your bespoke piece with utmost care.',
        order_number: 'Order Number',
        track_in_account: 'Track in Account',
        continue_shopping: 'Continue Shopping'
      },
      account: {
        portal_eyebrow: 'Atelier Collector Portal',
        sign_in_title: 'Sign In to Your Account',
        sign_in_desc: 'Access your custom 3D bangles, order tracking, and saved shipping preferences.',
        email: 'Email',
        password: 'Password',
        sign_in_btn: 'Sign In to Atelier',
        demo_hint: 'Demo mode: Click sign in directly to access the collector portal.',
        header_eyebrow: 'Collector Profile',
        sign_out: 'Sign Out',
        tab_orders: 'Order History & Tracking ({n})',
        tab_profile: 'Shipping Address & Profile',
        tab_saved: 'Saved 3D Bangles',
        status_placed: 'Placed',
        status_crafted: 'Crafting',
        status_qa: 'Quality Inspection',
        status_shipped: 'In Transit',
        status_delivered: 'Delivered',
        carrier: 'Carrier',
        tracking_num: 'Tracking #',
        order_date: 'Order Date',
        items: 'Items',
        total_paid: 'Total Paid',
        profile_heading: 'Saved Delivery Details',
        save_profile: 'Save Changes',
        profile_saved: 'Profile updated successfully ✦',
        no_orders_yet: 'No past orders recorded yet.'
      },
      about_page: {
        hero_eyebrow: 'Heritage & Engineering',
        hero_title: 'Modern Heirlooms Engineered in 3D',
        hero_sub: 'Born from the desire to reimagine the classic charm bracelet into an architectural everyday bangle with silent gliding precision and limitless expression.',
        craft_eyebrow: 'Solid 14K Recycled Gold',
        craft_title: 'No Plating. No Hollow Tubing.',
        craft_p1: 'Our Dual-Track Glider Bangle is CNC-milled and hand-finished from solid recycled 14K gold or sterling silver—never plated brass. Each recessed channel measures precisely 0.85mm deep so solid gold charms lock smoothly without catching sweaters or hair.',
        craft_p2: 'Every diamond pavé charm uses ethically sourced G-H VS natural stones set under microscope, paired with genuine iridescent Mother of Pearl and hand-fired Italian enamel.',
        craft_cta: 'Experience 3D Studio →',
        sizing_eyebrow: 'Precision Oval Fit',
        sizing_title: 'Interactive Wrist Size Finder',
        sizing_sub: 'Slide to your snug wrist circumference to discover your recommended NICH JEWELRY oval bangle size.',
        sizing_label: 'Your Snug Wrist Measurement:',
        recommended_size: 'Recommended Size:',
        fit_note: 'Fit note: Glider bangles are engineered in an ergonomic oval contour so they drape gracefully without spinning.',
        th_size: 'Size',
        th_wrist_in: 'Wrist Circumference (In)',
        th_wrist_cm: 'Wrist Circumference (Cm)',
        th_inner_dia: 'Inner Diameter',
        faq_eyebrow: 'Frequently Asked Questions',
        faq_title: 'Everything You Need to Know',
        faq_q1: 'How does the patented dual-glider track work?',
        faq_a1: 'Our bangles feature dual recessed channels engineered to 0.85mm depth. Charms glide effortlessly along the track while staying securely captured without risk of falling off.',
        faq_q2: 'Is the gold solid and ethically sourced?',
        faq_a2: 'Yes, we exclusively cast in certified solid 14K recycled gold and 925 sterling silver, ensuring lifetime value without fading or tarnishing.',
        faq_q3: 'Can I add or swap charms myself at home?',
        faq_a3: 'Absolutely! The precision safety clasp includes a secure charm gate that lets you slide new charms on or swap arrangements whenever you like.'
      }
    }
  };

  const STORAGE_KEY = 'niche_lang';

  function getLanguage() {
    try {
      if (typeof localStorage !== 'undefined') {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved === 'ar' || saved === 'en') return saved;
      }
    } catch (e) {}
    // Default to Arabic as requested by user
    return 'ar';
  }

  function t(path, params = {}) {
    const lang = getLanguage();
    const keys = path.split('.');
    let val = TRANSLATIONS[lang];
    for (const k of keys) {
      if (val && val[k] !== undefined) {
        val = val[k];
      } else {
        // Fallback to English if missing in AR
        let fb = TRANSLATIONS.en;
        for (const fbk of keys) {
          if (fb && fb[fbk] !== undefined) fb = fb[fbk];
          else fb = path;
        }
        val = fb;
        break;
      }
    }
    if (typeof val === 'string' && params) {
      for (const [pk, pv] of Object.entries(params)) {
        val = val.replace(new RegExp(`\\{${pk}\\}`, 'g'), pv);
      }
    }
    return val;
  }

  function setLanguage(lang) {
    if (lang !== 'ar' && lang !== 'en') return;
    try {
      if (typeof localStorage !== 'undefined') {
        localStorage.setItem(STORAGE_KEY, lang);
      }
    } catch (e) {}

    applyDocumentLang(lang);
    applyDataI18n();

    // Fire event for any page-specific listeners
    if (typeof window !== 'undefined') {
      window.dispatchEvent(new CustomEvent('niche:languageChange', {
        detail: { lang, dir: lang === 'ar' ? 'rtl' : 'ltr' }
      }));
    }
  }

  function toggleLanguage() {
    const current = getLanguage();
    setLanguage(current === 'ar' ? 'en' : 'ar');
  }

  function applyDocumentLang(lang = getLanguage()) {
    if (typeof document === 'undefined') return;
    const html = document.documentElement;
    if (html) {
      html.setAttribute('lang', lang);
      html.setAttribute('dir', lang === 'ar' ? 'rtl' : 'ltr');
    }
    if (document.body) {
      document.body.setAttribute('dir', lang === 'ar' ? 'rtl' : 'ltr');
    }
  }

  function applyDataI18n() {
    if (typeof document === 'undefined') return;

    document.querySelectorAll('[data-i18n]').forEach(el => {
      const key = el.getAttribute('data-i18n');
      if (key) {
        const translated = t(key);
        if (translated) {
          if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
            el.value = translated;
          } else {
            el.innerHTML = translated;
          }
        }
      }
    });

    document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
      const key = el.getAttribute('data-i18n-placeholder');
      if (key) {
        const translated = t(key);
        if (translated) el.setAttribute('placeholder', translated);
      }
    });

    document.querySelectorAll('[data-i18n-title]').forEach(el => {
      const key = el.getAttribute('data-i18n-title');
      if (key) {
        const translated = t(key);
        if (translated) el.setAttribute('title', translated);
      }
    });
  }

  function getLanguageSwitcherHTML(extraClass = '') {
    const lang = getLanguage();
    const otherLangLabel = lang === 'ar' ? 'English' : 'العربية';

    return `
      <button type="button" class="lang-switcher-pill ${extraClass}" onclick="window.nicheI18n && window.nicheI18n.toggleLanguage()" title="Switch Language to ${otherLangLabel}">
        <span class="lang-globe-icon">🌐</span>
        <span class="lang-text">${otherLangLabel}</span>
      </button>
    `;
  }

  const i18nAPI = {
    t,
    getLanguage,
    setLanguage,
    toggleLanguage,
    applyDocumentLang,
    applyDataI18n,
    getLanguageSwitcherHTML,
    TRANSLATIONS
  };

  if (typeof window !== 'undefined') {
    window.nicheI18n = i18nAPI;
  }
  if (typeof global !== 'undefined') {
    global.nicheI18n = i18nAPI;
  }

  // Apply immediately upon load in browser
  if (typeof document !== 'undefined') {
    applyDocumentLang(getLanguage());
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => applyDataI18n());
    } else {
      applyDataI18n();
    }
  }

  // Support ESM / CommonJS export if needed
  if (typeof module !== 'undefined' && module.exports) {
    module.exports = i18nAPI;
  }
})();
