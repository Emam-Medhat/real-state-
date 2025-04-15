@extends('layouts.app')

@section('title', 'شركات التشطيب - بيتك')

@section('content')
<!-- قسم الهيرو -->
<section class="hero position-relative">
    <div class="hero-bg" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/companies-hero.jpg') }}') center/cover no-repeat;">
        <div class="container-fluid text-center">
            <h1 class="display-2 fw-bold animate__animated animate__fadeInDown">شركاء التشطيب الموثوقون</h1>
            <p class="lead text-white mb-5 animate__animated animate__fadeInUp">تعاون مع أفضل شركات التشطيب لتحويل منزلك إلى تحفة فنية</p>
            <a href="#companies" class="btn btn-primary btn-lg">استكشف شركاءنا</a>
        </div>
    </div>
</section>

<!-- قسم الفلاتر -->
<section class="filters-section py-5 bg-light">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold"><i class="bi bi-funnel-fill me-2 text-primary"></i>ابحث عن الشركة المثالية</h2>
        <form action="{{ route('company.index') }}" method="GET" class="card shadow-lg p-4 rounded-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <select name="service" class="form-select" onchange="this.form.submit()">
                        <option value="">جميع الخدمات</option>
                        <option value="تشطيب داخلي" {{ request('service') == 'تشطيب داخلي' ? 'selected' : '' }}>تشطيب داخلي</option>
                        <option value="تشطيب خارجي" {{ request('service') == 'تشطيب خارجي' ? 'selected' : '' }}>تشطيب خارجي</option>
                        <option value="تصميم ديكور" {{ request('service') == 'تصميم ديكور' ? 'selected' : '' }}>تصميم ديكور</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="location" class="form-select" onchange="this.form.submit()">
                        <option value="">جميع المدن</option>
                        <option value="القاهرة" {{ request('location') == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
                        <option value="الجيزة" {{ request('location') == 'الجيزة' ? 'selected' : '' }}>الجيزة</option>
                        <option value="الإسكندرية" {{ request('location') == 'الإسكندرية' ? 'selected' : '' }}>الإسكندرية</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="rating" class="form-select" onchange="this.form.submit()">
                        <option value="">التقييم</option>
                        <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4 نجوم وأعلى</option>
                        <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3 نجوم وأعلى</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="ابحث باسم الشركة..." value="{{ request('search') }}">
                </div>
            </div>
        </form>
    </div>
</section>

<!-- قسم الشركات -->
<section class="companies-section py-5" id="companies">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold"><i class="bi bi-building-fill me-2 text-primary"></i>شركات التشطيب المميزة</h2>
        <div class="row g-5">
            @forelse ($companies as $company)
                <div class="col-lg-4 col-md-6 animate__animated animate__fadeInUp">
                    <div class="card shadow-lg rounded-4 overflow-hidden company-card">
                        <img src="{{ asset('storage/' . $company->logo) }}" class="company-logo" alt="{{ $company->name }}">
                        <div class="card-body p-4">
                            <h3 class="card-title fw-semibold mb-3">{{ $company->name }}</h3>
                            <p class="text-muted mb-3"><i class="bi bi-geo-alt me-1"></i>{{ $company->location }}</p>
                            <p class="mb-3">{{ Str::limit($company->services, 100) }}</p>
                            <div class="rating mb-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star-fill {{ $i <= $company->rating ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                                <span class="ms-2">({{ $company->reviews_count }} تقييم)</span>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ $company->contact_link }}" class="btn btn-primary flex-grow-1" target="_blank">تواصل الآن</a>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-outline-primary"><i class="bi bi-info-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted fs-4">لا توجد شركات متاحة حاليًا. حاول تعديل الفلاتر!</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            {{ $companies->links() }}
        </div>
    </div>
</section>

<!-- قسم لماذا شركاؤنا -->
<section class="why-partners-section py-5 bg-light">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold">لماذا تثق بشركائنا؟</h2>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg p-4 rounded-4 text-center">
                    <i class="bi bi-check-circle-fill fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-3">جودة مضمونة</h4>
                    <p>شركاؤنا يستخدمون أفضل المواد ويتبعون معايير عالمية.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg p-4 rounded-4 text-center">
                    <i class="bi bi-clock-fill fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-3">تسليم في الوقت</h4>
                    <p>التزام بالجداول الزمنية لإنجاز مشروعك بسرعة وكفاءة.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg p-4 rounded-4 text-center">
                    <i class="bi bi-person-heart fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-3">خدمة عملاء ممتازة</h4>
                    <p>دعم مستمر لضمان رضاك التام عن النتائج.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- قسم شهادات العملاء -->
<section class="testimonials-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold"><i class="bi bi-quote me-2 text-primary"></i>ماذا يقول عملاؤنا؟</h2>
        <div class="row g-5">
            @for ($i = 1; $i <= 3; $i++)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg p-4 rounded-4 text-center">
                        <img src="{{ asset('images/testimonials/client' . $i . '.jpg') }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;" alt="عميل">
                        <p class="mb-3">"خدمة رائعة وتشطيب بجودة عالية، أنصح بشدة!"</p>
                        <h5 class="fw-semibold">عميل {{ $i }}</h5>
                        <p class="text-muted small">تشطيب شقة فاخرة</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<!-- قسم الخريطة -->
<section class="map-section py-5 bg-light">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>مواقع شركائنا</h2>
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

<!-- قسم دعوة للعمل -->
<section class="cta-section py-5 position-relative" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('images/cta-companies.jpg') }}') center/cover no-repeat;">
    <div class="container-fluid text-center">
        <h2 class="mb-4 fw-bold text-white display-4">جاهز لتحويل منزلك؟</h2>
        <p class="lead mb-4 text-white">اختر شريك التشطيب المثالي اليوم وابدأ مشروعك!</p>
        <a href="{{ url('contact') }}" class="btn btn-primary btn-lg">تواصل معنا الآن</a>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Animation trigger on scroll
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.company-card').forEach(card => observer.observe(card));
});
</script>
@endsection