@extends('layouts.app')

@section('title', 'أضف عقار')
<style>
    /* Navbar Styling */
.navbar {
    background-color: #0d6efd;
}

.navbar-nav .nav-link {
    color: #ffffff;
    transition: 0.3s;
    font-weight: 500;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: #ffc107;
    transform: scale(1.05);
}

/* Button hover effect */
.btn-primary:hover {
    background-color: #0056d2;
    border-color: #004bb1;
}

</style>
@section('content')
<section class="add-property py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary">أضف عقارك</h2>
            <p class="text-muted">املأ البيانات التالية لعرض عقارك بكل سهولة</p>
        </div>

        <!-- Property Form -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">
                <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <label for="title" class="form-label fw-semibold">عنوان العقار</label>
                            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="مثال: شقة فاخرة بالتجمع" value="{{ old('title') }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Price -->
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-semibold">السعر (جنيه)</label>
                            <input type="number" name="price" id="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="مثال: 1500000" value="{{ old('price') }}" required>
                            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Location -->
                        <div class="col-md-12">
                            <label for="location" class="form-label fw-semibold">الموقع</label>
                            <input type="text" name="location" id="location" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" placeholder="مثال: القاهرة الجديدة" value="{{ old('location') }}" required>
                            @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Rooms -->
                        <div class="col-md-6">
                            <label for="rooms" class="form-label fw-semibold">عدد الغرف</label>
                            <input type="number" name="rooms" id="rooms" class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}" value="{{ old('rooms') }}" required>
                            @error('rooms')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Bathrooms -->
                        <div class="col-md-6">
                            <label for="bathrooms" class="form-label fw-semibold">عدد الحمامات</label>
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" value="{{ old('bathrooms') }}" required>
                            @error('bathrooms')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Area -->
                        <div class="col-md-6">
                            <label for="area" class="form-label fw-semibold">المساحة (م²)</label>
                            <input type="number" name="area" id="area" class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" value="{{ old('area') }}" required>
                            @error('area')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Property Type -->
                        <div class="col-md-6">
                            <label for="property_type" class="form-label fw-semibold">نوع العقار</label>
                            <select name="property_type" id="property_type" class="form-select {{ $errors->has('property_type') ? 'is-invalid' : '' }}">
                                <option value="بيع" {{ old('property_type') == 'بيع' ? 'selected' : '' }}>بيع</option>
                                <option value="إيجار" {{ old('property_type') == 'إيجار' ? 'selected' : '' }}>إيجار</option>
                            </select>
                            @error('property_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Nearest Location -->
                        <div class="col-md-12">
                            <label for="nearest_location" class="form-label fw-semibold">أقرب مكان للعقار</label>
                            <input type="text" name="nearest_location" id="nearest_location" class="form-control {{ $errors->has('nearest_location') ? 'is-invalid' : '' }}" value="{{ old('nearest_location') }}">
                            @error('nearest_location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label for="description" class="form-label fw-semibold">وصف العقار</label>
                            <textarea name="description" id="description" rows="4" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="صف العقار بشكل تفصيلي">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Images -->
                        <div class="col-md-12">
                            <label for="images" class="form-label fw-semibold">صور العقار</label>
                            <input type="file" name="images[]" id="images" class="form-control {{ $errors->has('images') ? 'is-invalid' : '' }}" multiple>
                            @error('images')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5 py-2 shadow-sm rounded-pill">نشر العقار</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
