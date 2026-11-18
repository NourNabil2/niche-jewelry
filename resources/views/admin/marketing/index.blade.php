@extends('layouts.admin')

@section('title', 'ربط البيكسل والإعلانات الممولة • NICH JEWELRY')
@section('page_title', 'ربط البيكسل والإعلانات الممولة (Tracking & Pixels)')

@section('content')
<div style="max-width: 880px;">
    <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,0.02);">
        
        <p style="font-size:13.5px; color:#666; margin-top:0; margin-bottom:28px; line-height:1.6;">
            قم بإدخال معرّفات التتبع لمنصات الإعلانات الممولة (Meta, TikTok, Snapchat, Google). يقوم المتجر تلقائياً بحقن أكواد البيكسل الرسمية وإرسال أحداث التجارة الإلكترونية المعيارية (E-commerce Events) لتحسين تكلفة الشراء وقياس العائد الإعلاني بدقة (ROAS).
        </p>

        <form action="{{ route('admin.marketing.update') }}" method="POST">
            @csrf

            <!-- Meta Pixel -->
            <div style="background:#f0f4f8; border:1px solid #d0dbe5; border-radius:6px; padding:20px; margin-bottom:20px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <span style="font-size:20px;">📘</span>
                        <div>
                            <h4 style="margin:0; font-size:15px; font-weight:700; color:#1a365d;">Meta Pixel (Facebook & Instagram)</h4>
                            <span style="font-size:11.5px; color:#4a5568;">تتبع حملات إنستغرام وفيسبوك في دول الخليج</span>
                        </div>
                    </div>
                    @if(!empty($marketing['meta_pixel_id']))
                        <span class="badge-status badge-paid">متصل ومفعّل ✓</span>
                    @else
                        <span class="badge-status badge-pending">غير متصل</span>
                    @endif
                </div>
                <div>
                    <label style="display:block; font-size:12px; font-weight:600; color:#2d3748; margin-bottom:6px;">Pixel ID (معرّف البيكسل)</label>
                    <input type="text" name="meta_pixel_id" value="{{ old('meta_pixel_id', $marketing['meta_pixel_id']) }}" dir="ltr" placeholder="مثال: 123456789012345" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #cbd5e0; border-radius:4px; font-family:monospace; font-size:14px;">
                </div>
            </div>

            <!-- TikTok Pixel -->
            <div style="background:#f8f9fa; border:1px solid #e2e8f0; border-radius:6px; padding:20px; margin-bottom:20px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <span style="font-size:20px;">🎵</span>
                        <div>
                            <h4 style="margin:0; font-size:15px; font-weight:700; color:#1a202c;">TikTok Pixel</h4>
                            <span style="font-size:11.5px; color:#4a5568;">تتبع حملات تيك توك وإعلانات الفيديو القصيرة</span>
                        </div>
                    </div>
                    @if(!empty($marketing['tiktok_pixel_id']))
                        <span class="badge-status badge-paid">متصل ومفعّل ✓</span>
                    @else
                        <span class="badge-status badge-pending">غير متصل</span>
                    @endif
                </div>
                <div>
                    <label style="display:block; font-size:12px; font-weight:600; color:#2d3748; margin-bottom:6px;">TikTok Pixel ID</label>
                    <input type="text" name="tiktok_pixel_id" value="{{ old('tiktok_pixel_id', $marketing['tiktok_pixel_id']) }}" dir="ltr" placeholder="مثال: C1234567890ABCDEF" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #cbd5e0; border-radius:4px; font-family:monospace; font-size:14px;">
                </div>
            </div>

            <!-- Snapchat Pixel -->
            <div style="background:#fffde7; border:1px solid #fff59d; border-radius:6px; padding:20px; margin-bottom:20px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <span style="font-size:20px;">👻</span>
                        <div>
                            <h4 style="margin:0; font-size:15px; font-weight:700; color:#f57f17;">Snapchat Pixel</h4>
                            <span style="font-size:11.5px; color:#795548;">حملات سناب شات الأكثر تفاعلاً في الكويت والسعودية والخليج</span>
                        </div>
                    </div>
                    @if(!empty($marketing['snapchat_pixel_id']))
                        <span class="badge-status badge-paid">متصل ومفعّل ✓</span>
                    @else
                        <span class="badge-status badge-pending">غير متصل</span>
                    @endif
                </div>
                <div>
                    <label style="display:block; font-size:12px; font-weight:600; color:#2d3748; margin-bottom:6px;">Snap Pixel ID</label>
                    <input type="text" name="snapchat_pixel_id" value="{{ old('snapchat_pixel_id', $marketing['snapchat_pixel_id']) }}" dir="ltr" placeholder="مثال: a1b2c3d4-e5f6-7890-abcd-ef1234567890" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #cbd5e0; border-radius:4px; font-family:monospace; font-size:14px;">
                </div>
            </div>

            <!-- Google Analytics 4 & GTM -->
            <div style="background:#fefbf3; border:1px solid #eee4cd; border-radius:6px; padding:20px; margin-bottom:28px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <span style="font-size:20px;">📊</span>
                        <div>
                            <h4 style="margin:0; font-size:15px; font-weight:700; color:#5d4037;">Google Analytics 4 & Google Tag Manager</h4>
                            <span style="font-size:11.5px; color:#8d6e63;">التحليلات المتقدمة وإدارة الوسوم الاحترافية</span>
                        </div>
                    </div>
                </div>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#2d3748; margin-bottom:6px;">GA4 Measurement ID</label>
                        <input type="text" name="ga4_measurement_id" value="{{ old('ga4_measurement_id', $marketing['ga4_measurement_id']) }}" dir="ltr" placeholder="مثال: G-XXXXXXXXXX" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #cbd5e0; border-radius:4px; font-family:monospace; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#2d3748; margin-bottom:6px;">GTM Container ID</label>
                        <input type="text" name="gtm_container_id" value="{{ old('gtm_container_id', $marketing['gtm_container_id']) }}" dir="ltr" placeholder="مثال: GTM-XXXXXXX" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #cbd5e0; border-radius:4px; font-family:monospace; font-size:14px;">
                    </div>
                </div>
            </div>

            <div style="display:flex; justify-content:flex-end; margin-bottom:32px;">
                <button type="submit" class="btn btn-primary" style="padding:12px 32px; font-size:14px;">
                    حفظ وربط معرّفات البيكسل ✦
                </button>
            </div>
        </form>

        <!-- Events Tracking Architecture Overview -->
        <div style="border-top:1px solid #e8e3d8; padding-top:24px;">
            <h3 style="font-family:var(--font-serif); font-size:18px; margin-top:0; margin-bottom:12px; color:#181715;">
                ✦ جدول الأحداث المعيارية المربوطة تلقائياً في المتجر (Auto-Fired Events)
            </h3>
            <p style="font-size:12.5px; color:#666; margin-bottom:16px; line-height:1.5;">
                بمجرد إدخال أي معرّف بيكسل أعلاه، يتم تفعيل إرسال هذه الأحداث فوراً مع البيانات الدقيقة (العملة، السعر، أسماء القطع، والدلايات المخصصة):
            </p>

            <div style="background:#faf8f5; border:1px solid #e8e3d8; border-radius:4px; overflow:hidden;">
                <table style="font-size:12.5px;">
                    <thead>
                        <tr>
                            <th style="padding:10px 14px;">الحدث (Standard Event)</th>
                            <th style="padding:10px 14px;">صفحة الإطلاق (Trigger Page)</th>
                            <th style="padding:10px 14px;">البيانات المرفقة (Payload)</th>
                            <th style="padding:10px 14px;">فائدة الحدث الإعلاني</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-family:monospace; font-weight:700; color:#c59b3f;">PageView</td>
                            <td>كافة صفحات المتجر الحي</td>
                            <td>url, title, referrer</td>
                            <td>بناء جمهور زوار الموقع العام (Website Retargeting)</td>
                        </tr>
                        <tr>
                            <td style="font-family:monospace; font-weight:700; color:#c59b3f;">ViewContent</td>
                            <td>صفحة المنتج وصفحة استوديو 3D</td>
                            <td>content_name, value, currency: 'USD'/'KWD'</td>
                            <td>إعادة استهداف المهتمين بقطع محددة (Dynamic Product Ads)</td>
                        </tr>
                        <tr>
                            <td style="font-family:monospace; font-weight:700; color:#c59b3f;">AddToCart</td>
                            <td>زر إضافة للسلة في الاستوديو والكتالوج</td>
                            <td>items, charmLayers, price, currency</td>
                            <td>استهداف السلات المتروكة وتحسين تحويلات إضافة السلة</td>
                        </tr>
                        <tr>
                            <td style="font-family:monospace; font-weight:700; color:#c59b3f;">InitiateCheckout</td>
                            <td>صفحة إتمام الطلب /checkout</td>
                            <td>order_subtotal, coupon_code, currency</td>
                            <td>استهداف الزوار الذين بدأوا إدخال عناوينهم ولم يكملوا الدفع</td>
                        </tr>
                        <tr>
                            <td style="font-family:monospace; font-weight:700; color:#2e7d32;">Purchase</td>
                            <td>فور إتمام الدفع بنجاح</td>
                            <td>order_id, value, currency, tax, shipping</td>
                            <td>تحسين خوارزميات الشراء في ميتا وسناب وتيك توك (ROAS Optimization)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
