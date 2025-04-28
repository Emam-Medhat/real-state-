@extends('layouts.app')

@section('title', 'حجز زيارة العقار')

@section('content')

<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #e74c3c;
        --accent-color: #3498db;
        --light-bg: #f8f9fa;
        --dark-text: #2c3e50;
        --light-text: #7f8c8d;
        --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        --border-radius: 12px;
        --transition: all 0.3s ease;
    }

    .booking-section {
        padding: 3rem 0;
        background-color: var(--light-bg);
    }

    .booking-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .booking-header h1 {
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .booking-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
    }

    .property-info-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
    }

    .property-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: var(--border-radius);
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        border-radius: var(--border-radius);
        padding: 0.75rem 1rem;
        border: 1px solid #ddd;
        width: 100%;
        margin-bottom: 1rem;
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--accent-color), #2980b9);
        border: none;
        padding: 12px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
        transition: var(--transition);
        color: white;
        display: inline-block;
        text-align: center;
        width: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(52, 152, 219, 0.6);
    }

    .time-slot {
        display: inline-block;
        margin: 0.5rem;
    }

    .time-slot input[type="radio"] {
        display: none;
    }

    .time-slot label {
        display: block;
        padding: 0.75rem 1.5rem;
        background-color: #f8f9fa;
        border-radius: 50px;
        cursor: pointer;
        transition: var(--transition);
        border: 1px solid #ddd;
    }

    .time-slot input[type="radio"]:checked + label {
        background-color: var(--accent-color);
        color: white;
        border-color: var(--accent-color);
    }

    .available-date {
        display: inline-block;
        margin: 0.5rem;
    }

    .available-date input[type="radio"] {
        display: none;
    }

    .available-date label {
        display: block;
        padding: 0.75rem 1.5rem;
        background-color: #f8f9fa;
        border-radius: 50px;
        cursor: pointer;
        transition: var(--transition);
        border: 1px solid #ddd;
    }

    .available-date input[type="radio"]:checked + label {
        background-color: var(--accent-color);
        color: white;
        border-color: var(--accent-color);
    }

    @media (max-width: 768px) {
        .booking-header h1 {
            font-size: 1.8rem;
        }
    }
</style>

<section class="booking-section">
    <div class="container">
        <div class="booking-header">
            <h1>حجز زيارة العقار</h1>
            <p class="text-muted">حدد موعدًا لزيارة العقار وتفقد كل التفاصيل شخصيًا</p>
        </div>

        <div class="row">
            <!-- معلومات العقار -->
            <div class="col-lg-4">
                <div class="property-info-card">
                    <h3 class="mb-3">{{ $property->title }}</h3>

                    <img src="{{ asset('storage/' . json_decode($property->images)[0]->path) }}"
                         alt="{{ $property->title }}"
                         class="property-image mb-3">

                    <div class="detail-item">
                        <span class="detail-label">السعر:</span>
                        <span class="detail-value price-highlight">{{ number_format($property->price, 0) }} جنيه</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">المساحة:</span>
                        <span class="detail-value">{{ $property->area }} م²</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">الموقع:</span>
                        <span class="detail-value">{{ $property->neighborhood }}, {{ $property->city }}</span>
                    </div>

                    <hr>

                    <div class="detail-item">
                        <span class="detail-label">مالك العقار:</span>
                        <span class="detail-value">{{ $property->user->name }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">رقم الهاتف:</span>
                        <span class="detail-value">{{ $property->user->phone }}</span>
                    </div>
                </div>
            </div>

            <!-- نموذج الحجز -->
            <div class="col-lg-8">
                <div class="booking-card">
                    <form action="{{ route('property.booking.store', $property->id) }}" method="POST">
                        @csrf

                        <h3 class="mb-4">معلومات الزيارة</h3>

                        <!-- التاريخ -->
                        <div class="mb-4">
                            <label class="form-label">اختر تاريخ الزيارة:</label>
                            <div class="dates-container">
                                @foreach($availableDates as $date)
                                    <div class="available-date">
                                        <input type="radio" name="visit_date" id="date_{{ $loop->index }}" value="{{ $date }}" required>
                                        <label for="date_{{ $loop->index }}">{{ \Carbon\Carbon::parse($date)->translatedFormat('l j F Y') }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- الوقت -->
                        <div class="mb-4">
                            <label class="form-label">اختر وقت الزيارة:</label>
                            <div class="times-container">
                                @foreach($timeSlots as $slot)
                                    <div class="time-slot">
                                        <input type="radio" name="visit_time" id="time_{{ $loop->index }}" value="{{ $slot }}" required>
                                        <label for="time_{{ $loop->index }}">{{ $slot }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- معلومات الزائر -->
                        <div class="mb-4">
                            <label for="name" class="form-label">الاسم بالكامل</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                   value="{{ Auth::check() ? Auth::user()->phone : '' }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="form-label">ملاحظات إضافية (اختياري)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn-primary">
                            <i class="fas fa-calendar-check"></i> تأكيد الحجز
                        </button>
                    </form>
                </div>

                <!-- شروط الحجز -->
                <div class="booking-card">
                    <h3 class="mb-3">شروط الحجز</h3>
                    <ul class="text-muted">
                        <li>يجب الحضور قبل الموعد بـ 10 دقائق على الأقل</li>
                        <li>في حالة التأخير أكثر من 15 دقيقة، يتم إلغاء الحجز تلقائيًا</li>
                        <li>يمكنك إلغاء الحجز قبل الموعد بـ 24 ساعة على الأقل</li>
                        <li>يرجى إحضار بطاقة الهوية عند الزيارة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection