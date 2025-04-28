@extends('layouts.app')

@section('title', 'تسجيل حساب جديد')

@section('content')
<section class="auth-section">
    <div class="container">
        <h2>تسجيل حساب جديد</h2>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <label for="name"> الصورة الشخصية</label>
                <input
                    type="file"
                    name="image"
                    id="name"
                    required
                >
            </div>
            <!-- Name -->
            <div class="input-group">
                <label for="name">الاسم الكامل</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="أدخل اسمك الكامل"
                    required
                >
            </div>

            <!-- Email -->
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

            <!-- Password -->
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

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="password_confirmation">تأكيد كلمة المرور</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="أعد كتابة كلمة المرور"
                    required
                >
            </div>

            <!-- Submit Button -->
            <div class="form-footer">
                <button type="submit">تسجيل</button>
            </div>
        </form>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
@endsection

