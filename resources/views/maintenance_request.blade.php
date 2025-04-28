```php
@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4895ef;
        --danger-color: #f72585;
        --warning-color: #f8961e;
        --success-color: #4cc9f0;
        --dark-color: #1a1a2e;
        --light-color: #f8f9fa;
        --border-radius: 12px;
        --box-shadow: 0 6px 20px rgba(67, 97, 238, 0.1);
    }

    body {
        font-family: 'Tajawal', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        color: var(--dark-color);
    }

    .maintenance-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .form-title {
        font-weight: 900;
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 30px;
        position: relative;
        text-align: right;
        text-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .form-title::after {
        content: "";
        position: absolute;
        right: 0;
        bottom: -8px;
        width: 60px;
        height: 4px;
        background: var(--accent-color);
        border-radius: 3px;
    }

    .form-control, .form-select {
        border: 2px solid #e0e3ed;
        border-radius: var(--border-radius);
        padding: 12px 15px;
        font-size: 1.05rem;
        background-color: var(--light-color);
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(72, 149, 239, 0.15);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        border: none;
        border-radius: var(--border-radius);
        padding: 12px 24px;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(67, 97, 238, 0.35);
    }

    .table {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 15px;
        vertical-align: middle;
        text-align: right;
    }

    .table th {
        background: var(--primary-color);
        color: white;
        font-weight: 700;
    }

    .table tbody tr:hover {
        background: var(--light-color);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }

    @media (max-width: 768px) {
        .form-title { font-size: 2rem; }
        .maintenance-container { margin: 30px auto; padding: 0 15px; }
    }

    @media (max-width: 576px) {
        .form-title { font-size: 1.8rem; }
        .form-control, .form-select { font-size: 1rem; }
        .btn-primary { padding: 10px 20px; }
    }
</style>

<div class="maintenance-container fade-in">
    <h2 class="form-title">إنشاء طلب صيانة</h2>
    <form action="{{ route('maintenance_requests.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="property_id" class="form-label">العقار</label>
            <select name="property_id" id="property_id" class="form-select @error('property_id') is-invalid @enderror" required>
                <option value="">اختر العقار</option>
                @foreach($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->title }} - {{ $property->city }}</option>
                @endforeach
            </select>
            @error('property_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="issue_type" class="form-label">نوع المشكلة</label>
            <select name="issue_type" id="issue_type" class="form-select @error('issue_type') is-invalid @enderror" required>
                <option value="">اختر نوع المشكلة</option>
                <option value="plumbing">سباكة</option>
                <option value="electrical">كهرباء</option>
                <option value="structural">هيكلية</option>
                <option value="other">أخرى</option>
            </select>
            @error('issue_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">وصف المشكلة</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" required></textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="priority" class="form-label">الأولوية</label>
            <select name="priority" id="priority" class="form-select @error('priority') is-invalid @enderror" required>
                <option value="normal">عادي</option>
                <option value="urgent">عاجل</option>
            </select>
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="images" class="form-label">رفع الصور (اختياري)</label>
            <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" multiple accept="image/*">
            @error('images')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">إرسال الطلب</button>
    </form>

    <!-- جدول لعرض طلبات الصيانة (مثال) -->
    <table class="table mt-5">
        <thead>
            <tr>
                <th>العقار</th>
                <th>نوع المشكلة</th>
                <th>الوصف</th>
                <th>الأولوية</th>
                <th>الحالة</th>
            </tr>
        </thead>
        <tbody>
            <!-- إذا كنت عايز تعرض طلبات سابقة، هنجيبها من الداتابيز هنا -->
            <tr>
                <td colspan="5" class="text-center">لا توجد طلبات صيانة بعد</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
```