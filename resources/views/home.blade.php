@extends('layouts.app')

@section('title', 'الرئيسية - بيتك')

@section('content')
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
    font-size: 4.5rem;
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
    height: 100vh;
    overflow: hidden;
}

.hero .carousel-inner {
    height: 100%;
}

.hero .carousel-item {
    height: 100vh;
}

.hero .carousel-item img {
    height: 100%;
    object-fit: cover;
    filter: brightness(0.5);
}

.hero-video {
    width: 100%;
    height: 100vh;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    filter: brightness(0.5);
}

.hero .carousel-caption {
    top: 50%;
    transform: translateY(-50%);
    padding: 3rem;
    background: rgba(0, 0, 0, 0.6);
    border-radius: 1.5rem;
    max-width: 900px;
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
        font-size: 2.5rem;
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

    .hero .carousel-item,
    .hero-video {
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

    .hero .carousel-item,
    .hero-video {
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
}
</style>
@if(session('success'))
    <div class="alert alert-success text-center mt-5">
        {{ session('success') }}
    </div>
@endif

<!-- قسم الهيرو -->
<section class="hero position-relative">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <video autoplay muted loop class="hero-video">
                    <source src="{{ asset('videos/hero-bg.mp4') }}" type="video/mp4">
                    <img src="{{ asset('images/hero1.jpg') }}" class="d-block w-100" alt="عقار فاخر">
                </video>
                <div class="carousel-caption">
                    <h1 class="display-2 fw-bold animate__animated animate__fadeInDown">مرحبًا بك في عالم العقارات الفاخرة</h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp">ابحث عن منزل أحلامك أو استثمر في أفضل الفرص العقارية</p>
                    <form class="search-form mx-auto" action="{{ route('property.store') }}" method="GET">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <select name="type" class="form-select" required>
                                    <option value="">نوع العقار</option>
                                    <option value="شقة">شقة</option>
                                    <option value="فيلا">فيلا</option>
                                    <option value="أرض">أرض</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="location" class="form-control" placeholder="المدينة أو الحي" required>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">ابحث الآن</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/hero2.jpg') }}" class="d-block w-100" alt="فيلا حديثة">
                <div class="carousel-caption">
                    <h1 class="display-2 fw-bold animate__animated animate__fadeInDown">عيش الرفاهية بأسلوبك</h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp">اكتشف مجموعتنا الحصرية من العقارات المميزة</p>
                    <form class="search-form mx-auto" action="{{ route('property.store') }}" method="GET">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <select name="type" class="form-select" required>
                                    <option value="">نوع العقار</option>
                                    <option value="شقة">شقة</option>
                                    <option value="فيلا">فيلا</option>
                                    <option value="أرض">أرض</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="location" class="form-control" placeholder="المدينة أو الحي" required>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">ابحث الآن</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">التالي</span>
        </button>
    </div>
</section>

<!-- قسم العقارات المميزة -->
<section class="featured-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold"><i class="bi bi-star-fill me-2 text-warning"></i>عقارات مميزة</h2>
        <div class="row g-5">
            @forelse ($properties as $property)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden property-card" data-parallax>
                    <img src="{{ asset('storage/' . (json_decode($property->images, true)[0]['path'] ?? 'default.jpg')) }}" class="card-img-top property-img" alt="{{ $property->title }}">
                    <div class="card-body p-4">
                        <h3 class="card-title fw-semibold mb-3">{{ $property->title }}</h3>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i>{{ $property->city . ($property->neighborhood ? ', ' . $property->neighborhood : '') }}<br>
                            <i class="fas fa-bed me-1"></i>{{ $property->bedrooms }} غرف •
                            <i class="fas fa-bath me-1"></i>{{ $property->bathrooms }} حمام •
                            <i class="fas fa-ruler-combined me-1"></i>{{ $property->area ?? 'غير محدد' }} م²
                        </p>
                        <h4 class="text-primary mb-4">{{ number_format($property->price) }} جنيه</h4>
                        <div class="d-flex gap-2">
                            <a href="{{ route('property.show', $property->id) }}" class="btn btn-outline-primary flex-grow-1">عرض التفاصيل</a>
                            <a href="{{ url('contact') }}" class="btn btn-primary"><i class="fas fa-telephone"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted fs-4">لا توجد عقارات متاحة حاليًا. ابقَ على تواصل!</p>
            </div>
        @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('property.store') }}" class="btn btn-primary btn-lg">استكشف كل العقارات</a>
        </div>
    </div>
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
        <div class="row g-5">
            @forelse ($properties as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg rounded-4 overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top news-img" alt="{{ $post->title }}">
                        <div class="card-body p-4">
                            <span class="badge bg-primary mb-2">{{ $post->category }}</span>
                            <h4 class="card-title fw-semibold mb-3">{{ $post->title }}</h4>
                            <p class="text-muted mb-3">{{ $post->created_at->format('d M Y') }}</p>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                            {{-- <a href="{{ route('blog.show', $post->id) }}" class="btn btn-outline-primary">اقرأ المزيد</a> --}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted fs-4">لا توجد أخبار حاليًا. تابعنا للمزيد!</p>
                </div>
            @endforelse
        </div>
    </div>
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
<section class="partners-section py-5 bg-light">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold">شركاء النجاح</h2>
        <div class="row g-5 justify-content-center">
            @for ($i = 1; $i <= 6; $i++)
                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('images/partners/partner' . $i . '.png') }}" class="img-fluid partner-logo" alt="شريك {{ $i }}">
                </div>
            @endfor
        </div>
    </div>
</section>

<!-- قسم دعوة للعمل -->
<section class="cta-section py-5 position-relative" style="background: url('{{ asset('images/cta-bg.jpg') }}') center/cover no-repeat;">
    <div class="overlay"></div>
    <div class="container-fluid text-center position-relative">
        <h2 class="mb-4 fw-bold text-white display-4">انضم إلينا اليوم!</h2>
        <p class="lead mb-4 text-white">ابدأ رحلتك العقارية مع أفضل منصة في مصر</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('contact') }}" class="btn btn-primary btn-lg">تواصل معنا</a>
            <a href="{{ route('property.store') }}" class="btn btn-outline-light btn-lg">ابحث عن عقار</a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
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
@endsection