
@extends('layouts.app')

@section('title', 'الرئيسية - بيتك')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    /* دعم النصوص العربية */
    body {
        font-family: 'Cairo', sans-serif;
        direction: rtl;
        background-color: #f1f3f5;
    }

    /* تنسيق الصفحات العام */
    section {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    /* تنسيق الحاوية */
    .container-fluid {
        max-width: 1600px;
    }

    /* تنسيق العناوين */
    .display-2 {
        font-size: 2.5rem;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    h2 {
        font-size: 3rem;
        color: #1a252f;
    }

    h3 {
        font-size: 2rem;
        color: #1a252f;
    }

    /* تنسيق البطاقات */
    .card {
        border: none;
        border-radius: 1.5rem;
        background-color: #fff;
        transition: transform 0.4s, box-shadow 0.4s;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    /* تنسيق بطاقات الفريق */
    .team-card {
        overflow: hidden;
    }

    .team-img {
        height: 350px;
        object-fit: cover;
        border-radius: 1.5rem 1.5rem 0 0;
    }

    /* تنسيق بطاقات الليدر */
    .leader-card {
        background: linear-gradient(180deg, #f8f9fa, #ffffff);
    }

    .leader-img {
        height: 400px;
        object-fit: cover;
        border-radius: 1.5rem 1.5rem 0 0;
    }

    /* تنسيق بطاقات العقارات */
    .property-card {
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }

    .property-img {
        height: 400px;
        object-fit: cover;
        border-radius: 1.5rem 1.5rem 0 0;
    }

    /* تنسيق بطاقات المدونة */
    .blog-card,
    .news-img {
        height: 300px;
        object-fit: cover;
    }

    /* تنسيق الهيرو */
    .hero {
        height: 60vh;
        overflow: hidden;
        position: relative;
        background: url('{{ asset('images/photo-1570129477492-45c003edd2be.avif') }}') center/cover no-repeat;
    }

    .hero .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .hero .carousel-caption {
        position: relative;
        top: 25%;
        right: 1%;
        transform: translateY(-50%);
        padding: 3rem;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 1.5rem;
        max-width: 900px;
        z-index: 2;
    }

    .hero .search-form {
        margin-top: 2rem;
    }

    .hero .form-control,
    .hero .form-select {
        border: none;
        padding: 1rem;
        font-size: 1.2rem;
        border-radius: 0.75rem;
    }

    .hero .btn-primary {
        padding: 1rem 2rem;
        font-size: 1.2rem;
    }

    /* تنسيق الأقسام */
    .featured-section,
    .why-us-section,
    .news-section,
    .stats-section,
    .map-section,
    .partners-section,
    .cta-section {
        padding: 6rem 0;
    }

    .why-us-section,
    .partners-section {
        background: linear-gradient(180deg, #f8f9fa, #ffffff);
    }

    .stats-section {
        background: linear-gradient(90deg, #007bff, #00aaff);
    }

    .cta-section .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .cta-section h2,
    .cta-section p {
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
    }

    /* تنسيق الفلاتر والنماذج */
    .form-control,
    .form-select {
        border-radius: 0.75rem;
        padding: 0.75rem;
        font-size: 1.1rem;
    }

    /* تنسيق الأزرار */
    .btn-primary {
        background: linear-gradient(90deg, #007bff, #00aaff);
        border: none;
        padding: 0.75rem 1.5rem;
        font-size: 1.2rem;
        border-radius: 0.75rem;
        transition: background 0.4s, transform 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #0056b3, #007bff);
        transform: translateY(-3px);
    }

    .btn-outline-primary {
        border-radius: 0.75rem;
        transition: background-color 0.4s, transform 0.3s;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
        transform: translateY(-3px);
    }

    .btn-outline-light {
        border-color: #fff;
        color: #fff;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #007bff;
    }

    /* تنسيق التواصل الاجتماعي */
    .social-links .btn {
        width: 50px;
        height: 50px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        transition: background-color 0.4s, transform 0.3s;
    }

    .social-links .btn:hover {
        background-color: #007bff;
        color: #fff;
        transform: scale(1.15);
    }

    /* تنسيق القيم والإنجازات */
    .card .bi,
    .stats-section .bi {
        color: #ffd700;
    }

    /* تنسيق الخريطة */
    iframe {
        border-radius: 1.5rem;
    }

    /* تنسيق معرض الصور */
    .carousel-inner img {
        height: 600px;
        object-fit: cover;
        border-radius: 1.5rem 1.5rem 0 0;
    }

    /* تنسيق المدونة */
    .badge {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }

    .list-unstyled a {
        transition: color 0.3s;
    }

    .list-unstyled a:hover {
        color: #0056b3;
    }

    /* تنسيق الشركاء */
    .partner-logo {
        max-height: 100px;
        filter: grayscale(50%);
        transition: filter 0.3s;
    }

    .partner-logo:hover {
        filter: grayscale(0);
    }

    /* استجابية */
    @media (max-width: 1200px) {
        .display-2 {
            font-size: 3.5rem;
        }

        h2 {
            font-size: 4.5rem;
        }

        .hero .carousel-caption {
            padding: 2rem;
        }
    }

    @media (max-width: 992px) {
        .display-2 {
            font-size: 2.5rem;
        }

        h2 {
            font-size: 2rem;
        }

        .hero {
            height: 80vh;
        }

        .team-img,
        .property-img,
        .blog-img,
        .carousel-inner img {
            height: 300px;
        }

        .leader-img {
            height: 300px;
        }
    }

    @media (max-width: 576px) {
        .container-fluid {
            padding: 0 1rem;
        }

        .card {
            padding: 1.5rem !important;
        }

        .display-2 {
            font-size: 2rem;
        }

        h3 {
            font-size: 1.5rem;
        }

        .hero {
            height: 70vh;
        }

        .hero .carousel-caption {
            padding: 1rem;
        }

        .hero .form-control,
        .hero .form-select,
        .hero .btn-primary {
            font-size: 1rem;
            padding: 0.75rem;
        }

        .team-img,
        .property-img,
        .blog-img,
        .carousel-inner img {
            height: 250px;
        }

        .leader-img {
            height: 250px;
        }

        .map-section iframe {
            height: 400px;
        }
        .property-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease;
}

.property-card:hover {
    transform: translateY(-5px);
}

.property-image-container {
    height: 220px;
    overflow: hidden;
}

.property-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-size: 1.25rem;
    min-height: 60px; /* لضبط توازن العناوين */
}

.card-body p {
    min-height: 70px;
}

.btn {
    transition: 0.3s ease;
}

.btn:hover {
    opacity: 0.9;
}

    }
</style>
<style>
    <style>
.card {
    transition: transform 0.3s, box-shadow 0.3s;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

.image-container {
    position: relative;
}

.object-fit-cover {
    object-fit: cover;
    object-position: center;
}

.details strong {
    color: #2c3e50;
    font-weight: 600;
}

.btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.badge {
    font-size: 0.9rem;
    padding: 0.5rem 0.8rem;
}
</style>
</style>
<style>.horizontal-scroll {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding-bottom: 10px;
}

.horizontal-scroll::-webkit-scrollbar {
    height: 8px;
}

.horizontal-scroll::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 10px;
}

.news-card {
    flex: 0 0 300px;
    scroll-snap-align: start;
    transition: transform 0.4s ease;
}

.news-card:hover {
    transform: scale(1.03);
}
</style>
{{-- <style>
    /* تنسيقات مخصصة */
    .carousel-wrapper {
        position: relative;
        padding: 0 40px; /* مساحة أكبر للأسهم */
        overflow: hidden;
    }

    .carousel-track {
        display: flex;
        gap: 20px;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .property-card {
        flex: 0 0 calc(33.333% - 20px); /* 3 عناصر في الصف */
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: #007bff;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.9;
        transition: all 0.3s;
    }

    .carousel-btn:hover {
        opacity: 1;
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-btn.left { left: 10px; }
    .carousel-btn.right { right: 10px; }

    @media (max-width: 768px) {
        .property-card {
            flex: 0 0 calc(100% - 20px); /* عنصر واحد في الشاشات الصغيرة */
        }

        .carousel-btn {
            width: 30px;
            height: 30px;
        }
    }
</style> --}}
@if(session('success'))
    <div class="alert alert-success text-center mt-5">
        {{ session('success') }}
    </div>
@endif
<!-- قسم الهيرو -->
<section class="hero position-relative">
    <div class="hero-overlay"></div>
    <div class="carousel-caption">
        <h1 class="display-2 fw-bold animate__animated animate__fadeInDown">مرحبًا بك في عالم العقارات الفاخرة</h1>
        <p class="lead mb-4 animate__animated animate__fadeInUp">ابحث عن منزل أحلامك أو استثمر في أفضل الفرص العقارية</p>
        <section class="search-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">ابحث عن عقارك</h2>
        <form action="" method="GET" class="search-form">
            <div class="row g-3">
                <div class="col-md-4">
                    <select name="type" class="form-select" required>
                        <option value="">نوع العقار</option>
                        <option value="rent">إيجار</option>
                        <option value="sale">بيع</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="city" class="form-control" placeholder="المدينة" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">بحث</button>
                </div>
            </div>
        </form>
    </div>
</section>
        <!-- <section class="search-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">ابحث عن عقارك</h2>
        <form action="{{ route('property.search') }}" method="GET" class="search-form">
            <div class="row g-3">
                <div class="col-md-4">
                    <select name="type" class="form-select" required>
                        <option value="">نوع العقار</option>
                        <option value="rent">إيجار</option>
                        <option value="sale">بيع</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="city" class="form-control" placeholder="المدينة" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">بحث</button>
                </div>
            </div>
        </form>
    </div>
</section> -->
    </div>
</section>



<!-- قسم العقارات المميزة -->


<section class="featured-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold">
            <i class="bi bi-star-fill me-2 text-warning"></i>عقارات مميزة
        </h2>

        <div class="carousel-wrapper position-relative">
          
            <div class="carousel-track d-flex">
                @forelse ($properties as $property)
                <div class="property-card flex-shrink-0">
                    <div class="property-image-container">
                        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="text-muted small">{{ $property->city }}</p>
                        <h4 class="text-primary">{{ number_format($property->price) }} جنيه</h4>
                        <a href="{{ route('property.show', $property->id) }}" class="btn btn-primary w-100">عرض التفاصيل</a>
                    </div>
                </div>
                @empty
                <div class="text-center text-muted fs-4 w-100">لا توجد عقارات متاحة حاليًا.</div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .featured-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }

        .carousel-wrapper {
            position: relative;
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .property-card {
            width: 316px;
            margin: 0 10px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.1);
            overflow: hidden;
        }

        .property-image-container img {
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .text-primary {
            font-weight: 700;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(67, 97, 238, 0.8);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: background 0.3s ease;
        }

        .carousel-btn:hover {
            background: rgba(67, 97, 238, 1);
        }

        .carousel-btn.left {
            right: 10px;
        }

        .carousel-btn.right {
            left: 10px;
        }

        @media (max-width: 768px) {
            .property-card {
                width: 250px;
            }
            .property-image-container img {
                height: 150px;
            }
            .card-title {
                font-size: 1rem;
            }
        }
    </style>

    <script>
        let currentIndex = 0;
        const track = document.querySelector('.carousel-track');
        const cards = document.querySelectorAll('.property-card');
        const cardWidth = cards[0]?.offsetWidth + 20; // Card width + margin

        function moveCarousel(direction) {
            if (!cards.length) return;

            currentIndex += direction;
            const maxIndex = cards.length - Math.floor(window.innerWidth / cardWidth);

            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }

            track.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
        }
    </script>
</section>


<!-- قسم لماذا نحن -->
<section class="why-us-section py-5 bg-light">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold">لماذا تختار بيتك؟</h2>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg p-4 rounded-4 text-center">
                    <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-3">شفافية مضمونة</h4>
                    <p>معلومات دقيقة وواضحة عن كل عقار لتتخذ قرارك بثقة.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg p-4 rounded-4 text-center">
                    <i class="bi bi-person-heart fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-3">دعم مستمر</h4>
                    <p>فريقنا معك في كل خطوة، من البحث إلى إتمام الصفقة.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg p-4 rounded-4 text-center">
                    <i class="bi bi-trophy-fill fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-3">خبرة مثبتة</h4>
                    <p>سنوات من النجاح في سوق العقارات المصري.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg p-4 rounded-4 text-center">
                    <i class="bi bi-wallet2 fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-3">أسعار تنافسية</h4>
                    <p>عروض حصرية تناسب جميع الميزانيات.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- قسم آخر الأخبار -->
<section class="news-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold"><i class="bi bi-newspaper me-2"></i>آخر الأخبار العقارية</h2>
        <div class="news-container d-flex flex-nowrap overflow-hidden">
            @forelse ($properties->take(4) as $post)
            <div class="news-card card shadow-lg rounded-4 overflow-hidden me-3 flex-shrink-0" style="width: 300px;">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top news-img" alt="{{ $post->title }}" style="height: 180px; object-fit: cover;">
                <div class="card-body p-3">
                    <span class="badge bg-primary mb-2">{{ $post->category }}</span>
                    <h4 class="card-title fw-semibold mb-2" style="font-size: 1.1rem;">{{ $post->title }}</h4>
                    <p class="text-muted mb-2" style="font-size: 0.85rem;">{{ $post->created_at->format('d M Y') }}</p>
                    <p class="card-text" style="font-size: 0.9rem;">{{ Str::limit($post->content, 50) }}</p>
                </div>
            </div>
            @empty
            <div class="text-center w-100">
                <p class="text-muted fs-4">لا توجد أخبار حاليًا. تابعنا للمزيد!</p>
            </div>
            @endforelse
        </div>
    </div>

    <style>
        .news-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }

        .news-container {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .news-card {
            width: 300px;
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.2);
        }

        .news-img {
            border-top-right-radius: 12px;
            border-top-left-radius: 12px;
        }

        @media (max-width: 1200px) {
            .news-card {
                width: 250px;
            }
            .news-img {
                height: 150px;
            }
            .card-title {
                font-size: 1rem;
            }
            .card-text, .text-muted {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 992px) {
            .news-container {
                flex-wrap: wrap;
                justify-content: center;
            }
            .news-card {
                width: 45%;
            }
        }

        @media (max-width: 576px) {
            .news-card {
                width: 100%;
            }
        }
    </style>
</section>


<!-- الشركات الهندسية-->

<section class="news-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold text-dark">
            <i class="bi bi-building me-2"></i> الشركات الهندسية
        </h2>
        <div class="carousel-wrapper position-relative">
            <!-- Carousel Buttons -->
            <!-- <button class="carousel-btn left" onclick="moveCarousel(-1)">
                <i class="bi bi-chevron-right"></i>
            </button>
            <button class="carousel-btn right" onclick="moveCarousel(1)">
                <i class="bi bi-chevron-left"></i>
            </button> -->
            <!-- Carousel Track -->
            <div class="carousel-track d-flex">
                @forelse ($companies as $post)
                    <div class="company-card flex-shrink-0">
                        <div class="card shadow-lg rounded-4 overflow-hidden">
                            <div class="image-container position-relative">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}" class="w-100 h-100 object-fit-cover">
                                <span class="badge bg-primary position-absolute top-0 start-0 m-3 rounded-pill">
                                    {{ $post->name }}
                                </span>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <h4 class="card-title fw-semibold mb-3">
                                    {{ Str::limit($post->description, 60) }}
                                </h4>
                                <div class="details flex-grow-1">
                                    <div class="detail-item d-flex justify-content-between mb-3">
                                        <span class="text-muted"><i class="bi bi-geo-alt me-1"></i> المدينة:</span>
                                        <strong>{{ $post->city }}</strong>
                                    </div>
                                    <div class="detail-item d-flex justify-content-between mb-3">
                                        <span class="text-muted"><i class="bi bi-envelope me-1"></i> البريد:</span>
                                        <strong>{{ $post->email }}</strong>
                                    </div>
                                    <div class="detail-item d-flex justify-content-between mb-3">
                                        <span class="text-muted"><i class="bi bi-clock me-1"></i> سنوات الخبرة:</span>
                                        <strong>{{ $post->years_experience }}</strong>
                                    </div>
                                    <div class="detail-item d-flex justify-content-between">
                                        <span class="text-muted"><i class="bi bi-telephone me-1"></i> التليفون:</span>
                                        <strong>{{ $post->phone }}</strong>
                                    </div>
                                </div>
                                <div class="text-center mt-4 pt-3 border-top">
                                    <a href="{{ url('property/all') }}" class="btn btn-primary px-4 py-2 rounded-pill">
                                        <i class="bi bi-arrow-left me-2"></i> استكشف كل العقارات
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center w-100 py-5">
                        <i class="bi bi-building fs-1 text-muted mb-3"></i>
                        <p class="text-muted fs-4">لا توجد شركات مسجلة حاليًا</p>
                    </div>
                @endforelse
            </div>
            <!-- Carousel Dots -->
            <div class="carousel-dots text-center mt-4">
                @foreach ($companies as $index => $post)
                    <span class="dot {{ $index == 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></span>
                @endforeach
            </div>
        </div>
    </div>
</section>


<style>
    :root {
        --primary-color: #22C55E;
        --primary-dark: #16A34A;
        --secondary-color: #3B82F6;
        --dark-color: #1F2937;
        --light-color: #F9FAFB;
        --gray-color: #6B7280;
        --light-gray: #E5E7EB;
        --danger-color: #EF4444;
        --warning-color: #F59E0B;
    }

    .news-section {
        background: linear-gradient(135deg, var(--light-color) 0%, #e9ecef 100%);
        padding: 4rem 0;
        font-family: 'Cairo', sans-serif;
    }

    .news-section h2 {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--dark-color);
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        position: relative;
        display: inline-block;
    }

    .news-section h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 4px;
        background: var(--primary-color);
        border-radius: 2px;
    }

    .carousel-wrapper {
        position: relative;
        overflow: hidden;
        max-width: 93%;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
        gap: 1.5rem;
        padding: 0 1rem;
    }

    .company-card {
        width: 338px;
        flex: 0 0 auto;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .company-card:hover {
        transform: translateY(-8px);
        opacity: 0.95;
    }

    .card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .image-container {
        height: 260px;
        position: relative;
        overflow: hidden;
    }

    .image-container img {
        border-radius: 1.5rem 1.5rem 0 0;
        transition: transform 0.5s ease;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .company-card:hover .image-container img {
        transform: scale(1.05);
    }

    .badge {
        font-size: 0.9rem;
        font-weight: 700;
        padding: 0.5rem 1rem;
        background: var(--primary-color);
        color: white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .badge:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
        line-height: 1.4;
    }

    .detail-item {
        font-size: 0.95rem;
        color: var(--gray-color);
        transition: color 0.3s ease;
    }

    .detail-item:hover {
        color: var(--primary-color);
    }

    .detail-item strong {
        color: var(--dark-color);
        font-weight: 600;
    }

    .btn-primary {
        background: var(--primary-color);
        border: none;
        font-weight: 700;
        padding: 0.7rem 1.5rem;
        border-radius: 1rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(34, 197, 94, 0.3);
    }

    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: var(--secondary-color);
        color: white;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .carousel-btn:hover {
        background: var(--primary-color);
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-btn.left {
        right: -25px;
    }

    .carousel-btn.right {
        left: -25px;
    }

    .carousel-dots {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1.5rem;
    }

    .dot {
        width: 12px;
        height: 12px;
        background: var(--light-gray);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .dot.active {
        background: var(--primary-color);
        transform: scale(1.2);
    }

    .dot:hover {
        background: var(--primary-dark);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .company-card {
            width: 340px;
        }
        .image-container {
            height: 240px;
        }
        .card-title {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 992px) {
        .company-card {
            width: 300px;
        }
        .image-container {
            height: 220px;
        }
        .carousel-btn.left {
            right: -15px;
        }
        .carousel-btn.right {
            left: -15px;
        }
    }

    @media (max-width: 768px) {
        .carousel-track {
            flex-wrap: nowrap;
            justify-content: flex-start;
        }
        .company-card {
            width: 90%;
            max-width: 320px;
            margin: 0 auto;
        }
        .carousel-btn {
            width: 40px;
            height: 40px;
        }
        .carousel-btn.left {
            right: 10px;
        }
        .carousel-btn.right {
            left: 10px;
        }
        .news-section h2 {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .company-card {
            width: 100%;
            max-width: 280px;
        }
        .image-container {
            height: 200px;
        }
        .card-title {
            font-size: 1.2rem;
        }
        .detail-item {
            font-size: 0.85rem;
        }
        .carousel-dots {
            gap: 0.3rem;
        }
        .dot {
            width: 10px;
            height: 10px;
        }
    }
</style>

    <script>
        let currentIndex = 0;
        const track = document.querySelector('.carousel-track');
        const cards = document.querySelectorAll('.company-card');
        const cardWidth = 360 + 20; // Card width + gap

        function moveCarousel(direction) {
            if (!cards.length) return;

            const visibleCards = 3;
            const maxIndex = Math.ceil(cards.length - visibleCards);

            currentIndex += direction;

            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }

            track.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
        }
    </script>
</section>
<!-- قسم الإحصائيات -->
<section class="stats-section py-5 bg-primary text-white">
    <div class="container-fluid text-center">
        <h2 class="mb-5 fw-bold">إنجازاتنا</h2>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <i class="bi bi-house-fill fs-1 mb-3"></i>
                <h3 class="fw-bold counter" data-target="1500">0</h3>
                <p>عقار مباع</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <i class="bi bi-people-fill fs-1 mb-3"></i>
                <h3 class="fw-bold counter" data-target="7000">0</h3>
                <p>عميل راضٍ</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <i class="bi bi-geo-alt-fill fs-1 mb-3"></i>
                <h3 class="fw-bold counter" data-target="75">0</h3>
                <p>مدينة مغطاة</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <i class="bi bi-award-fill fs-1 mb-3"></i>
                <h3 class="fw-bold counter" data-target="15">0</h3>
                <p>جوائز تميز</p>
            </div>
        </div>
    </div>
</section>

<!-- قسم الخريطة -->
<section class="map-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold">اكتشف مواقع عقاراتنا</h2>
        <div class="card shadow-lg rounded-4 overflow-hidden">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55251.37466283923!2d31.258464499999998!3d30.059488450000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8449b0f!2sCairo%2C%20Cairo%20Governorate%2C%20Egypt!5e0!3m2!1sen!2sus!4v1697654321098!5m2!1sen!2sus"
                width="100%"
                height="600"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- قسم شركاء النجاح -->


<!-- قسم دعوة للعمل -->
<section class="cta-section py-5 position-relative" style="background: url('{{ asset('images/cta-bg.jpg') }}') center/cover no-repeat;">
    <div class="overlay"></div>
    <div class="container-fluid text-center position-relative">
        <h2 class="mb-4 fw-bold text-white display-4">انضم إلينا اليوم!</h2>
        <p class="lead mb-4 text-white">ابدأ رحلتك العقارية مع أفضل منصة في مصر</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('contact') }}" class="btn btn-primary btn-lg">تواصل معنا</a>
            <a href="#" class="btn btn-outline-light btn-lg">ابحث عن عقار</a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const wrapper = document.querySelector('.carousel-wrapper');
        const track = document.querySelector('.carousel-track');
        const prevBtn = document.querySelector('.carousel-btn.left');
        const nextBtn = document.querySelector('.carousel-btn.right');
        const cards = document.querySelectorAll('.property-card');

        if (!cards.length) return; // إذا لم توجد عناصر

        let cardWidth = cards[0].offsetWidth + 20; // حساب العرض مع الـ gap
        let currentPosition = 0;
        let maxPosition = (cards.length - 1) * cardWidth;

        // تحديث الأبعاد عند تغيير حجم الشاشة
        window.addEventListener('resize', () => {
            cardWidth = cards[0].offsetWidth + 20;
            maxPosition = (cards.length - 1) * cardWidth;
            updateTrack();
        });

        // التحديث الرئيسي
        const updateTrack = () => {
            track.style.transform = `translateX(-${currentPosition}px)`;
        };

        // التالي
        nextBtn.addEventListener('click', () => {
            currentPosition = Math.min(currentPosition + cardWidth, maxPosition);
            updateTrack();
        });

        // السابق
        prevBtn.addEventListener('click', () => {
            currentPosition = Math.max(currentPosition - cardWidth, 0);
            updateTrack();
        });

        // التمرير التلقائي
        let autoScroll = setInterval(() => {
            if (currentPosition >= maxPosition) {
                currentPosition = 0;
            } else {
                currentPosition += cardWidth;
            }
            updateTrack();
        }, 5000);

        // إيقاف التمرير عند الهافر
        wrapper.addEventListener('mouseenter', () => clearInterval(autoScroll));
        wrapper.addEventListener('mouseleave', () => {
            autoScroll = setInterval(() => {
                if (currentPosition >= maxPosition) {
                    currentPosition = 0;
                } else {
                    currentPosition += cardWidth;
                }
                updateTrack();
            }, 5000);
        });
    });


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const updateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / 200;
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCounter, 10);
            } else {
                counter.innerText = target;
            }
        };
        const observer = new IntersectionObserver(entries => {
            if (entries[0].isIntersecting) {
                updateCounter();
                observer.disconnect();
            }
        }, { threshold: 0.5 });
        observer.observe(counter);
    });

    // Parallax Effect
    const cards = document.querySelectorAll('[data-parallax]');
    window.addEventListener('scroll', () => {
        cards.forEach(card => {
            const speed = 0.2;
            const yPos = -(window.scrollY * speed);
            card.style.backgroundPositionY = `${yPos}px`;
        });
    });
});
</script>
<script>
    let currentSlide = 0;
    const track = document.querySelector('.carousel-track');
    const cards = document.querySelectorAll('.company-card');
    const dots = document.querySelectorAll('.carousel-dots .dot');
    const cardWidth = cards.length > 0 ? cards[0].offsetWidth + 24 : 0; // Including gap
    const totalSlides = cards.length;

    function updateCarousel() {
        if (totalSlides === 0) return;
        track.style.transform = `translateX(-${currentSlide * cardWidth}px)`;
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    function moveCarousel(direction) {
        if (totalSlides === 0) return;
        currentSlide += direction;
        if (currentSlide < 0) {
            currentSlide = totalSlides - 1;
        } else if (currentSlide >= totalSlides) {
            currentSlide = 0;
        }
        updateCarousel();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
    }

    // Auto-scroll every 5 seconds
    let autoScroll = setInterval(() => moveCarousel(1), 5000);

    // Pause auto-scroll on hover
    document.querySelector('.carousel-wrapper').addEventListener('mouseenter', () => {
        clearInterval(autoScroll);
    });

    document.querySelector('.carousel-wrapper').addEventListener('mouseleave', () => {
        autoScroll = setInterval(() => moveCarousel(1), 5000);
    });

    // Initialize carousel
    updateCarousel();

    // Handle window resize
    window.addEventListener('resize', () => {
        if (cards.length > 0) {
            const newCardWidth = cards[0].offsetWidth + 24;
            track.style.transform = `translateX(-${currentSlide * newCardWidth}px)`;
        }
    });
</script>
@endsection
