@extends('layouts.admin')

@section('title', 'الملف الشخصي وأمان الحساب • NICH JEWELRY')
@section('page_title', 'الملف الشخصي وأمان الحساب')

@section('content')
<div style="max-width: 680px;">
    <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,0.02);">
        <h2 style="font-family:var(--font-serif); font-size:20px; margin-top:0; margin-bottom:8px; color:#181715;">بيانات الصائغ المدير</h2>
        <p style="font-size:13px; color:#777; margin-bottom:24px;">يمكنك هنا تحديث بريد الدخول الإلكتروني وكلمة المرور الخاصة بلوحة التحكم.</p>

        @if($errors->any())
            <div style="background:#ffebee; color:#c62828; padding:12px 16px; border-radius:4px; margin-bottom:20px; font-size:13px;">
                @foreach($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الاسم الكامل</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
            </div>

            <hr style="border:0; border-top:1px solid #eee; margin:24px 0;">

            <h3 style="font-size:15px; font-weight:700; margin-bottom:6px; color:#181715;">تغيير كلمة المرور</h3>
            <p style="font-size:12px; color:#888; margin-bottom:16px;">اترك الحقول فارغة إذا كنت لا ترغب بتغيير كلمة المرور الحالية.</p>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">كلمة المرور الجديدة</label>
                <input type="password" name="password" dir="ltr" placeholder="••••••••" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">تأكيد كلمة المرور الجديدة</label>
                <input type="password" name="password_confirmation" dir="ltr" placeholder="••••••••" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
            </div>

            <div style="display:flex; justify-content:flex-end;">
                <button type="submit" class="btn btn-primary" style="padding:10px 24px;">
                    حفظ التعديلات
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
