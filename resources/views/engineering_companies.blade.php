@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدليل الشامل للشركات الهندسية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --glass-effect: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-light: 0 8px 32px rgba(0, 0, 0, 0.1);
            --shadow-heavy: 0 15px 35px rgba(0, 0, 0, 0.2);
            --border-radius: 20px;
            --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        /* Floating Particles Background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
        }

        /* Header with Glassmorphism */
        .hero-header {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8) 0%, rgba(118, 75, 162, 0.9) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            color: white;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            opacity: 0;
            animation: slideInUp 1s ease-out 0.5s forwards;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
            opacity: 0;
            animation: slideInUp 1s ease-out 0.7s forwards;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glassmorphism Search Bar */
        .search-container {
            background: var(--glass-effect);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow-light);
            opacity: 0;
            animation: slideInUp 1s ease-out 0.9s forwards;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 15px;
            padding: 15px 20px;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3), inset 0 2px 10px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .search-btn {
            background: var(--primary-gradient);
            border: none;
            border-radius: 15px;
            padding: 15px 30px;
            color: white;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: var(--shadow-light);
        }

        .search-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-heavy);
        }

        /* Main Content Container */
        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 30px 30px 0 0;
            margin-top: -50px;
            position: relative;
            z-index: 3;
            padding: 50px 0;
            box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.1);
        }

        /* Stats Cards with Hover Effects */
        .stats-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            padding: 30px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .stats-card:hover::before {
            left: 100%;
        }

        .stats-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: var(--shadow-heavy);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 900;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .stats-label {
            font-size: 1.1rem;
            color: #666;
            font-weight: 600;
        }

        /* Sidebar Filters */
        .sidebar {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow-light);
            position: sticky;
            top: 20px;
        }

        .filter-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
            position: relative;
        }

        .filter-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-gradient);
        }

        .filter-group {
            margin-bottom: 25px;
        }

        .filter-group h6 {
            font-weight: 600;
            color: #555;
            margin-bottom: 15px;
        }

        .form-check {
            margin-bottom: 10px;
        }

        .form-check-input:checked {
            background: var(--primary-gradient);
            border-color: transparent;
        }

        .form-check-label {
            font-weight: 500;
            color: #666;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .form-check-label:hover {
            color: #667eea;
        }

        /* Company Cards */
        .company-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
            margin-bottom: 30px;
            box-shadow: var(--shadow-light);
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
        }

        .company-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }

        .company-card:hover .company-image {
            transform: scale(1.1);
        }

        .company-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid white;
            position: absolute;
            top: -40px;
            right: 20px;
            box-shadow: var(--shadow-light);
            z-index: 2;
        }

        .company-body {
            padding: 50px 20px 20px;
        }

        .company-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .company-subtitle {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .rating-stars {
            color: #ffd700;
            margin-bottom: 15px;
        }

        .specialization-tag {
            display: inline-block;
            background: var(--primary-gradient);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin: 2px;
            transition: var(--transition);
        }

        .specialization-tag:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .progress-modern {
            height: 8px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 10px 0;
        }

        .progress-bar-modern {
            height: 100%;
            background: var(--success-gradient);
            border-radius: 10px;
            transition: width 1s ease;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-modern {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 15px;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-primary-modern {
            background: var(--primary-gradient);
            color: white;
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-light);
        }

        .btn-outline-modern {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline-modern:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-2px);
        }

        /* Tabs */
        .nav-tabs-modern {
            border: none;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            padding: 10px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-light);
        }

        .nav-link-modern {
            border: none;
            color: #666;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 15px;
            transition: var(--transition);
            margin: 0 5px;
        }

        .nav-link-modern.active {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-2px);
        }

        .nav-link-modern:hover {
            color: #667eea;
            transform: translateY(-1px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .search-container {
                padding: 20px;
            }
            
            .stats-card {
                margin-bottom: 20px;
            }
            
            .sidebar {
                margin-bottom: 30px;
            }
        }

        /* Loading Animation */
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(102, 126, 234, 0.3);
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-gradient);
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            border-radius: 50%;
            border: none;
            color: white;
            font-size: 1.5rem;
            box-shadow: var(--shadow-heavy);
            z-index: 1000;
            transition: var(--transition);
        }

        .fab:hover {
            transform: scale(1.1);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>
    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>

    <!-- Hero Header -->
    <header class="hero-header">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">
                    <i class="fas fa-building me-3"></i>
                    الدليل الشامل للشركات الهندسية
                </h1>
                <p class="hero-subtitle">
                    اكتشف أفضل الشركات الهندسية المعتمدة في الوطن العربي
                </p>
                
                <!-- Search Section -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="search-container">
                            <form class="row g-3">
                                <div class="col-md-5">
                                    <div class="position-relative">
                                        <i class="fas fa-search position-absolute top-50 translate-middle-y me-3" style="right: 15px; color: #999;"></i>
                                        <input type="text" class="form-control search-input pe-5" placeholder="ابحث عن شركة هندسية...">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select search-input">
                                        <option selected>جميع المدن</option>
                                        <option>القاهرة</option>
                                        <option>الرياض</option>
                                        <option>دبي</option>
                                        <option>عمان</option>
                                        <option>بيروت</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn search-btn w-100">
                                        <i class="fas fa-search me-2"></i>بحث
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-container">
        <div class="container">
            <!-- Stats Section -->
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">1,248</div>
                        <div class="stats-label">شركة مسجلة</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">5,742</div>
                        <div class="stats-label">مشروع مكتمل</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">32</div>
                        <div class="stats-label">تخصص هندسي</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">14</div>
                        <div class="stats-label">دولة عربية</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Filters -->
                <div class="col-lg-3 mb-4">
                    <div class="sidebar">
                        <h5 class="filter-title">
                            <i class="fas fa-filter me-2"></i>تصفية النتائج
                        </h5>
                        
                        <div class="filter-group">
                            <h6>التخصص الهندسي</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="civil">
                                <label class="form-check-label" for="civil">
                                    <i class="fas fa-hammer me-2"></i>شركات بناء
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="arch">
                                <label class="form-check-label" for="arch">
                                    <i class="fas fa-drafting-compass me-2"></i>شركات تصميم
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mech">
                                <label class="form-check-label" for="mech">
                                    <i class="fas fa-paint-brush me-2"></i>شركات تشطيب
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="elec">
                                <label class="form-check-label" for="elec">
                                    <i class="fas fa-bolt me-2"></i>شركات كهرباء
                                </label>
                            </div>
                        </div>

                        <div class="filter-group">
                            <h6>سنوات الخبرة</h6>
                            <input type="range" class="form-range" min="0" max="30" step="5" id="experienceRange">
                            <div class="d-flex justify-content-between small text-muted">
                                <span>0</span>
                                <span>15</span>
                                <span>30+</span>
                            </div>
                        </div>

                        <div class="filter-group">
                            <h6>التقييم</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rating5">
                                <label class="form-check-label" for="rating5">
                                    <span class="rating-stars">★★★★★</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rating4">
                                <label class="form-check-label" for="rating4">
                                    <span class="rating-stars">★★★★☆</span> فأعلى
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rating3">
                                <label class="form-check-label" for="rating3">
                                    <span class="rating-stars">★★★☆☆</span> فأعلى
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary-modern">تطبيق الفلتر</button>
                            <button class="btn btn-outline-modern">إعادة تعيين</button>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-lg-9">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-tabs nav-tabs-modern" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link nav-link-modern active" data-bs-toggle="tab" href="#all">
                                <i class="fas fa-building me-2"></i>جميع الشركات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-modern" data-bs-toggle="tab" href="#featured">
                                <i class="fas fa-star me-2"></i>مميزة
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-modern" data-bs-toggle="tab" href="#top-rated">
                                <i class="fas fa-trophy me-2"></i>الأعلى تقييماً
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-modern" data-bs-toggle="tab" href="#recent">
                                <i class="fas fa-clock me-2"></i>الأحدث
                            </a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="all">
                            <!-- Results Info -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6 class="mb-0">عرض <span class="text-primary">1-12</span> من <span class="text-primary">1248</span> شركة</h6>
                                <div class="d-flex gap-2">
                                    <select class="form-select form-select-sm" style="width: auto;">
                                        <option>ترتيب: الأحدث</option>
                                        <option>الأعلى تقييماً</option>
                                        <option>الأكثر خبرة</option>
                                    </select>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary btn-sm active">
                                            <i class="fas fa-th-large"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-list"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Companies Grid -->
                            <div class="row">
                            @forelse ($companies as $company)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="company-card h-100">
                    <div class="position-relative">
                        <img src="{{ $company->image ? asset('storage/' . $company->image) : 'https://via.placeholder.com/300' }}" 
                             alt="{{ $company->name }}" class="company-image">
                        <img src="{{ $company->image ? asset('storage/' . $company->image) : 'https://via.placeholder.com/100' }}" 
                             alt="شعار {{ $company->name }}" class="company-logo">
                    </div>
                    <div class="company-body d-flex flex-column">
                        <h3 class="company-title">{{ $company->name }}</h3>
                        <p class="company-subtitle">
                            <i class="fas fa-map-marker-alt me-2"></i>{{ $company->city }}
                        </p>
                        <div class="mb-3">
                            @foreach ($company->services ?? [] as $service)
                                <span class="specialization-tag">{{ $service }}</span>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between small">
                                <span>سنوات الخبرة</span>
                                <span>{{ $company->years_experience ?? 0 }} سنة</span>
                            </div>
                            <div class="progress-modern">
                                <div class="progress-bar-modern" style="width: {{ ($company->years_experience ?? 0) / 30 * 100 }}%;"></div>
                            </div>
                        </div>
                        <div class="action-buttons mt-auto">
                            <a href="{{ route('engineering_companies.show', $company->id) }}" class="btn btn-primary-modern">عرض التفاصيل</a>
                            <a href="{{ route('engineering_companies.show', $company->id) }}" class="btn btn-outline-modern">تواصل معنا</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">لا توجد شركات متاحة</p>
        @endforelse
    </div>
</div>
@endsection               
</div>            

<script>
    function createParticles() {
        const particlesContainer = document.getElementById('particles');
        const particleCount = 50;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 6}s`;
            particlesContainer.appendChild(particle);
        }
    }
    window.onload = createParticles;
</script>