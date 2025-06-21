@extends('layouts.app')

@section('content')
<div class="container">
    <div class="search-container mt-5">
        <h2 class="text-center mb-4 hero-title">إضافة شركة هندسية جديدة</h2>
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
                    <input type="text" name="name" id="name" class="form-control search-input @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">المدينة</label>
                    <input type="text" name="city" id="city" class="form-control search-input @error('city') is-invalid @enderror" value="{{ old('city') }}">
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <input type="text" name="phone" id="phone" class="form-control search-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email" class="form-control search-input @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="website" class="form-label">الموقع الإلكتروني</label>
                    <input type="url" name="website" id="website" class="form-control search-input @error('website') is-invalid @enderror" value="{{ old('website') }}" placeholder="مثال: https://example.com">
                    @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="years_experience" class="form-label">سنوات الخبرة</label>
                    <input type="number" name="years_experience" id="years_experience" class="form-control search-input @error('years_experience') is-invalid @enderror" value="{{ old('years_experience') }}" min="0" max="100">
                    @error('years_experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea name="description" id="description" class="form-control search-input @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="image" class="form-label">صورة الشركة (أي نوع صورة، بحد أقصى 5MB)</label>
                    <input type="file" name="image" id="image" class="form-control search-input @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label">الخدمات</label>
                    <div id="services-container">
                        <div class="input-group mb-2">
                            <input type="text" name="services[]" class="form-control search-input" placeholder="أدخل خدمة">
                            <button type="button" class="btn btn-outline-modern remove-service">إزالة</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary-modern mt-2" id="add-service">إضافة خدمة</button>
                </div>
                <div class="col-md-12">
                    <label class="form-label">المشاريع</label>
                    <div id="projects-container">
                        <div class="input-group mb-2">
                            <input type="text" name="projects[]" class="form-control search-input" placeholder="أدخل مشروع">
                            <button type="button" class="btn btn-outline-modern remove-project">إزالة</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary-modern mt-2" id="add-project">إضافة مشروع</button>
                </div>
                <div class="col-md-12">
                    <label class="form-label">الشهادات</label>
                    <div id="certifications-container">
                        <div class="input-group mb-2">
                            <input type="text" name="certifications[]" class="form-control search-input" placeholder="أدخل شهادة">
                            <button type="button" class="btn btn-outline-modern remove-certification">إزالة</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary-modern mt-2" id="add-certification">إضافة شهادة</button>
                </div>
                <div class="col-md-12">
                    <label class="form-label">الفريق</label>
                    <div id="team-container">
                        <div class="input-group mb-2">
                            <input type="text" name="team[]" class="form-control search-input" placeholder="أدخل عضو فريق">
                            <button type="button" class="btn btn-outline-modern remove-team">إزالة</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary-modern mt-2" id="add-team">إضافة عضو فريق</button>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn search-btn mt-4">إضافة الشركة</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('add-service').addEventListener('click', function() {
    const container = document.getElementById('services-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="services[]" class="form-control search-input" placeholder="أدخل خدمة">
        <button type="button" class="btn btn-outline-modern remove-service">إزالة</button>
    `;
    container.appendChild(newInput);
    addRemoveListener();
});

document.getElementById('add-project').addEventListener('click', function() {
    const container = document.getElementById('projects-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="projects[]" class="form-control search-input" placeholder="أدخل مشروع">
        <button type="button" class="btn btn-outline-modern remove-project">إزالة</button>
    `;
    container.appendChild(newInput);
    addRemoveListener();
});

document.getElementById('add-certification').addEventListener('click', function() {
    const container = document.getElementById('certifications-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="certifications[]" class="form-control search-input" placeholder="أدخل شهادة">
        <button type="button" class="btn btn-outline-modern remove-certification">إزالة</button>
    `;
    container.appendChild(newInput);
    addRemoveListener();
});

document.getElementById('add-team').addEventListener('click', function() {
    const container = document.getElementById('team-container');
    const newInput = document.createElement('div');
    newInput.classList.add('input-group', 'mb-2');
    newInput.innerHTML = `
        <input type="text" name="team[]" class="form-control search-input" placeholder="أدخل عضو فريق">
        <button type="button" class="btn btn-outline-modern remove-team">إزالة</button>
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