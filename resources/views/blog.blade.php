@extends('layouts.app')

@section('title', 'مدونة العقارات')

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
    padding-top: 3rem;
    padding-bottom: 5rem;
}

/* تنسيق الحاوية */
.container-fluid {
    max-width: 1600px;
}

/* تنسيق العناوين */
h1.display-4 {
    font-size: 3.5rem;
    color: #1a252f;
}

h3 {
    font-size: 1.75rem;
    color: #1a252f;
}

/* تنسيق البطاقات */
.card {
    border: none;
    border-radius: 1rem;
    background-color: #fff;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

/* تنسيق بطاقات الفريق */
.team-card {
    overflow: hidden;
}

.team-img {
    height: 300px;
    object-fit: cover;
    border-radius: 1rem 1rem 0 0;
}

/* تنسيق بطاقات الليدر */
.leader-card {
    background: linear-gradient(180deg, #f8f9fa, #ffffff);
}

.leader-img {
    height: 350px;
    object-fit: cover;
    border-radius: 1rem 1rem 0 0;
}

/* تنسيق بطاقات العقارات */
.property-card {
    overflow: hidden;
}

.property-img {
    height: 250px;
    object-fit: cover;
    border-radius: 1rem 1rem 0 0;
}

/* تنسيق بطاقات المدونة */
.blog-card {
    overflow: hidden;
}

.blog-img {
    height: 400px;
    object-fit: cover;
}

/* تنسيق الفلاتر */
.form-control,
.form-select {
    border-radius: 0.5rem;
    padding: 0.75rem;
    font-size: 1rem;
}

/* تنسيق الأزرار */
.btn-primary {
    background: linear-gradient(90deg, #007bff, #00aaff);
    border: none;
    padding: 0.75rem 1.5rem;
    font-size: 1.1rem;
    border-radius: 0.5rem;
    transition: background 0.3s, transform 0.2s;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #0056b3, #007bff);
    transform: translateY(-2px);
}

.btn-outline-primary {
    border-radius: 0.5rem;
    transition: background-color 0.3s, transform 0.2s;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
    transform: translateY(-2px);
}

/* تنسيق التواصل الاجتماعي */
.social-links .btn {
    width: 45px;
    height: 45px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    transition: background-color 0.3s, transform 0.2s;
}

.social-links .btn:hover {
    background-color: #007bff;
    color: #fff;
    transform: scale(1.1);
}

/* تنسيق القيم والإنجازات */
.card .bi {
    color: #007bff;
}

/* تنسيق الخريطة */
iframe {
    border-radius: 0 0 1rem 1rem;
}

/* تنسيق معرض الصور */
.carousel-inner img {
    height: 500px;
    object-fit: cover;
    border-radius: 1rem 1rem 0 0;
}

/* تنسيق المدونة */
.badge {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
}

.list-unstyled a {
    transition: color 0.2s;
}

.list-unstyled a:hover {
    color: #0056b3;
}

/* استجابية */
@media (max-width: 992px) {
    h1.display-4 {
        font-size: 2.5rem;
    }

    .team-img,
    .property-img,
    .blog-img,
    .carousel-inner img {
        height: 300px;
    }

    .leader-img {
        height: 250px;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding: 0 1rem;
    }

    .card {
        padding: 1.5rem !important;
    }

    h3 {
        font-size: 1.5rem;
    }

    .team-img,
    .property-img,
    .blog-img,
    .carousel-inner img {
        height: 200px;
    }

    .leader-img {
        height: 200px;
    }
}
</style>
<section class="blog py-5">
    <div class="container-fluid">
        <!-- العنوان الرئيسي -->
        <h1 class="text-center mb-4 display-4 fw-bold">مدونة العقارات</h1>
        <p class="text-center lead mb-5">اطلع على أحدث النصائح، الأخبار، والاتجاهات في سوق العقارات</p>

        <div class="row g-5">
            <!-- الأخبار الرئيسية -->
            <div class="col-lg-8">
                <!-- الفلاتر -->
                <div class="card shadow-lg p-4 mb-5 rounded-4">
                    <h3 class="fw-semibold mb-4">تصفية المقالات</h3>
                    <form action="" method="GET">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <select name="category" class="form-select">
                                    <option value="">جميع الفئات</option>
                                    <option value="نصائح">نصائح</option>
                                    <option value="أخبار">أخبار</option>
                                    <option value="استثمار">استثمار</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="ابحث عن مقال...">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">بحث</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- قائمة المقالات -->
                <div class="row g-5">
                    @forelse ($posts as $post)
                        <div class="col-12">
                            <div class="card shadow-lg rounded-4 overflow-hidden blog-card">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('images/blog/' . $post->image) }}" class="img-fluid blog-img" alt="{{ $post->title }}">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body p-4">
                                            <span class="badge bg-primary mb-2">{{ $post->category }}</span>
                                            <h4 class="card-title fw-semibold mb-3">{{ $post->title }}</h4>
                                            <p class="text-muted mb-3"><i class="bi bi-calendar me-2"></i>{{ $post->created_at->format('d M Y') }}</p>
                                            <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-outline-primary">اقرأ المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">لا توجد مقالات متاحة حاليًا.</p>
                        </div>
                    @endforelse
                </div>

                <!-- التصفح -->
                <div class="mt-5">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- الشريط الجانبي -->
            <div class="col-lg-4">
                <!-- المقالات الشائعة -->
                <div class="card shadow-lg p-4 mb-5 rounded-4">
                    <h3 class="fw-semibold mb-4">المقالات الشائعة</h3>
                    <ul class="list-unstyled">
                        @for ($i = 1; $i <= 3; $i++)
                            <li class="mb-3">
                                <a href="#" class="d-flex text-decoration-none">
                                    <img src="{{ asset('images/blog/popular' . $i . '.jpg') }}" class="me-3 rounded" style="width: 80px; height: 80px; object-fit: cover;" alt="مقال شائع">
                                    <div>
                                        <h6 class="fw-medium mb-1">عنوان مقال شائع {{ $i }}</h6>
                                        <p class="text-muted small mb-0"><i class="bi bi-eye me-1"></i> {{ rand(100, 1000) }} مشاهدة</p>
                                    </div>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>

                <!-- الفئات -->
                <div class="card shadow-lg p-4 mb-5 rounded-4">
                    <h3 class="fw-semibold mb-4">الفئات</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-primary">نصائح <span class="badge bg-light text-dark ms-2">10</span></a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-primary">أخبار <span class="badge bg-light text-dark ms-2">8</span></a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-primary">استثمار <span class="badge bg-light text-dark ms-2">5</span></a></li>
                    </ul>
                </div>

                <!-- النشرة الإخبارية -->
                <div class="card shadow-lg p-4 rounded-4">
                    <h3 class="fw-semibold mb-4">اشترك في النشرة الإخبارية</h3>
                    <form action="#">
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="بريدك الإلكتروني">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">اشترك الآن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection