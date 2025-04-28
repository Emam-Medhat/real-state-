@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('content')
<style>
    .edit-profile-section {
        padding: 3rem 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.8s ease-out;
    }

    h2 {
        text-align: center;
        color: #3a4a6d;
        margin-bottom: 2rem;
        font-size: 2rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
        border-radius: 3px;
    }

    .input-group {
        margin-bottom: 1.5rem;
        position: relative;
        animation: fadeIn 0.6s ease-out forwards;
    }

    .input-group:nth-child(1) { animation-delay: 0.2s; }
    .input-group:nth-child(2) { animation-delay: 0.3s; }
    .input-group:nth-child(3) { animation-delay: 0.4s; }
    .input-group:nth-child(4) { animation-delay: 0.5s; }
    .input-group:nth-child(5) { animation-delay: 0.6s; }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #4a5568;
        font-weight: 600;
        transition: all 0.3s;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s;
        background-color: #f8fafc;
    }

    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 2px dashed #e2e8f0;
        border-radius: 8px;
        background-color: #f8fafc;
    }

    input:focus {
        outline: none;
        border-color: #4facfe;
        box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.2);
        background-color: white;
    }

    .form-footer {
        text-align: center;
        margin-top: 2rem;
    }

    button {
        background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 1rem;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
    }

    button:active {
        transform: translateY(1px);
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 1.5rem;
            margin: 1rem;
        }

        h2 {
            font-size: 1.5rem;
        }
    }

    /* Floating animation for the container */
    .container {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
</style>

<section class="edit-profile-section">
    <div class="container">
        <h2>تعديل الملف الشخصي</h2>

        <!-- Profile Update Form -->
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
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

            <!-- Profile Image -->
            <div class="input-group">
                <label for="image">الصورة الشخصية</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/*"
                >
            </div>

            <!-- Submit Button -->
            <div class="form-footer">
                <button type="submit">حفظ التعديلات</button>
            </div>
        </form>
    </div>
</section>

<script>
    // Add animation when input is focused
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.querySelector('label').style.color = '#4facfe';
            this.parentElement.querySelector('label').style.transform = 'translateY(-5px)';
        });

        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.querySelector('label').style.color = '#4a5568';
                this.parentElement.querySelector('label').style.transform = 'translateY(0)';
            }
        });
    });
</script>
@endsection