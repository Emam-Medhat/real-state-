@extends('layouts.app')

@section('title', ' تسجيل الدخول')

@section('content')

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة العقارات</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <br><br><br>
    <div class="login-container">
        <h2>تسجيل الدخول إلى منصة العقارات</h2>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Field -->
            <div class="input-group">
                <label for="email">البريد الإلكتروني</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="أدخل بريدك الإلكتروني"
                    required
                >
            </div>

            <!-- Password Field -->
            <div class="input-group">
                <label for="password">كلمة المرور</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="أدخل كلمة المرور"
                    required
                >
            </div>

            <!-- Submit Button -->
            <div class="form-footer">
                <button type="submit">دخول</button>
            </div>
        </form>

        <!-- Registration Link -->
        <p>
            ليس لديك حساب؟
            <a href="{{ route('register') }}">تسجيل جديد</a>
        </p>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 منصة العقارات. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>

@endsection