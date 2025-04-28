@extends('layouts.app')

@section('title', 'فريق العمل')

@section('content')
<style>
    /* دعم النصوص العربية */
body {
    font-family: 'Cairo', sans-serif;
    direction: rtl;
    background-color: #f1f3f5;
}

/* تنسيق صفحة الفريق */
.team {
    padding-top: 3rem;
    padding-bottom: 5rem;
}

/* تنسيق الحاوية */
.container-fluid {
    max-width: 1600px; /* حاوية كبيرة جدًا */
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

/* تنسيق بطاقات الفريق */
.team-card {
    border: none;
    border-radius: 1rem;
    background-color: #fff;
    transition: transform 0.3s, box-shadow 0.3s;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.team-img {
    height: 300px;
    object-fit: contain;
    border-radius: 1rem 1rem 0 0;
}

/* تنسيق بطاقات الليدر */
.leader-card {
    background: linear-gradient(180deg, #f8f9fa, #ffffff);
}

.leader-img {
    height: 350px;
    object-fit: contain;
    border-radius: 1rem 1rem 0 0;
}

/* تنسيق بطاقات القيم والشهادات */
.card {
    border: none;
    border-radius: 1rem;
    background-color: #fff;
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

/* تنسيق روابط التواصل الاجتماعي */
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

/* تنسيق القيم */
.card .bi {
    color: #007bff;
}

/* تنسيق الشهادات */
.card-text {
    font-size: 1rem;
    color: #495057;
}

.bi-quote {
    color: #007bff;
}

/* استجابية */
@media (max-width: 992px) {
    h1.display-4 {
        font-size: 2.5rem;
    }

    .team-img,
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
    .leader-img {
        height: 200px;
    }
}
</style>
<section class="team py-5">
    <div class="container-fluid">
        <!-- العنوان الرئيسي -->
        <h1 class="text-center mb-4 display-4 fw-bold">تعرف على فريقنا</h1>
        <p class="text-center lead mb-5">فريقنا من المحترفين في مجال العقارات جاهز لمساعدتك في تحقيق أحلامك</p>

        <!-- الليدر ومساعد الليدر -->
        <div class="row g-5 mb-5">
            <!-- الليدر -->
            <div class="col-lg-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card leader-card">
                    <img src="{{ asset('images/WhatsApp Image 2025-04-14 at 21.24.53_1a76a768.jpg') }}" class="card-img-top leader-img" alt="إمام مدحت">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">إمام مدحت</h4>
                        <h6 class="text-muted mb-3"> مطور برمجيات متكامل</h6>
                        <p class="card-text">إمام مطور ويب مبدع بخبرة واسعة في بناء منصات رقمية متطورة، يجمع بين الإبداع التقني والحلول العملية لتقديم تجارب مستخدم مميزة.</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- مساعد الليدر -->
            <div class="col-lg-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card leader-card">
                    <img src="{{ asset('images/ايهاب.jpg') }}" class="card-img-top leader-img" alt="إيهاب">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">إيهاب</h4>
                        <h6 class="text-muted mb-3"> قائد الفريق</h6>
                        <p class="card-text">متخصص في تحليل احتياجات الأعمال وتصميم نظم تقنية تلبي متطلبات المستخدمين</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- المجموعة الأولى (4 أشخاص) -->
        <div class="row g-5 mb-5">
            <!-- عضو 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/moaz2.jpg') }}" class="card-img-top team-img" alt="معاذ">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">معاذ</h4>
                        <h6 class="text-muted mb-3">مطور واجهات</h6>
                        <p class="card-text">معاذ متخصص في تطوير واجهات مستخدم سلسة وجذابة، يركز على تحسين تجربة العملاء.</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- عضو 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/mostafa.jpg') }}" class="card-img-top team-img" alt="مصطفى">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">مصطفى</h4>
                        <h6 class="text-muted mb-3">مطور واجهات</h6>
                        <p class="card-text">مصطفى يصمم واجهات تفاعلية بأحدث التقنيات لضمان تجربة مستخدم متميزة.</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- عضو 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/download (3).jpeg') }}" class="card-img-top team-img" alt="ياسر">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">ابراهيم</h4>
                        <h6 class="text-muted mb-3">مصمم واجهات</h6>
                        <p class="card-text">مصمم UI/UX يركز على إنشاء واجهات استخدام جذابة وسهلة، وتحسين تجربة المستخدم</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- عضو 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/download (3).jpeg') }}" class="card-img-top team-img" alt="نور">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">السيد</h4>
                        <h6 class="text-muted mb-3">تحليل وتصميم</h6>
                        <p class="card-text">متخصص في تحليل احتياجات الأعمال وتصميم نظم تقنية تلبي متطلبات المستخدمين</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- المجموعة الثانية (4 أشخاص) -->
        <div class="row g-5 mb-5">
            <!-- عضو 5 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/download (3).jpeg') }}" class="card-img-top team-img" alt="خالد">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">رنا</h4>
                        <h6 class="text-muted mb-3">مطور خلفي</h6>
                        <p class="card-text">مطور خلفية متخصص في بناء قواعد البيانات، تطوير واجهات برمجية</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- عضو 6 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/download (3).jpeg') }}" class="card-img-top team-img" alt="ريم">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">هنا</h4>
                        <h6 class="text-muted mb-3">مطور امامي</h6>
                        <p class="card-text">مطور واجهات أمامية متخصص في تصميم وتطوير مواقع عصرية ومتجاوبة</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- عضو 7 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/download (3).jpeg') }}" class="card-img-top team-img" alt="عمر">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">هانم</h4>
                        <h6 class="text-muted mb-3">مصمم واجهات</h6>
                        <p class="card-text">مصمم UI/UX يركز على إنشاء واجهات استخدام جذابة وسهلة، وتحسين تجربة المستخدم</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- عضو 8 -->
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-4 overflow-hidden team-card">
                    <img src="{{ asset('images/download (3).jpeg') }}" class="card-img-top team-img" alt="ليلى">
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-semibold mb-2">ايه</h4>
                        <h6 class="text-muted mb-3">تحليل وتصميم</h6>
                        <p class="card-text">متخصص في تحليل احتياجات الأعمال وتصميم نظم تقنية تلبي متطلبات المستخدمين</p>
                        <div class="social-links d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قيم الشركة -->
        <div class="row g-5 mb-5">
            <div class="col-12">
                <div class="card shadow-lg p-5 rounded-4">
                    <h3 class="text-center fw-semibold mb-4">قيمنا</h3>
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
                            <h5 class="fw-medium">الثقة</h5>
                            <p>نبني علاقات قائمة على الشفافية والمصداقية مع عملائنا.</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="bi bi-star-fill fs-1 text-primary mb-3"></i>
                            <h5 class="fw-medium">التميز</h5>
                            <p>نسعى دائمًا لتقديم خدمات استثنائية تفوق التوقعات.</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="bi bi-people-fill fs-1 text-primary mb-3"></i>
                            <h5 class="fw-medium">التعاون</h5>
                            <p>فريقنا يعمل معًا لتحقيق أهداف عملائنا بكفاءة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- شهادات العملاء -->
        <div class="row g-5">
            <div class="col-12">
                <div class="card shadow-lg p-5 rounded-4">
                    <h3 class="text-center fw-semibold mb-4">ماذا يقول عملاؤنا</h3>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card border-0 h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-quote fs-2 text-primary mb-3"></i>
                                    <p class="card-text">"فريق رائع! ساعدوني في إيجاد شقة أحلامي في وقت قياسي."</p>
                                    <h6 class="fw-medium mt-3">امام مدحت</h6>
                                    <p class="text-muted">عميل</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-quote fs-2 text-primary mb-3"></i>
                                    <p class="card-text">"الاستشارات التقنية من إمام كانت دقيقة ومفيدة جدًا."</p>
                                    <h6 class="fw-medium mt-3"> ابهاب طه</h6>
                                    <p class="text-muted">مستثمرة</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-quote fs-2 text-primary mb-3"></i>
                                    <p class="card-text">"تجربة مميزة مع الفريق، كانوا متفهمين لاحتياجاتي."</p>
                                    <h6 class="fw-medium mt-3"> السيد محمود</h6>
                                    <p class="text-muted">عميل</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection