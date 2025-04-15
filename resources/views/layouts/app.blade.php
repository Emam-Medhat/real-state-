<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'منصة العقارات')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Cairo Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500;700&display=swap" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* إعادة تعيين التنسيقات */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fa;
        }

        /* تنسيق الهيدر */
        .main-header {
            background: linear-gradient(135deg, #0077b6, #ff4d6d); /* أزرق مبهج إلى وردي جذاب */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 15px 0;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* تنسيق اللوجو */
        .logo {
            color: #fff;
            font-size: 2.2rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .logo:hover {
            color: #ffd60a; /* ذهبي مبهج */
            transform: scale(1.05);
        }

        /* تنسيق النافبار */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .main-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 600;
            position: relative;
            padding: 10px 5px;
            transition: all 0.3s ease;
        }

        /* تأثير الهافر: شريط ملون */
        .main-nav a::before {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: 0;
            right: 0;
            background: linear-gradient(to left, #ffd60a, #ff4d6d); /* ذهبي إلى وردي */
            transition: width 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .main-nav a:hover::before {
            width: 100%;
        }

        .main-nav a:hover {
            color: #ffd60a;
            transform: translateY(-2px);
        }

        /* زر تسجيل الدخول */
        .login-btn {
            background: #ffd60a;
            color: #0077b6;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: #fff;
            color: #ff4d6d;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        /* أنيميشن الظهور */
        .main-nav a {
            opacity: 0;
            transform: translateY(10px);
            animation: slideIn 0.5s ease forwards;
        }

        .main-nav a:nth-child(1) { animation-delay: 0.1s; }
        .main-nav a:nth-child(2) { animation-delay: 0.2s; }
        .main-nav a:nth-child(3) { animation-delay: 0.3s; }
        .main-nav a:nth-child(4) { animation-delay: 0.4s; }
        .main-nav a:nth-child(5) { animation-delay: 0.5s; }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* زر البرجر */
        .burger {
            display: none;
            color: #fff;
            font-size: 1.8rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .burger:hover {
            transform: rotate(90deg);
        }

        /* تنسيق الفوتير */
        .main-footer {
            background: linear-gradient(135deg, #0077b6, #023e8a); /* تدرج أزرق متناسق */
            color: #fff;
            padding: 60px 0;
            margin-top: 40px;
        }

        .main-footer .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .footer-section h4 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #ffd60a;
        }

        .footer-section p,
        .footer-section a {
            color: #e9ecef;
            font-size: 1rem;
            line-height: 1.8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #ffd60a;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .social-links a {
            font-size: 1.5rem;
            margin-left: 15px;
            color: #e9ecef;
        }

        .social-links a:hover {
            color: #ffd60a;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 20px;
            text-align: center;
            margin-top: 40px;
            font-size: 0.9rem;
        }

        /* استجابة للشاشات الصغيرة */
        @media (max-width: 768px) {
            .main-nav {
                flex-direction: column;
                gap: 1.5rem;
                background: linear-gradient(135deg, #0077b6, #ff4d6d);
                position: absolute;
                top: 70px;
                right: 0;
                width: 100%;
                padding: 2rem;
                display: none;
                border-radius: 0 0 15px 15px;
            }

            .main-nav.active {
                display: flex;
            }

            .burger {
                display: block;
            }

            .login-btn {
                width: fit-content;
            }

            .main-footer .container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .social-links a {
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="logo">🏠 منصة العقارات</a>
            <div class="burger">☰</div>
            <nav class="main-nav">
                <a href="{{ route('home') }}">الرئيسية</a>
                <a href="{{ route('search') }}">بحث</a>
                <a href="{{ url('crate/propeties') }}">أضف عقار</a>
                <a href="{{ url('companies') }}">شركات الهندسية</a>
                <a href="{{ url('contact') }}">تواصل معنا </a>
                <a href="{{ url('team') }}"> فريق العمل </a>


                @guest
                    <a href="{{ route('login') }}" class="login-btn">تسجيل الدخول</a>
                @else
                    <a href="{{ route('profile.edit') }}" class="login-btn">ملفي الشخصي</a>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <!-- عن المنصة -->
            <div class="footer-section">
                <h4>عن منصة العقارات</h4>
                <p>منصة العقارات هي وجهتك المثالية لشراء، بيع، أو تأجير العقارات في جميع أنحاء المنطقة. نسعى لتوفير تجربة سلسة وموثوقة مع أفضل العروض.</p>
            </div>

            <!-- روابط سريعة -->
            <div class="footer-section">
                <h4>روابط سريعة</h4>
                <ul>
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('search') }}">البحث عن عقار</a></li>
                    <li><a href="{{ url('crate/propeties') }}">إضافة عقار</a></li>
                    <li><a href="{{ url('contact') }}"> تواصل معنا</a></li>
                    <li><a href="{{ url('companies') }}">شركات التشطيب</a></li>

                </ul>
            </div>

            <!-- تواصلوا معنا -->
            <div class="footer-section">
                <h4>تواصلوا معنا</h4>
                <p>البريد الإلكتروني: <a href="mailto:info@realestate.com">info@realestate.com</a></p>
                <p>الهاتف: <a href="tel:+966123456789">+966 123 456 789</a></p>
                <p>العنوان: الرياض، المملكة العربية السعودية</p>
            </div>

            <!-- وسائل التواصل -->
            <div class="footer-section">
                <h4>تابعنا</h4>
                <div class="social-links">
                    <a href="#" aria-label="فيسبوك"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="تويتر"><i class="bi bi-twitter"></i></a>
                    <a href="#" aria-label="إنستغرام"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="لينكدإن"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 منصة العقارات. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons (لأيقونات التواصل) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script>
        // تفعيل زر البرجر
        document.querySelector('.burger').addEventListener('click', () => {
            document.querySelector('.main-nav').classList.toggle('active');
        });
    </script>
</body>
</html>