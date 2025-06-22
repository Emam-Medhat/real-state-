@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --accent-color: #e74c3c;
        --light-bg: #f8f9fa;
        --dark-text: #2c3e50;
        --light-text: #7f8c8d;
        --border-radius: 10px;
        --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }
    
    .engineering-company-section {
        font-family: 'Tajawal', sans-serif;
        background-color: var(--light-bg);
        padding: 3rem 0;
        direction: rtl;
    }
    
    .company-form-container {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 2.5rem;
        margin-bottom: 2rem;
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .form-header h2 {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }
    
    .form-header h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        right: 0;
        width: 70px;
        height: 4px;
        background: var(--secondary-color);
        border-radius: 2px;
    }
    
    .form-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }
    
    .form-control, .form-select {
        border-radius: var(--border-radius);
        padding: 0.75rem 1rem;
        border: 1px solid #e0e0e0;
        transition: var(--transition);
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.2);
    }
    
    .is-invalid {
        border-color: var(--accent-color);
    }
    
    .invalid-feedback {
        color: var(--accent-color);
        font-size: 0.85rem;
        margin-top: 0.25rem;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    .dynamic-input-container {
        margin-bottom: 1.5rem;
    }
    
    .input-group {
        margin-bottom: 0.75rem;
    }
    
    .btn-add {
        background-color: var(--secondary-color);
        color: white;
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-add:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
    }
    
    .btn-remove {
        background-color: #f8f9fa;
        color: var(--accent-color);
        border: 1px solid var(--accent-color);
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        transition: var(--transition);
    }
    
    .btn-remove:hover {
        background-color: var(--accent-color);
        color: white;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, var(--secondary-color), #2980b9);
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: var(--border-radius);
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(41, 128, 185, 0.3);
    }
    
    .alert {
        border-radius: var(--border-radius);
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .company-form-container {
            padding: 2rem;
        }
        
        .form-header h2 {
            font-size: 1.8rem;
        }
    }
    
    @media (max-width: 768px) {
        .engineering-company-section {
            padding: 2rem 0;
        }
        
        .company-form-container {
            padding: 1.5rem;
        }
        
        .form-header h2 {
            font-size: 1.6rem;
        }
    }
    
    @media (max-width: 576px) {
        .company-form-container {
            padding: 1.25rem;
        }
        
        .form-header h2 {
            font-size: 1.4rem;
        }
        
        .btn-submit, .btn-add {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<section class="engineering-company-section">
    <div class="container">
        <div class="company-form-container">
            <div class="form-header">
                <h2><i class="fas fa-building me-2"></i> إضافة شركة هندسية جديدة</h2>
            </div>
            
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('engineering_companies.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">اسم الشركة</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="city" class="form-label">المدينة</label>
                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="phone" class="form-label">رقم الهاتف</label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="website" class="form-label">الموقع الإلكتروني</label>
                        <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" placeholder="مثال: https://example.com">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="years_experience" class="form-label">سنوات الخبرة</label>
                        <input type="number" name="years_experience" id="years_experience" class="form-control @error('years_experience') is-invalid @enderror" value="{{ old('years_experience') }}" min="0" max="100">
                        @error('years_experience')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12">
                        <label for="image" class="form-label">صورة الشركة (أي نوع صورة، بحد أقصى 5MB)</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12 dynamic-input-container">
                        <label class="form-label">الخدمات</label>
                        <div id="services-container">
                            <div class="input-group">
                                <input type="text" name="services[]" class="form-control" placeholder="أدخل خدمة">
                                <button type="button" class="btn btn-remove remove-service">إزالة</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-add mt-2" id="add-service">
                            <i class="fas fa-plus"></i> إضافة خدمة
                        </button>
                    </div>
                    
                    <div class="col-12 dynamic-input-container">
                        <label class="form-label">المشاريع</label>
                        <div id="projects-container">
                            <div class="input-group">
                                <input type="text" name="projects[]" class="form-control" placeholder="أدخل مشروع">
                                <button type="button" class="btn btn-remove remove-project">إزالة</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-add mt-2" id="add-project">
                            <i class="fas fa-plus"></i> إضافة مشروع
                        </button>
                    </div>
                    
                    <div class="col-12 dynamic-input-container">
                        <label class="form-label">الشهادات</label>
                        <div id="certifications-container">
                            <div class="input-group">
                                <input type="text" name="certifications[]" class="form-control" placeholder="أدخل شهادة">
                                <button type="button" class="btn btn-remove remove-certification">إزالة</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-add mt-2" id="add-certification">
                            <i class="fas fa-plus"></i> إضافة شهادة
                        </button>
                    </div>
                    
                    <div class="col-12 dynamic-input-container">
                        <label class="form-label">الفريق</label>
                        <div id="team-container">
                            <div class="input-group">
                                <input type="text" name="team[]" class="form-control" placeholder="أدخل عضو فريق">
                                <button type="button" class="btn btn-remove remove-team">إزالة</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-add mt-2" id="add-team">
                            <i class="fas fa-plus"></i> إضافة عضو فريق
                        </button>
                    </div>
                    
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-save"></i> إضافة الشركة
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('add-service').addEventListener('click', function() {
    const container = document.getElementById('services-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="services[]" class="form-control" placeholder="أدخل خدمة">
        <button type="button" class="btn btn-remove remove-service">إزالة</button>
    `;
    container.appendChild(newInput);
    addRemoveListener();
});

document.getElementById('add-project').addEventListener('click', function() {
    const container = document.getElementById('projects-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="projects[]" class="form-control" placeholder="أدخل مشروع">
        <button type="button" class="btn btn-remove remove-project">إزالة</button>
    `;
    container.appendChild(newInput);
    addRemoveListener();
});

document.getElementById('add-certification').addEventListener('click', function() {
    const container = document.getElementById('certifications-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="certifications[]" class="form-control" placeholder="أدخل شهادة">
        <button type="button" class="btn btn-remove remove-certification">إزالة</button>
    `;
    container.appendChild(newInput);
    addRemoveListener();
});

document.getElementById('add-team').addEventListener('click', function() {
    const container = document.getElementById('team-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="team[]" class="form-control" placeholder="أدخل عضو فريق">
        <button type="button" class="btn btn-remove remove-team">إزالة</button>
    `;
    container.appendChild(newInput);
    addRemoveListener();
});

function addRemoveListener() {
    document.querySelectorAll('.remove-service, .remove-project, .remove-certification, .remove-team').forEach(button => {
        button.addEventListener('click', function() {
            this.parentElement.remove();
        });
    });
}

addRemoveListener();
</script>
@endsection