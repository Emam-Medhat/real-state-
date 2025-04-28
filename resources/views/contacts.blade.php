@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة جهات الاتصال</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }

        .contact-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .contact-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid var(--primary-color);
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .contact-name {
            color: var(--primary-color);
            font-weight: 700;
        }

        .contact-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.2rem;
        }

        .contact-value {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .message-box {
            background-color: var(--secondary-color);
            border-radius: 8px;
            padding: 15px;
            border-left: 3px solid var(--primary-color);
        }

        .badge-inquiry {
            background-color: #e83e8c;
            color: white;
            font-size: 0.8rem;
        }

        .action-buttons .btn {
            margin-left: 5px;
        }

        /* رسائل التنبيه */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            animation: fadeIn 0.5s, fadeOut 0.5s 2.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-20px); }
        }
    </style>
</head>
<body>
    <!-- رسائل التنبيه -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="contact-header text-center">
        <div class="container">
            <h1><i class="fas fa-address-book me-2"></i>إدارة جهات الاتصال</h1>
            <p class="lead">عرض جميع رسائل العملاء والاستفسارات</p>
        </div>
    </div>

    <div class="container">
        @foreach ($contacts as $contact)
        <div class="contact-card p-4 mb-4" id="contact-{{ $contact->id }}">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex align-items-center mb-3">
                        <h3 class="contact-name m-0">{{ $contact->name }}</h3>
                        <span class="badge badge-inquiry ms-2">{{ $contact->inquiry_type }}</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="contact-label"><i class="fas fa-envelope me-2"></i>البريد الإلكتروني</p>
                            <p class="contact-value">{{ $contact->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="contact-label"><i class="fas fa-phone me-2"></i>رقم الهاتف</p>
                            <p class="contact-value">{{ $contact->phone }}</p>
                        </div>
                    </div>

                    <div class="message-box">
                        <p class="contact-label"><i class="fas fa-comment me-2"></i>الرسالة</p>
                        <p class="contact-value">{{ $contact->message }}</p>
                    </div>
                </div>

                <div class="col-md-4 d-flex flex-column justify-content-between">
                    <div class="text-md-end mb-3">
                        <p class="text-muted small">
                            <i class="far fa-clock me-1"></i>
                            @if($contact->created_at)
                                {{-- {{ $contact->created_at->diffForHumans() }} --}}
                            @endif
                        </p>
                    </div>

                    <div class="action-buttons text-md-end">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-reply me-1"></i>رد
                        </button>
                        <button class="btn btn-sm btn-success">
                            <i class="fas fa-check me-1"></i>تمت متابعته
                        </button>

                        <!-- زر الحذف مع نموذج -->
                        <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الاستفسار؟')">
                                <i class="fas fa-trash me-1"></i>حذف
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @if($contacts->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">لا توجد رسائل لعرضها</h4>
            <p class="text-muted">سيظهر هنا أي استفسارات أو رسائل من العملاء</p>
        </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // إخفاء رسائل التنبيه تلقائياً بعد 3 ثواني
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.display = 'none';
            });
        }, 3000);
    </script>
</body>
</html>

@endsection