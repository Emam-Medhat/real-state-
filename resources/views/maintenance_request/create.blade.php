@extends('layouts.app')

@section('title', 'إضافة طلب صيانة')

@section('content')
<style>
    .maintenance-request-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .form-control, .form-select {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-description {
        height: 150px;
    }
</style>

<div class="maintenance-request-container">
    <h1 class="form-title">إضافة طلب صيانة</h1>

    <form action="{{ route('maintenance_requests.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- اختيار العقار -->
        <div class="form-group">
            <label for="property_id">اختر العقار</label>
            <select name="property_id" id="property_id" class="form-select" required>
                <option value="">-- اختر العقار --</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                        {{ $property->title }} - {{ $property->city }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- نوع المشكلة -->
        <div class="form-group">
            <label for="issue_type">نوع المشكلة</label>
            <select name="issue_type" id="issue_type" class="form-select" required>
                <option value="">-- اختر نوع المشكلة --</option>
                <option value="plumbing" {{ old('issue_type') == 'plumbing' ? 'selected' : '' }}>مشاكل سباكة</option>
                <option value="electrical" {{ old('issue_type') == 'electrical' ? 'selected' : '' }}>مشاكل كهرباء</option>
                <option value="structural" {{ old('issue_type') == 'structural' ? 'selected' : '' }}>مشاكل هيكلية</option>
                <option value="other" {{ old('issue_type') == 'other' ? 'selected' : '' }}>أخرى</option>
            </select>
        </div>

        <!-- وصف المشكلة -->
        <div class="form-group">
            <label for="description">وصف المشكلة</label>
            <textarea name="description" id="description" class="form-control form-description" placeholder="قم بوصف المشكلة بالتفصيل" required>{{ old('description') }}</textarea>
        </div>

        <!-- مستوى الأهمية -->
        <div class="form-group">
            <label for="priority">مستوى الأهمية</label>
            <select name="priority" id="priority" class="form-select" required>
                <option value="">-- اختر مستوى الأهمية --</option>
                <option value="urgent" {{ old('priority') == 'urgent' ? 'selected' : '' }}>عاجل</option>
                <option value="normal" {{ old('priority') == 'normal' ? 'selected' : '' }}>عادي</option>
            </select>
        </div>

        <!-- رفع الصور -->
        <div class="form-group">
            <label for="images">رفع الصور (اختياري)</label>
            <input type="file" name="images" id="images" class="form-control" accept="image/*" multiple>
        </div>

        <!-- زر الإرسال -->
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">إرسال الطلب</button>
        </div>
    </form>
</div>
@endsection