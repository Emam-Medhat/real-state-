@extends('layouts.app')

@section('title', 'إنشاء عقار جديد')

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
        --border-radius: 12px;
        --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }
    
    .property-create-section {
        font-family: 'Tajawal', sans-serif;
        background-color: var(--light-bg);
        padding: 3rem 0;
        direction: rtl;
    }
    
    .property-form-container {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    .form-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .form-header h1 {
        font-weight: 700;
        margin: 0;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .section-title {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--secondary-color);
        display: inline-block;
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .form-group {
        margin-bottom: 1.25rem;
    }
    
    .form-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid #e0e0e0;
        transition: var(--transition);
        width: 100%;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.2);
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }
    
    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .checkbox-item input[type="checkbox"] {
        width: 18px;
        height: 18px;
    }
    
    .image-upload-section {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: var(--border-radius);
        margin-bottom: 1.5rem;
    }
    
    .image-input-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .submit-btn {
        background: linear-gradient(135deg, var(--secondary-color), #2980b9);
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: 8px;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(41, 128, 185, 0.3);
    }
    
    .alert-danger {
        border-radius: var(--border-radius);
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .form-body {
            padding: 1.5rem;
        }
        
        .form-header h1 {
            font-size: 1.6rem;
        }
    }
    
    @media (max-width: 768px) {
        .property-create-section {
            padding: 2rem 0;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .checkbox-group {
            gap: 1rem;
        }
    }
    
    @media (max-width: 576px) {
        .form-header {
            padding: 1rem;
        }
        
        .form-header h1 {
            font-size: 1.4rem;
        }
        
        .form-body {
            padding: 1rem;
        }
        
        .section-title {
            font-size: 1.2rem;
        }
    }
</style>

<section class="property-create-section">
    <div class="container">
        <div class="property-form-container">
            <div class="form-header">
                <h1>
                    <i class="fas fa-home"></i>
                    إنشاء عقار جديد
                </h1>
            </div>
            
            <div class="form-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('properties.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h3 class="section-title">المعلومات الأساسية</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="title" class="form-label">اسم العقار</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price" class="form-label">السعر</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="type" class="form-label">النوع</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="rent" {{ old('type') == 'rent' ? 'selected' : '' }}>إيجار</option>
                                <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>بيع</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status" class="form-label">حالة العقار</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="available" {{ old('status', 'available') == 'available' ? 'selected' : '' }}>متاح</option>
                                <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>مباع</option>
                                <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>مؤجر</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                    </div>

                    <h3 class="section-title">تفاصيل العقار</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="bedrooms" class="form-label">عدد غرف النوم</label>
                            <input type="number" name="bedrooms" id="bedrooms" class="form-control" value="{{ old('bedrooms', 0) }}" min="0" required>
                        </div>

                        <div class="form-group">
                            <label for="bathrooms" class="form-label">عدد الحمامات</label>
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ old('bathrooms', 0) }}" min="0" required>
                        </div>

                        <div class="form-group">
                            <label for="area" class="form-label">المساحة (متر مربع)</label>
                            <input type="number" name="area" id="area" class="form-control" value="{{ old('area') }}" step="0.1" min="0">
                        </div>

                        <div class="form-group">
                            <label for="floor" class="form-label">الطابق</label>
                            <input type="number" name="floor" id="floor" class="form-control" value="{{ old('floor') }}" min="0">
                        </div>

                        <div class="form-group">
                            <label for="total_floors" class="form-label">إجمالي الطوابق</label>
                            <input type="number" name="total_floors" id="total_floors" class="form-control" value="{{ old('total_floors') }}" min="0">
                        </div>

                        <div class="form-group">
                            <label for="construction_year" class="form-label">سنة البناء</label>
                            <input type="number" name="construction_year" id="construction_year" class="form-control" value="{{ old('construction_year') }}" min="1900" max="{{ date('Y') }}">
                        </div>

                        <div class="form-group">
                            <label for="furnished" class="form-label">التأثيث</label>
                            <select name="furnished" id="furnished" class="form-select" required>
                                <option value="furnished" {{ old('furnished') == 'furnished' ? 'selected' : '' }}>مفروش</option>
                                <option value="semi_furnished" {{ old('furnished') == 'semi_furnished' ? 'selected' : '' }}>نصف مفروش</option>
                                <option value="unfurnished" {{ old('furnished') == 'unfurnished' ? 'selected' : '' }}>غير مفروش</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">المرافق</label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" name="amenities[]" value="elevator" id="elevator" {{ in_array('elevator', old('amenities', [])) ? 'checked' : '' }}>
                                <label for="elevator">مصعد</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="amenities[]" value="parking" id="parking" {{ in_array('parking', old('amenities', [])) ? 'checked' : '' }}>
                                <label for="parking">مواقف سيارات</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="amenities[]" value="pool" id="pool" {{ in_array('pool', old('amenities', [])) ? 'checked' : '' }}>
                                <label for="pool">مسبح</label>
                            </div>
                        </div>
                    </div>

                    <h3 class="section-title">الموقع</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="address" class="form-label">العنوان</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="city" class="form-label">المدينة</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="neighborhood" class="form-label">الحي</label>
                            <input type="text" name="neighborhood" id="neighborhood" class="form-control" value="{{ old('neighborhood') }}">
                        </div>

                        <div class="form-group">
                            <label for="latitude" class="form-label">خط العرض</label>
                            <input type="number" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}" step="0.00000001" min="-90" max="90">
                        </div>

                        <div class="form-group">
                            <label for="longitude" class="form-label">خط الطول</label>
                            <input type="number" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}" step="0.00000001" min="-180" max="180">
                        </div>
                    </div>

                    <h3 class="section-title">الصور</h3>
                    <div class="image-upload-section">
                        <div class="form-group">
                            <label for="image" class="form-label">صورة العقار الرئيسية</label>
                            <div class="image-input-group">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save"></i>
                            إنشاء العقار
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection