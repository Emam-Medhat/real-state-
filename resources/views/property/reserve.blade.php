@extends('layouts.app')

@section('title', 'حجز العقار - بيتك')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
        max-width: 1400px;
        padding: 0 20px;
    }

    /* تنسيق العناوين */
    h2 {
        font-size: 3rem;
        color: #1a252f;
        font-weight: 700;
    }

    h3 {
        font-size: 2.2rem;
        color: #1a252f;
    }

    /* تنسيق البطاقات */
    .card {
        border: none;
        border-radius: 1.5rem;
        background-color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* تنسيق نموذج الدفع */
    .form-control {
        border-radius: 0.75rem;
        padding: 0.8rem;
        font-size: 1.2rem;
        border: 1px solid #ced4da;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    .form-label {
        font-size: 1.1rem;
        color: #1a252f;
        font-weight: 600;
    }

    /* تنسيق الأزرار */
    .btn-primary {
        background: linear-gradient(90deg, #007bff, #00aaff);
        border: none;
        padding: 0.8rem 2rem;
        font-size: 1.3rem;
        border-radius: 0.75rem;
        transition: background 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #0056b3, #007bff);
        transform: translateY(-3px);
    }

    /* تنسيق المودال */
    .modal-content {
        border-radius: 1.5rem;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        border: none;
        background: linear-gradient(90deg, #28a745, #20c997);
        color: #fff;
        border-radius: 1.5rem 1.5rem 0 0;
    }

    .modal-title {
        font-size: 1.8rem;
        font-weight: 700;
    }

    .modal-body {
        font-size: 1.4rem;
        color: #1a252f;
        text-align: center;
        padding: 2rem;
    }

    .modal-body .bi-check-circle-fill {
        font-size: 3rem;
        color: #28a745;
        margin-bottom: 1rem;
    }

    .modal-footer {
        border: none;
        justify-content: center;
    }

    .btn-close {
        filter: invert(1);
    }

    /* استجابية */
    @media (max-width: 1200px) {
        h2 {
            font-size: 2.5rem;
        }
        h3 {
            font-size: 2rem;
        }
        .form-control {
            font-size: 1.1rem;
        }
        .btn-primary {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 992px) {
        h2 {
            font-size: 2.2rem;
        }
        h3 {
            font-size: 1.8rem;
        }
        .form-control {
            font-size: 1rem;
            padding: 0.7rem;
        }
        .btn-primary {
            font-size: 1.1rem;
            padding: 0.7rem 1.5rem;
        }
        .modal-title {
            font-size: 1.6rem;
        }
        .modal-body {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 768px) {
        .container-fluid {
            padding: 0 15px;
        }
        h2 {
            font-size: 2rem;
        }
        h3 {
            font-size: 1.6rem;
        }
        .form-control {
            font-size: 0.95rem;
            padding: 0.6rem;
        }
        .btn-primary {
            font-size: 1rem;
            padding: 0.6rem 1.2rem;
        }
        .modal-title {
            font-size: 1.4rem;
        }
        .modal-body {
            font-size: 1.1rem;
            padding: 1.5rem;
        }
        .modal-body .bi-check-circle-fill {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 576px) {
        h2 {
            font-size: 1.8rem;
        }
        h3 {
            font-size: 1.4rem;
        }
        .form-control, .form-label {
            font-size: 0.9rem;
            padding: 0.5rem;
        }
        .btn-primary {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
        .modal-title {
            font-size: 1.2rem;
        }
        .modal-body {
            font-size: 1rem;
            padding: 1rem;
        }
        .modal-body .bi-check-circle-fill {
            font-size: 2rem;
        }
    }
</style>

<section class="reserve-section py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 fw-bold" data-aos="fade-up">حجز العقار: {{ $property->title }}</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg rounded-3 p-5" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="fw-semibold mb-4">بيانات الدفع</h3>
                    <form id="payment-form" method="POST" action="{{ route('property.reserve', $property->id) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="card_number" class="form-label">رقم البطاقة</label>
                            <input type="text" class="form-control" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" required>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="expiry_date" class="form-label">تاريخ الانتهاء</label>
                                <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label">رمز CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">تأكيد الحجز</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- مودال رسالة التأكيد -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">نجاح الحجز</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <i class="bi bi-check-circle-fill d-block mb-3"></i>
                تم الحجز بنجاح
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary">عرض الحجوزات</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    AOS.init();
    
    // عرض المودال عند نجاح الحجز
    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    @endif
    
    // التحقق من صحة بيانات البطاقة قبل الإرسال
    document.getElementById('payment-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // هنا يمكنك إضافة التحقق من صحة بيانات البطاقة
        const cardNumber = document.getElementById('card_number').value;
        const expiryDate = document.getElementById('expiry_date').value;
        const cvv = document.getElementById('cvv').value;
        
        if (!isValidCardNumber(cardNumber)) {
            alert('رقم البطاقة غير صحيح');
            return;
        }
        
        if (!isValidExpiryDate(expiryDate)) {
            alert('تاريخ الانتهاء غير صحيح');
            return;
        }
        
        if (!isValidCVV(cvv)) {
            alert('رمز CVV غير صحيح');
            return;
        }
        
        // إذا كانت البيانات صحيحة، أرسل النموذج
        this.submit();
    });
    
    function isValidCardNumber(number) {
        // إزالة المسافات والأحرف غير الرقمية
        const cleaned = number.replace(/\D/g, '');
        // التحقق من أن الرقم يحتوي على 16 رقمًا
        return /^\d{16}$/.test(cleaned);
    }
    
    function isValidExpiryDate(date) {
        // التحقق من الصيغة MM/YY
        return /^(0[1-9]|1[0-2])\/?([0-9]{2})$/.test(date);
    }
    
    function isValidCVV(cvv) {
        // التحقق من أن CVV يحتوي على 3 أو 4 أرقام
        return /^\d{3,4}$/.test(cvv);
    }
</script>
@endsection