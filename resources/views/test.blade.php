@extends('layouts.app')

@section('title', '{{ $property->title }} - بيتك')

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
        padding-top: 4rem;
        padding-bottom: 4rem;
    }

    /* تنسيق الحاوية */
    .container-fluid {
        max-width: 1400px;
        padding: 0 15px;
    }

    /* تنسيق العناوين */
    h2 {
        font-size: 2.5rem;
        color: #1a252f;
    }

    h3 {
        font-size: 1.8rem;
        color: #1a252f;
    }

    /* تنسيق البطاقات */
    .card {
        border: none;
        border-radius: 1rem;
        background-color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* تنسيق صورة العقار */
    .property-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 1rem;
    }

    /* تنسيق الأزرار */
    .btn-primary {
        background: linear-gradient(90deg, #007bff, #00aaff);
        border: none;
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        transition: background 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #0056b3, #007bff);
        transform: translateY(-2px);
    }

    .btn-reserve {
        background: linear-gradient(90deg, #28a745, #20c997);
        border: none;
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        transition: background 0.3s, transform 0.3s;
    }

    .btn-reserve:hover {
        background: linear-gradient(90deg, #218838, #28a745);
        transform: translateY(-2px);
    }

    /* استجابية */
    @media (max-width: 992px) {
        h2 {
            font-size: 2rem;
        }
        .property-image {
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .container-fluid {
            padding: 0 10px;
        }
        h2 {
            font-size: 1.8rem;
        }
        .property-image {
            height: 250px;
        }
    }

    @media (max-width: 576px) {
        h3 {
            font-size: 1.3rem;
        }
        .property-image {
            height: 200px;
        }
        .btn-primary, .btn-reserve {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
    }
</style>

<section class="property-details py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold">{{ $property->title }}</h2>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card shadow-lg rounded-3">
                    <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="property-image">
                    <div class="card-body p-4">
                        <h3 class="fw-semibold mb-3">{{ number_format($property->price) }} جنيه</h3>
                        <p class="text-muted mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $property->city }}</p>
                        <p class="mb-4">{{ $property->description }}</p>
                        <div class="d-flex gap-3">
                            <a href="{{ url('properties') }}" class="btn btn-primary">رجوع للعقارات</a>
                            <a href="{{ route('property.reserve', $property->id) }}" class="btn btn-reserve">حجز العقار</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-lg rounded-3 p-4">
                    <h3 class="fw-semibold mb-4">تفاصيل إضافية</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3"><strong>النوع:</strong> {{ $property->type == 'sale' ? 'بيع' : 'إيجار' }}</li>
                        <li class="mb-3"><strong>المساحة:</strong> {{ $property->area ?? 'غير محدد' }} م²</li>
                        <li class="mb-3"><strong>تاريخ الإضافة:</strong> {{ $property->created_at->format('d M Y') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection