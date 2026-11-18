# وثيقة المعمارية الفنية ودليل الإدارة والتسويق الرقمي الشامل
## NICH FINE JEWELRY ATELIER • KUWAIT & GCC
### النسخة 2.4 — التوثيق الشامل للوحة التحكم، قاعدة بيانات MySQL، محرك العروض، وربط البيكسل الإعلاني

---

## ١. ملخص المشروع والبيئة التشغيلية (Executive Overview)
مشروع **دار نيش للمجوهرات الراقية (NICH Jewelry)** هو منصة تجارة إلكترونية فاخرة تجمع بين حرفية صياغة الذهب الخالص عيار 14K وتقنيات الـ 3D التفاعلية الفورية (Three.js WebGL) مع بنية تحتية سحابية متينة مبنية على **PHP Laravel 11**، وقاعدة بيانات **MySQL (MariaDB)**، ونظام قوالب **Blade**، مع تصميم quiet luxury مستوحى من كبرى دور المجوهرات العالمية (Cartier, Van Cleef & Arpels).

### بيانات الدخول الافتراضية للوحة التحكم (Executive Credentials)
- **رابط الدخول للوحة التحكم:** `http://localhost:8000/admin/login` (أو `/admin` مع إعادة التوجيه التلقائي الآمن)
- **البريد الإلكتروني للصائغ المدير:** `admin@niche-jewelry.com`
- **كلمة المرور المشفرة (Bcrypt):** `NicheAtelier2026!`
- **الصلاحية (Role):** `admin`
- **جلسة الدخول:** محمية عبر `AdminMiddleware` ونظام الـ Session Regenerate و CSRF Guard لمنع الاختراق.

---

## ٢. البنية التقنية وهيكلية النظام (System Architecture)
```
[ زوار المتجر والعملاء ]
           │
           ▼
[ واجهات Blade و Three.js 3D Customizer ]
 ├── الصفحة الرئيسية /:locale (هيرو النمر الأسود، الذهب، التصنيفات، المجموعات)
 ├── استوديو الصياغة 3D /:locale/atelier (تخصيص الإسورة، دوران أفقي، 16 دلاية)
 ├── الكتالوج والمجوهرات /:locale/collections (تصفح، فلترة، تسعير USD / KWD)
 ├── إتمام الطلب /:locale/checkout (تحقق فوري من كوبونات الخصم، طرق دفع)
 └── قصة الدار والحرفية /:locale/about (18 مرحلة صياغة، حاسبة مقاس المعصم)
           │
           ▼
[ طبقة التوجيه وحماية المسارات (Laravel 11 Routing & Middlewares) ]
 ├── SetLocale Middleware (ar / en)
 ├── AdminMiddleware (فحص جلسة المدير role === 'admin')
 └── CurrencyService (تحويل وحفظ العملة النشطة USD / KWD)
           │
           ▼
[ لوحة تحكم الأتيليه /admin (Executive Control Hub) ]
 ├── Dashboard: مؤشرات المبيعات، الطلبات، الكتالوج، الكوبونات
 ├── Products Manager: إضافة وتعديل المجوهرات والأسعار ($ USD و د.ك KWD)
 ├── Charms Manager: إدارة دلايات الاستوديو، الأسعار، وحالة التفعيل
 ├── Orders Manager: متابعة تفصيل العملاء والمراحل الـ 5 حتى التسليم
 ├── Promotions Engine: كوبونات الخصم، النسب، المبالغ الثابتة، وشروط الطلب
 ├── Banners & Sliders: تخصيص الهيرو، الشريط العلوي، والإعلانات المنبثقة
 ├── Theme Customizer: تعديل النصوص، صور الهيرو، والأزرار باللغتين
 ├── About & Heritage: تحرير قصة الدار، دليل المقاسات، وبيانات التواصل
 └── Marketing & Pixels: ربط Meta Pixel, TikTok, Snapchat, GA4, GTM
           │
           ▼
[ قاعدة بيانات MySQL / MariaDB (9 جداول مترابطة) ]
```

---

## ٣. هيكل قاعدة البيانات ومخطط الجداول (Database Schema)

| اسم الجدول | الوظيفة | الأعمدة الرئيسية |
| :--- | :--- | :--- |
| `users` | حسابات المديرين والعملاء | `id`, `name`, `email`, `password`, `role` (admin/customer), `timestamps` |
| `products` | مجوهرات الكتالوج المعروضة | `id`, `slug`, `title_ar`, `title_en`, `category`, `base_price` (USD), `price_kwd`, `compare_price`, `material`, `images` (JSON), `is_featured`, `in_stock`, `timestamps` |
| `charms` | دلايات استوديو الصياغة 3D | `id`, `charm_code`, `name_ar`, `name_en`, `category`, `price` (USD), `price_kwd`, `mesh_type`, `thumbnail_url`, `is_active`, `timestamps` |
| `custom_designs` | تصاميم الإسورة المحفوظة للعملاء | `id`, `design_token`, `wrist_size`, `metal_finish`, `engraving_text`, `front_charms` (JSON), `back_charms` (JSON), `total_price`, `preview_image_url`, `timestamps` |
| `orders` | طلبات الشراء والتفصيل | `id`, `order_number`, `customer_name`, `customer_email`, `customer_phone`, `shipping_address` (JSON), `total_amount`, `currency`, `payment_status`, `fulfillment_status`, `timestamps` |
| `order_items` | بنود وتفاصيل الطلب | `id`, `order_id`, `product_id`, `custom_design_id`, `item_type`, `unit_price`, `quantity`, `timestamps` |
| `settings` | إعدادات وتخصيصات المتجر | `id`, `key` (unique), `value` (longText), `group` (general, theme, about, marketing), `type`, `timestamps` |
| `banners` | البانرات والشرائح الإعلانية | `id`, `placement` (hero, top_bar, mid_banner, popup_offer), `title_ar/en`, `subtitle_ar/en`, `badge_text_ar/en`, `image_url`, `link_url`, `button_text_ar/en`, `sort_order`, `is_active`, `timestamps` |
| `promotions` | كوبونات الخصم والعروض | `id`, `code` (unique), `title_ar/en`, `discount_type` (percentage, fixed_usd, fixed_kwd), `discount_value`, `min_order_amount`, `max_discount_amount`, `usage_limit`, `used_count`, `starts_at`, `expires_at`, `is_active`, `timestamps` |

---

## ٤. دليل أقسام لوحة التحكم (Admin Panel Manual)

### ١. إدارة المنتجات والأسعار بالدولار والدينار (`/admin/products`)
- إمكانية إضافة قطعة جديدة للكتالوج، أو تعديل سعر أي قطعة حالية.
- دعم إدخال السعر بالدولار ($ USD) مع التحويل التلقائي بسعر صرف بنك الكويت المركزي (0.308) أو إدخال سعر مخصص بالدينار الكويتي (د.ك KWD) يدوياً.
- ضبط حالة التوفر بالمخزون (`in_stock`) وتمييز القطع الأكثر طلباً (`is_featured`).

### ٢. إدارة دلايات الاستوديو 3D (`/admin/charms`)
- التحكم الكامل في كل دلاية تظهر في استوديو التخصيص ثلاثي الأبعاد.
- إمكانية تفعيل أو إيقاف أي دلاية فوراً لتختفي من الاستوديو الحي عند نفاد الكمية.
- تعديل تسعيرة الدلايات سواء الحروف الماسية، رموز الذهب، أو عرق اللؤلؤ الطبيعي.

### ٣. محرك العروض وكوبونات الخصم (`/admin/promotions`)
- إنشاء كوبونات خصم بنسبة مئوية (مثل `NICH15` لخصم 15%، أو `ATELIER20` لخصم 20%).
- إنشاء قسائم خصم نقدية بمبلغ ثابت (مثل `WELCOME50` لخصم 50$ أو مبالغ بالدينار الكويتي).
- تحديد شروط الحد الأدنى لقيمة الطلب (Minimum Order Amount) لمنع استخدام الكوبون على طلبات صغيرة.
- تحديد سقف الخصم الأعلى (Max Discount Cap) والحد الأقصى لعدد مرات الاستخدام.
- واجهة برمجية API تفاعلية فورية `POST /api/promo/validate` تقوم بحساب الخصم لحظياً وتحديث شاشة السلة والدفع.

### ٤. البانرات والشرائح الترويجية (`/admin/banners`)
- تحكم بمواضع العرض: الهيرو الرئيسي (`hero`)، الشريط العلوي (`top_bar`)، البانر الوسطي (`mid_banner`)، والنوافذ المنبثقة (`popup_offer`).
- إمكانية تغيير الصورة، الرابط، نص زر الشراء، وترتيب الظهور، مع زر تفعيل/إخفاء فوري بنقرة واحدة.

### ٥. تخصيص تصميم المتجر والواجهة (`/admin/theme`)
- تعديل الشارة الذهبية (Badge)، العنوان الرئيسي، والنص الشاعري لصفحة الهيرو باللغتين العربية والإنجليزية.
- تبديل صورة الهيرو (صورة النمر والذهب) دون المساس بالأكواد.
- التحكم في نصوص الشريط الإعلاني العلوي (Top Announcement Bar) وتفعيله أو إخفائه.
- تعديل نصوص حقوق الملكية والتذييل (Footer Copyright).

### ٦. قصة الدار والحرفية اليدوية (`/admin/about`)
- تحرير قصة تأسيس دار نيش ورؤية الصياغة الراقية باللغتين.
- تعديل شرح مراحل الصياغة اليدوية الـ 18.
- تعديل دليل قياس معصم اليد وإرشادات المقاسات المثالية.
- تحديث بيانات التواصل المباشرة: رقم واتساب كونسيرج الأتيليه، البريد المخصص، وهاتف الدار في برج الحمراء بالكويت.

### ٧. ربط البيكسل والإعلانات الممولة (`/admin/marketing`)
- شاشة مركزية لإدخال معرّفات التتبع دون الحاجة لأي مبرمج:
  - **Meta Pixel ID** (Facebook & Instagram)
  - **TikTok Pixel ID**
  - **Snapchat Pixel ID**
  - **Google Analytics 4 (GA4) Measurement ID**
  - **Google Tag Manager (GTM) Container ID**
- بمجرد حفظ المعرّف، يقوم المتجر تلقائياً بحقن الأكواد الرسمية في `<head>` و `<body>`.

---

## ٥. خطة ربط البيكسل والأحداث المعيارية (Tracking & Pixel Architecture)

### الأحداث المعيارية المربوطة تلقائياً في واجهة المتجر:
1. **PageView**: يُطلق في كافة صفحات المتجر تلقائياً لبناء جمهور الزوار العام ومراقبة المسارات.
2. **ViewContent**: يُطلق في صفحة تفاصيل المنتج واستوديو الصياغة ثلاثي الأبعاد، حاملاً اسم القطعة، السعر، والعملة (`USD` / `KWD`).
3. **AddToCart**: يُطلق عند نقر الزائر على زر "إضافة للسلة" في الاستوديو أو الكتالوج، حاملاً قائمة الدلايات المختارة وإجمالي القيمة.
4. **InitiateCheckout**: يُطلق فور فتح العميل لصفحة إتمام الطلب `/checkout`.
5. **Purchase**: يُطلق فور إتمام الدفع بنجاح حاملاً رقم الطلب (`NJ-2026-XXXX`)، قيمة الشراء، وقيمة الخصم إن وجد، لتحسين خوارزميات الشراء في منصات الإعلانات ورفع عائد الإنفاق الإعلاني (ROAS).

### دالة الإطلاق البرمجية الموحدة في الواجهة:
```javascript
window.trackNicheEvent('AddToCart', {
    content_name: 'Personalized Glider Charm Bangle (14K Gold)',
    value: 500.00,
    currency: 'USD',
    contents: [
        { id: 'NJ-BGL-14K', quantity: 1, item_price: 360 },
        { id: 'BEE_GOLD', quantity: 1, item_price: 70 },
        { id: 'MARTINI_OLIVE', quantity: 1, item_price: 70 }
    ]
});
```

---

## ٦. استراتيجية الإطلاق والتسويق الرقمي لدول الخليج (GCC Marketing Playbook)

### المرحلة الأولى: بناء الوعي والأصالة (Awareness & Brand Affinity)
- **المنصات الأساسية:** Instagram Reels, TikTok, Snapchat Lens.
- **نوع المحتوى الإعلاني:**
  - فيديوهات سينمائية قصيرة تركز على النمر الأسود مع لمعان الذهب عيار 14K (Macro Gold Texture).
  - تصوير حِرفي مقرب للأيدي الصائغة أثناء تركيب دلاية عرق اللؤلؤ الطبيعي وسماع صوت الانزلاق السلس (ASMR Gliding Experience).
  - فيديو شاشة تفاعلي يوضح بساطة استوديو الـ 3D: كيف تختار الإسورة، تدير الدلايات أفقياً، وتنقش اسمك بالليزر مجاناً.
- **الاستهداف الجغرافي:** الكويت (مدينة الكويت، الشويخ، حولي)، السعودية (الرياض، جدة، الخبر)، الإمارات (دبي، أبوظبي)، قطر (الدوحة).

### المرحلة الثانية: إشراك العملاء والتخصيص التفاعلي (Middle of Funnel)
- توجيه الحملات مباشرة إلى **رابط استوديو الـ 3D** (`/ar/atelier`) كصفحة هبوط رئيسية (Landing Page).
- استخدام حافز إعلاني: **كود خصم ترحيبي 15% `NICH15` + شحن مؤمّن مجاني للطلبات فوق 300$**.
- إرسال هدايا مخصصة لأبرز شخصيات المؤثرين في قطاع الأزياء والمجوهرات الراقية في الخليج مع أساور منقوشة بأسمائهم الشخصية لدعم التسويق العضوي (Organic Word of Mouth).

### المرحلة الثالثة: إعادة الاستهداف وحصد التحويلات (Bottom of Funnel & Retargeting)
- إنشاء جمهور مخصص (Custom Audience) لكل من قام بتصميم إسورة في الـ 3D أو أضاف عناصر للسلة ولم يتم الطلب خلال 24-48 ساعة.
- رسائل تذكير عبر واتساب كونسيرج الأتيليه وإعلانات إعادة استهداف على إنستغرام وسناب شات مع ميزة حجز القطعة في الأتيليه.

---

## ٧. قائمة التحقق للإطلاق الحي على السيرفر (Production Launch Checklist)
- [x] تفعيل تشفير كلمات المرور باستخدام `Hash::make()` (Bcrypt).
- [x] حماية مسارات الإدارة عبر `AdminMiddleware` ومنع الوصول العشوائي.
- [x] ربط قاعدة بيانات MySQL وضبط الهجرات والجداول الـ 9.
- [x] تفعيل التحقق من أكواد الخصم عبر واجهة API رسمية.
- [x] ربط حقن أكواد البيكسل التلقائية للمنصات الخمس (Meta, TikTok, Snapchat, GA4, GTM).
- [x] التأكد من سلامة جميع الروابط وتحويل مسارات `.html` السابقة لضمان 0% أخطاء 404.
- [x] توفير مستند PDF رسمي متاح للتحميل والطباعة.

---
**دار نيش للمجوهرات الراقية • كونسيرج الأتيليه 2026**
