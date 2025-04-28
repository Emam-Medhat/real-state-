@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3a0ca3;
        --accent-color: #f72585;
        --light-color: #f8f9fa;
        --dark-color: #212529;
        --text-color: #2b2d42;
        --border-radius: 12px;
        --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        --gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
    }

    .profile-section {
        background: linear-gradient(to bottom, #f6f9fc 0%, #ffffff 100%);
        min-height: 100vh;
        padding: 80px 0;
        font-family: 'Tajawal', sans-serif;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .profile-card {
        background-color: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 60px 50px;
        text-align: center;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .profile-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 8px;
        background: var(--gradient);
    }

    .profile-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    h2 {
        color: var(--secondary-color);
        font-size: 2.5rem;
        margin-bottom: 40px;
        position: relative;
        padding-bottom: 15px;
        font-weight: 800;
    }

    h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: var(--gradient);
        border-radius: 2px;
    }

    .profile-image {
        margin-bottom: 30px;
        position: relative;
        display: inline-block;
    }

    .profile-image::before {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        background: var(--gradient);
        z-index: -1;
        border-radius: 50%;
        opacity: 0.7;
        filter: blur(10px);
    }

    .profile-image img {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        transition: var(--transition);
    }

    .profile-image img:hover {
        transform: scale(1.05) rotate(5deg);
    }

    .no-image {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: var(--secondary-color);
        font-size: 1.2rem;
        border: 5px solid white;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .no-image::after {
        content: '\f007';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        font-size: 3rem;
        color: rgba(58, 12, 163, 0.2);
        position: absolute;
    }

    .profile-details {
        margin-bottom: 40px;
        text-align: right;
    }

    .detail-item {
        font-size: 1.2rem;
        margin-bottom: 20px;
        padding: 15px 20px;
        background-color: var(--light-color);
        border-radius: var(--border-radius);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: var(--transition);
        border-left: 4px solid var(--primary-color);
    }

    .detail-item:hover {
        transform: translateX(10px);
        background-color: #f0f4ff;
    }

    .detail-item strong {
        color: var(--secondary-color);
        margin-left: 15px;
        font-weight: 700;
    }

    .detail-item span {
        color: var(--text-color);
        font-weight: 500;
    }

    .profile-actions {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 40px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 700;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        z-index: 1;
        border: none;
        font-size: 1.1rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--gradient);
        z-index: -1;
        transition: var(--transition);
        opacity: 1;
    }

    .btn-primary::before {
        background: var(--gradient);
    }

    .btn-danger::before {
        background: linear-gradient(135deg, #f72585 0%, #b5179e 100%);
    }

    .btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .btn:hover::before {
        opacity: 0.9;
    }

    .btn i {
        margin-left: 10px;
        font-size: 1.2rem;
    }

    .btn-text {
        position: relative;
        color: white;
    }

    /* Animation */
    @keyframes float {
        0% { transform: translateY(0px); }
        25% { transform: translateY(-5px); }
        50% { transform: translateY(-10px); }
        75% { transform: translateY(-5px); }
        100% { transform: translateY(0px); }
    }

    .profile-card {
        animation: float 3s ease-in-out infinite;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .profile-card {
            padding: 50px 40px;
        }

        h2 {
            font-size: 2.2rem;
        }

        .profile-image img,
        .no-image {
            width: 160px;
            height: 160px;
        }
    }

    @media (max-width: 768px) {
        .profile-section {
            padding: 60px 0;
        }

        .profile-card {
            padding: 40px 30px;
        }

        h2 {
            font-size: 2rem;
        }

        .detail-item {
            flex-direction: column;
            text-align: center;
            padding: 15px;
        }

        .detail-item strong {
            margin-left: 0;
            margin-bottom: 8px;
        }
    }

    @media (max-width: 576px) {
        .profile-section {
            padding: 40px 0;
        }

        h2 {
            font-size: 1.8rem;
        }

        .profile-image img,
        .no-image {
            width: 140px;
            height: 140px;
        }

        .profile-actions {
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<section class="profile-section">
    <div class="container">
        <div class="profile-card">
            <h2>ملفي الشخصي</h2>

            <!-- عرض الصورة الشخصية -->
            <div class="profile-image">
                @if($user->image)
                    <img src="{{ asset('storage/PropertyPhotos/' . $user->image) }}" alt="صورة الملف الشخصي">
                @else
                    <div class="no-image">
                        <span class="btn-text">لا توجد صورة</span>
                    </div>
                @endif
            </div>

            <!-- عرض بيانات المستخدم -->
            <div class="profile-details">
                <div class="detail-item">
                    <strong>الاسم الكامل:</strong>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="detail-item">
                    <strong>البريد الإلكتروني:</strong>
                    <span>{{ $user->email }}</span>
                </div>
            </div>

            <!-- أزرار الإجراءات -->
            <div class="profile-actions">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    <i class="fas fa-user-edit"></i>
                    <span class="btn-text">تعديل الملف</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="btn-text">تسجيل الخروج</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Include Tajawal font -->
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">

@endsection