<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول الأتيليه • NICH JEWELRY</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Cormorant+Garamond:wght@400;600&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
      body {
        margin: 0;
        min-height: 100vh;
        background: radial-gradient(circle at 50% 20%, #1c1813 0%, #0c0b0a 100%);
        font-family: 'Cairo', 'Montserrat', sans-serif;
        color: #f7f5f0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        box-sizing: border-box;
      }
      .login-container {
        width: 100%;
        max-width: 440px;
        background: rgba(22, 20, 18, 0.88);
        border: 1px solid rgba(228, 204, 160, 0.25);
        border-radius: 8px;
        padding: 40px 36px;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(12px);
      }
      .brand-title {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 32px;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #e4cca0;
        text-align: center;
        margin: 0 0 6px;
      }
      .brand-sub {
        font-size: 11px;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: rgba(228, 204, 160, 0.75);
        text-align: center;
        margin: 0 0 32px;
        display: block;
      }
      .form-group {
        margin-bottom: 20px;
      }
      .form-label {
        display: block;
        font-size: 12.5px;
        font-weight: 600;
        color: #d1c9bd;
        margin-bottom: 8px;
      }
      .form-input {
        width: 100%;
        box-sizing: border-box;
        padding: 13px 16px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(228, 204, 160, 0.28);
        border-radius: 4px;
        color: #ffffff;
        font-size: 14px;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s, background-color 0.2s;
      }
      .form-input:focus {
        border-color: #c59b3f;
        background: rgba(255, 255, 255, 0.08);
      }
      .submit-btn {
        width: 100%;
        padding: 14px;
        background: #c59b3f;
        color: #0c0b0a;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.1s;
        margin-top: 10px;
      }
      .submit-btn:hover {
        background: #e4cca0;
      }
      .submit-btn:active {
        transform: scale(0.99);
      }
      .alert-msg {
        padding: 12px 14px;
        border-radius: 4px;
        font-size: 13px;
        margin-bottom: 20px;
        line-height: 1.5;
      }
      .alert-error {
        background: rgba(211, 47, 47, 0.15);
        border: 1px solid rgba(211, 47, 47, 0.4);
        color: #ef9a9a;
      }
      .alert-success {
        background: rgba(46, 125, 50, 0.15);
        border: 1px solid rgba(46, 125, 50, 0.4);
        color: #a5d6a7;
      }
      .seed-hint-box {
        margin-top: 28px;
        padding: 14px 16px;
        background: rgba(197, 155, 63, 0.08);
        border: 1px dashed rgba(228, 204, 160, 0.35);
        border-radius: 4px;
        font-size: 12px;
        color: #d1c9bd;
        line-height: 1.6;
      }
      .seed-hint-box code {
        color: #e4cca0;
        background: rgba(0, 0, 0, 0.4);
        padding: 2px 6px;
        border-radius: 3px;
        font-family: monospace;
      }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="brand-title">NICH JEWELRY</h1>
        <span class="brand-sub">ATELIER EXECUTIVE CONSOLE</span>

        @if(session('error'))
            <div class="alert-msg alert-error">
                ⚠ {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert-msg alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-msg alert-error">
                @foreach($errors->all() as $err)
                    <div>• {{ $err }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">البريد الإلكتروني للصائغ المدير</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email', 'admin@niche-jewelry.com') }}" required autofocus dir="ltr">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">كلمة المرور المشفرة</label>
                <input type="password" id="password" name="password" class="form-input" value="NicheAtelier2026!" required dir="ltr">
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; font-size:12.5px;">
                <label style="display:flex; align-items:center; gap:8px; cursor:pointer; color:#a69f94;">
                    <input type="checkbox" name="remember" value="1" checked style="accent-color:#c59b3f;">
                    تذكر الجلسة الآمنة
                </label>
                <a href="{{ route('home', ['locale' => 'ar']) }}" style="color:#e4cca0; text-decoration:none;">العودة للمتجر ⇱</a>
            </div>

            <button type="submit" class="submit-btn">
                دخول لوحة تحكم الأتيليه ✦
            </button>
        </form>

        <div class="seed-hint-box">
            <div style="font-weight:700; color:#e4cca0; margin-bottom:4px;">✦ بيانات الدخول المعتمدة للدار:</div>
            البريد: <code>admin@niche-jewelry.com</code><br>
            السر: <code>NicheAtelier2026!</code>
        </div>
    </div>
</body>
</html>
