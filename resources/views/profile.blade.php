@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
<section class="profile-section">
    <div class="container">
        <h2>مرحبًا بك، {{ Auth::user()->name }}</h2>
        <div class="profile-info">
            <p><strong>البريد الإلكتروني:</strong> {{ Auth::user()->email }}</p>
            <p><strong>الاسم الكامل:</strong> {{ Auth::user()->name }}</p>
            <a href="{{ route('profile.edit') }}" class="edit-profile-btn">تعديل الملف الشخصي</a>
        </div>
    </div>
</section>
@endsection
