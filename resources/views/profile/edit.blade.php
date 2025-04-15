@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('content')
<section class="edit-profile-section">
    <div class="container">
        <h2>تعديل الملف الشخصي</h2>

        <!-- Profile Update Form -->
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="input-group">
                <label for="name">الاسم الكامل</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ Auth::user()->name }}" 
                    placeholder="الاسم الكامل" 
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
                    value="{{ Auth::user()->email }}" 
                    placeholder="البريد الإلكتروني" 
                    required
                >
            </div>

            <!-- New Password -->
            <div class="input-group">
                <label for="password">كلمة المرور الجديدة</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="كلمة المرور الجديدة"
                >
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="password_confirmation">تأكيد كلمة المرور الجديدة</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    placeholder="تأكيد كلمة المرور الجديدة"
                >
            </div>

            <!-- Submit Button -->
            <div class="form-footer">
                <button type="submit">حفظ التعديلات</button>
            </div>
        </form>
    </div>
</section>
@endsection
