@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #22C55E;
            --primary-dark: #16A34A;
            --primary-light: #86EFAC;
            --secondary-color: #3B82F6;
            --dark-color: #1F2937;
            --light-color: #F9FAFB;
            --gray-color: #6B7280;
            --light-gray: #E5E7EB;
            --danger-color: #EF4444;
            --warning-color: #F59E0B;
        }

        body {
            background-color: var(--light-color);
            font-family: 'Cairo', sans-serif;
            color: var(--dark-color);
            line-height: 1.6;
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 4rem 0 6rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 2rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-weight: 900;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
            position: relative;
            display: inline-block;
        }

        .header h1::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: rgba(255, 255, 255, 0.3);
            z-index: -1;
            border-radius: 4px;
        }

        .search-section {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 3rem;
        }

        /* Company Cards */
        .company-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 1.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .company-img {
            height: 220px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }

        .company-card:hover .company-img {
            transform: scale(1.05);
        }

        .featured-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: var(--warning-color);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.9rem;
            z-index: 10;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            position: absolute;
            top: -40px;
            right: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        /* Stats Items */
        .stats-item {
            text-align: center;
            padding: 1.5rem;
            border-radius: 1.5rem;
            background: rgba(34, 197, 94, 0.1);
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .stats-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            font-size: 0.95rem;
            color: var(--gray-color);
        }

        /* Progress Bars */
        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: var(--light-gray);
        }

        .progress-bar {
            background-color: var(--primary-color);
            border-radius: 4px;
        }

        /* Tabs */
        .nav-tabs .nav-link {
            color: var(--gray-color);
            font-weight: 700;
            border: none;
            padding: 0.8rem 1.5rem;
            position: relative;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background: transparent;
        }

        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 3px 3px 0 0;
        }

        /* Sidebar Widgets */
        .sidebar-widget {
            background: white;
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .sidebar-title {
            font-weight: 700;
            color: var(--dark-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.8rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Rating Stars */
        .rating {
            color: var(--warning-color);
            margin-bottom: 0.5rem;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 1rem;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.3);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
            border-radius: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.2);
        }

        /* Map Container */
        .map-container {
            height: 300px;
            border-radius: 1.5rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .header {
                padding: 3rem 0 5rem;
            }

            .company-img {
                height: 200px;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 2.5rem 0 4rem;
                border-radius: 0 0 1.5rem 1.5rem;
            }

            .search-section {
                padding: 1.5rem;
            }

            .company-logo {
                width: 70px;
                height: 70px;
                top: -35px;
            }
        }

        @media (max-width: 576px) {
            .header {
                padding: 2rem 0 3rem;
            }

            .header h1 {
                font-size: 1.8rem;
            }

            .company-img {
                height: 180px;
            }

            .company-logo {
                width: 60px;
                height: 60px;
                top: -30px;
            }
        }

        /* Animation for Stats */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stats-section .stats-item {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .stats-section .stats-item:nth-child(1) { animation-delay: 0.1s; }
        .stats-section .stats-item:nth-child(2) { animation-delay: 0.2s; }
        .stats-section .stats-item:nth-child(3) { animation-delay: 0.3s; }
        .stats-section .stats-item:nth-child(4) { animation-delay: 0.4s; }

        /* Hover Effects */
        .company-card .card-body {
            transition: all 0.3s ease;
        }

        .company-card:hover .card-body {
            background-color: rgba(248, 250, 252, 0.8);
        }

        /* Specializations Tags */
        .specialization-tag {
            background-color: var(--light-color);
            color: var(--dark-color);
            padding: 0.4rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin: 0.2rem;
            border: 1px solid var(--light-gray);
            transition: all 0.3s ease;
        }

        .specialization-tag:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Pagination */
        .pagination {
            justify-content: center;
            margin: 2rem 0;
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-link {
            color: var(--primary-color);
            font-weight: 600;
            border-radius: 0.8rem !important;
            margin: 0 0.3rem;
            border: none;
            padding: 0.7rem 1.2rem;
        }

        .page-link:hover {
            background-color: var(--light-color);
        }

        /* Under Construction */
        .under-construction {
            text-align: center;
            padding: 3rem 0;
        }

        .under-construction img {
            max-height: 150px;
            margin-bottom: 1.5rem;
        }

        /* Contact Modal */
        .contact-modal .modal-content {
            border-radius: 1.5rem;
            overflow: hidden;
        }

        .contact-modal .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .contact-modal .modal-body {
            padding-top: 0;
        }
    </style>
@endsection

@section('content')
    <!-- Header Section -->
    <div class="header text-center">
        <div class="container">
            <h1 class="mb-4"><i class="fas fa-building me-2"></i> الدليل الشامل للشركات الهندسية</h1>
            <p class="lead mb-4">أكبر قاعدة بيانات للشركات الهندسية المعتمدة في الوطن العربي</p>

            <!-- Search Bar -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="search-section">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                                        <input type="text" class="form-control border-start-0" placeholder="ابحث عن شركة هندسية...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select">
                                        <option selected>سنوات الخبرة </option>
                                        <option>1 </option>
                                        <option>2 </option>
                                        <option>3 </option>
                                        <option>4 </option>
                                        <option>5 </option>

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select">
                                        <option selected>جميع المدن</option>
                                        <option>القاهرة</option>
                                        <option>الرياض</option>
                                        <option>دبي</option>
                                        <option>عمان</option>
                                        <option>بيروت</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary w-100">بحث <i class="fas fa-filter ms-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <!-- Filter Section -->
                <div class="sidebar-widget">
                    <h5 class="sidebar-title"><i class="fas fa-filter me-2"></i>تصفية النتائج</h5>

                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">التخصص الهندسي</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="civil">
                            <label class="form-check-label" for="civil">شركات بناء</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="arch">
                            <label class="form-check-label" for="arch">شركات تصميم</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="mech">
                            <label class="form-check-label" for="mech">شركات تشطيب</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">سنوات الخبرة</h6>
                        <input type="range" class="form-range" min="0" max="30" step="5" id="experienceRange">
                        <div class="d-flex justify-content-between">
                            <span>0</span>
                            <span>5</span>
                            <span>10</span>
                            <span>15</span>
                            <span>20+</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">التقييم</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="rating5">
                            <label class="form-check-label" for="rating5">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="rating4">
                            <label class="form-check-label" for="rating4">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i> +
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="rating3">
                            <label class="form-check-label" for="rating3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i> +
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100">تطبيق الفلتر</button>
                    <button class="btn btn-outline-secondary w-100 mt-2">إعادة تعيين</button>
                </div>

                <!-- Statistics -->
                <div class="sidebar-widget">
                    <h5 class="sidebar-title"><i class="fas fa-chart-bar me-2"></i>إحصائيات</h5>
                    <div class="row">
                        <div class="col-6">
                            <div class="stats-item">
                                <div class="stats-number">1,248</div>
                                <div class="stats-label">شركة</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-item">
                                <div class="stats-number">5,742</div>
                                <div class="stats-label">مشروع</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-item">
                                <div class="stats-number">32</div>
                                <div class="stats-label">تخصص</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-item">
                                <div class="stats-number">14</div>
                                <div class="stats-label">دولة</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">الكل</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured" type="button" role="tab">مميزة</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="top-rated-tab" data-bs-toggle="tab" data-bs-target="#top-rated" type="button" role="tab">الأعلى تقييماً</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="new-tab" data-bs-toggle="tab" data-bs-target="#new" type="button" role="tab">جديدة</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <!-- Sorting -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">عرض <span class="text-primary">1-12</span> من <span class="text-primary">1248</span> شركة</h5>
                            <div class="d-flex">
                                <div class="me-3">
                                    <select class="form-select form-select-sm">
                                        <option>ترتيب حسب: الأحدث</option>
                                        <option>الأعلى تقييماً</option>
                                        <option>الأكثر خبرة</option>
                                        <option>الأقل سعراً</option>
                                    </select>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-secondary active"><i class="fas fa-th-large"></i></button>
                                    <button type="button" class="btn btn-outline-secondary"><i class="fas fa-list"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Companies List -->
                        <div class="row">
                            @forelse ($companies as $company)
                                <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                    <div class="company-card card h-100">


                                        <div id="carousel-{{ $company->id }}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" style="text-align: center">
                                                    <img src="{{ asset('storage/' . $company->image) }}" class="company-img" alt="{{ $company->name }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body pt-4">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <h3 class="h5 mb-0">
                                                    <a href="{{ route('engineering_companies.show', $company->id) }}" class="text-dark text-decoration-none">
                                                        {{ $company->name }}
                                                    </a>
                                                </h3>

                                            </div>



                                            <hr class="my-3">

                                            <div class="mb-3">
                                                <h6 class="text-muted mb-2">سنوات الخبرة</h6>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1">
                                                        <div class="progress-bar" role="progressbar" style="width: {{ min(100, ($company->years_experience ?? 0) * 10) }}%" aria-valuenow="{{ $company->years_experience ?? 0 }}" aria-valuemin="0" aria-valuemax="10"></div>
                                                    </div>
                                                    <span class="ms-2 fw-bold">{{ $company->years_experience ?? 'غير محدد' }} سنة</span>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <h6 class="text-muted mb-2">التخصصات</h6>
                                                <div class="d-flex flex-wrap">
                                                    @forelse ($company->specializations ?? [] as $spec)
                                                        <span class="specialization-tag">{{ $spec }}</span>
                                                    @empty
                                                        <span class="text-muted small">غير محدد</span>
                                                    @endforelse
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <h6 class="text-muted mb-0">معدل إنجاز المشاريع</h6>
                                                    <span class="fw-bold">{{ $company->completion_rate ?? 0 }}%</span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $company->completion_rate ?? 0 }}%" aria-valuenow="{{ $company->completion_rate ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <a href="{{ route('engineering_companies.show', $company->id) }}" class="btn btn-outline-primary flex-grow-1 py-2">
                                                    <i class="fas fa-eye me-1"></i> عرض التفاصيل
                                                </a>
                                                <button class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#contactModal" data-company="{{ $company->name }}" data-id="{{ $company->id }}">
                                                    <i class="fas fa-envelope"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="text-center py-5">
                                        <i class="fas fa-building fa-3x text-muted mb-3"></i>
                                        <h4 class="text-muted">لا توجد شركات متاحة</h4>
                                        <p class="text-muted">لم يتم العثور على شركات هندسية مسجلة حالياً</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="tab-pane fade" id="featured" role="tabpanel">
                        <div class="under-construction">
                            <img src="{{ asset('storage/under-construction.svg') }}" alt="قيد التطوير">
                            <h5 class="mb-3">هذا القسم قيد التطوير</h5>
                            <p class="text-muted">سيتم عرض الشركات المميزة هنا قريباً</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="top-rated" role="tabpanel">
                        <div class="under-construction">
                            <img src="{{ asset('storage/under-construction.svg') }}" alt="قيد التطوير">
                            <h5 class="mb-3">هذا القسم قيد التطوير</h5>
                            <p class="text-muted">سيتم عرض الشركات الأعلى تقييماً هنا قريباً</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="new" role="tabpanel">
                        <div class="under-construction">
                            <img src="{{ asset('storage/under-construction.svg') }}" alt="قيد التطوير">
                            <h5 class="mb-3">هذا القسم قيد التطوير</h5>
                            <p class="text-muted">سيتم عرض الشركات الجديدة هنا قريباً</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <div class="stats-number">15+</div>
                    <div class="stats-label">سنة خبرة</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <div class="stats-number">500+</div>
                    <div class="stats-label">مشروع مكتمل</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <div class="stats-number">120+</div>
                    <div class="stats-label">شركة شريكة</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <div class="stats-number">95%</div>
                    <div class="stats-label">عملاء راضون</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div class="modal fade contact-modal" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">اتصال بالشركة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">الاسم الكامل</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">رقم الهاتف</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">الموضوع</label>
                                    <select class="form-select" id="subject">
                                        <option>استفسار عام</option>
                                        <option>طلب عرض سعر</option>
                                        <option>طلب توظيف</option>
                                        <option>شكوى</option>
                                        <option>مقترح</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">الرسالة</label>
                                    <textarea class="form-control" id="message" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">إرسال الرسالة</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light p-4 h-100 rounded">
                                <h6 class="fw-bold mb-3">معلومات الشركة</h6>
                                <div id="companyInfo">
                                    <p>سيتم عرض معلومات الشركة هنا عند النقر على زر الاتصال</p>
                                </div>
                                <hr>
                                <h6 class="fw-bold mb-3">خريطة الموقع</h6>
                                <div class="map-container bg-white">
                                    <img src="https://via.placeholder.com/400x200" alt="خريطة" class="img-fluid h-100 w-100">
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-outline-secondary w-100">
                                        <i class="fas fa-directions me-2"></i>إرشادات الوصول
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactModal = document.getElementById('contactModal');
            contactModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const companyName = button.getAttribute('data-company');
                const companyId = button.getAttribute('data-id');

                const modalTitle = contactModal.querySelector('.modal-title');
                modalTitle.textContent = `اتصال بشركة ${companyName}`;

                const companyInfo = contactModal.querySelector('#companyInfo');
                companyInfo.innerHTML = `
                    <p><strong>اسم الشركة:</strong> ${companyName}</p>
                    <p><strong>رقم التسجيل:</strong> ${companyId}</p>
                    <p><strong>البريد الإلكتروني:</strong> info@${companyName.replace(/\s+/g, '').toLowerCase()}.com</p>
                    <p><strong>الهاتف:</strong> +966 12 345 6789</p>
                `;
            });

            // Animate stats on scroll
            const statsSection = document.querySelector('.stats-section');
            if (statsSection) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });

                document.querySelectorAll('.stats-item').forEach(item => {
                    observer.observe(item);
                });
            }

            // Header scroll effect
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.header');
                if (window.scrollY > 50) {
                    header.style.padding = '2rem 0';
                    header.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
                } else {
                    header.style.padding = '4rem 0 6rem';
                    header.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
                }
            });
        });
    </script>
@endsection