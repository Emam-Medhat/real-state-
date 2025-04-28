@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')
<style>
    /* دعم النصوص العربية */
body {
    font-family: 'Cairo', sans-serif;
    direction: rtl;
    background-color: #f1f3f5;
}

/* تنسيق صفحة التواصل */
.contact-us {
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

/* تنسيق البطاقات */
.card {
    border: none;
    border-radius: 1rem;
    background-color: #fff;
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

/* تنسيق النموذج */
.form-control,
.form-select {
    border-radius: 0.5rem;
    padding: 0.875rem;
    font-size: 1.1rem;
    border: 1px solid #ced4da;
}

.form-control:focus,
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
}

.input-group-text {
    background-color: #f8f9fa;
    border-radius: 0.5rem 0 0 0.5rem;
}

/* تنسيق زر الإرسال */
.btn-primary {
    background: linear-gradient(90deg, #007bff, #00aaff);
    border: none;
    padding: 0.875rem 2.5rem;
    font-size: 1.2rem;
    font-weight: 600;
    border-radius: 0.5rem;
    transition: background 0.3s, transform 0.2s;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #0056b3, #007bff);
    transform: translateY(-3px);
}

/* تنسيق معلومات التواصل */
.contact-info {
    font-size: 1.15rem;
    color: #343a40;
}

.contact-info i {
    color: #007bff;
}

.contact-info a {
    color: #007bff;
    text-decoration: none;
}

.contact-info a:hover {
    text-decoration: underline;
}

/* تنسيق التواصل الاجتماعي */
.social-links .btn {
    width: 50px;
    height: 50px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: background-color 0.3s, transform 0.2s;
}

.social-links .btn:hover {
    background-color: #007bff;
    color: #fff;
    transform: scale(1.1);
}

/* تنسيق الخريطة */
iframe {
    border-radius: 0 0 1rem 1rem;
}

/* تنسيق الأسئلة الشائعة */
.accordion-button {
    background-color: #f8f9fa;
    border-radius: 0.5rem !important;
    padding: 1.25rem;
}

.accordion-button:not(.collapsed) {
    background: linear-gradient(90deg, #007bff, #00aaff);
    color: #fff;
}

.accordion-body {
    font-size: 1rem;
    color: #495057;
}

/* تنسيق فريق الدعم */
img.rounded-circle {
    object-fit: cover;
    border: 3px solid #007bff;
}

/* استجابية */
@media (max-width: 992px) {
    h1.display-4 {
        font-size: 2.5rem;
    }

    .btn-primary {
        width: 100%;
        padding: 0.75rem;
    }

    iframe {
        height: 400px;
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

}
</style>
<section class="contact-us py-5">
    <div class="container-fluid">
        <!-- العنوان الرئيسي -->
        <h1 class="text-center mb-5 display-4 fw-bold">تواصل مع فريق العقارات</h1>
        <p class="text-center lead mb-5">نحن هنا للإجابة على استفساراتك ومساعدتك في العثور على العقار المثالي</p>
        @if (session('success'))
        <div class="alert alert-success text-center" style="color: red; font-size: x-large;font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif
        <div class="row g-5">
            <!-- نموذج الاتصال -->
            <div class="col-xl-6 col-lg-7 mb-5">
                <div class="card shadow-lg p-5 rounded-4">
                    <h3 class="mb-4 fw-semibold">أرسل استفسارك</h3>
                    <form action="{{url('contact/insert')}}" method="POST">
                        @csrf
                        @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                        <!-- الاسم -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-medium">الاسم الكامل <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="أدخل اسمك الكامل"
                                    value="{{ old('name') }}"
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">البريد الإلكتروني <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="أدخل بريدك الإلكتروني"
                                    value="{{ old('email') }}"
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- رقم الهاتف -->
                        <div class="mb-4">
                            <label for="phone" class="form-label fw-medium">رقم الهاتف</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input
                                    type="tel"
                                    name="phone"
                                    id="phone"
                                    class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    placeholder="أدخل رقم هاتفك"
                                    value="{{ old('phone') }}"
                                >
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- نوع الاستفسار -->
                        <div class="mb-4">
                            <label for="inquiry_type" class="form-label fw-medium">نوع الاستفسار <span class="text-danger">*</span></label>
                            <select
                                name="inquiry_type"
                                id="inquiry_type"
                                class="form-select {{ $errors->has('inquiry_type') ? 'is-invalid' : '' }}"
                                required
                            >
                                <option value="" disabled selected>اختر نوع الاستفسار</option>
                                <option value="شراء" {{ old('inquiry_type') == 'شراء' ? 'selected' : '' }}>شراء عقار</option>
                                <option value="إيجار" {{ old('inquiry_type') == 'إيجار' ? 'selected' : '' }}>إيجار عقار</option>
                                <option value="استثمار" {{ old('inquiry_type') == 'استثمار' ? 'selected' : '' }}>استثمار عقاري</option>
                                <option value="أخرى" {{ old('inquiry_type') == 'أخرى' ? 'selected' : '' }}>أخرى</option>
                            </select>
                            @error('inquiry_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- الرسالة -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-medium">رسالتك <span class="text-danger">*</span></label>
                            <textarea
                                name="message"
                                id="message"
                                class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                                placeholder="اكتب تفاصيل استفسارك هنا"
                                rows="8"
                                required
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- زر الإرسال -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 py-3">إرسال الاستفسار</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- معلومات التواصل -->
            <div class="col-xl-6 col-lg-5 mb-5">
                <div class="card shadow-lg p-5 rounded-4">
                    <h3 class="mb-4 fw-semibold">معلومات التواصل</h3>
                    <ul class="list-unstyled contact-info mb-4">
                        <li class="mb-4 d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong>العنوان:</strong><br>
                                القاهرة الجديدة، التجمع الخامس، شارع التسعين، مصر
                            </div>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                            <i class="bi bi-telephone-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong>الهاتف:</strong><br>
                                <a href="tel:+201234567890" class="text-decoration-none">+20 123 456 7890</a>
                            </div>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                            <i class="bi bi-envelope-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong>البريد الإلكتروني:</strong><br>
                                <a href="mailto:info@realestate.com" class="text-decoration-none">info@realestate.com</a>
                            </div>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                            <i class="bi bi-clock-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong>ساعات العمل:</strong><br>
                                الأحد - الخميس، 9:00 ص - 5:00 م
                            </div>
                        </li>
                    </ul>

                    <!-- روابط التواصل الاجتماعي -->
                    <h4 class="mb-3 fw-semibold">تابعنا على</h4>
                    <div class="social-links d-flex gap-3">
                        <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin fs-5"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- الخريطة -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-lg rounded-4 overflow-hidden">
                    <h3 class="card-header py-3 fw-semibold">زورونا في موقعنا</h3>
                    <div class="card-body p-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.123456789!2d31.416123456789!3d30.023456789123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDAxJzI0LjQiTiAzMcKwMjUnMDQuNSJF!5e0!3m2!1sar!2seg!4v1634567891234!5m2!1sar!2seg"
                            width="100%"
                            height="600"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- الأسئلة الشائعة -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-lg p-5 rounded-4">
                    <h3 class="mb-4 fw-semibold">الأسئلة الشائعة</h3>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    كيف يمكنني العثور على عقار مناسب؟
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    يمكنك استخدام محرك البحث في موقعنا لتصفية العقارات حسب الموقع، السعر، ونوع العقار. تواصلوا مع فريقنا للحصول على استشارة مجانية!
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    ما هي الوثائق المطلوبة لشراء عقار؟
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    عادةً، تحتاج إلى بطاقة الهوية، إثبات الدخل، واتفاقية الشراء. يمكن لفريقنا مساعدتك في إعداد كل الوثائق.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    هل تقدمون خدمات استثمار عقاري؟
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    نعم، نقدم منصة استثمار عقاري متكاملة تشمل تحليل السوق وإدارة المحافظ. تواصلوا معنا لمعرفة المزيد!
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