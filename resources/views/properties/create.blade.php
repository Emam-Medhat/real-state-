@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء عقار</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Cairo', sans-serif;
        }
        .container {
            max-width: 1000px;
            margin-top: 40px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }
        h3 {
            color: #34495e;
            margin-top: 30px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        label {
            font-weight: 600;
            color: #34495e;
            margin-bottom: 8px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-add-image {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            margin-top: 10px;
        }
        .btn-add-image:hover {
            background-color: #218838;
        }
        .image-input-group {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .image-preview {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            margin-top: 10px;
            display: none;
        }
        .remove-image {
            color: #dc3545;
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .remove-image:hover {
            color: #b02a37;
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .checkbox-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .section-divider {
            border-top: 1px solid #e9ecef;
            padding-top: 20px;
        }
        @media (max-width: 768px) {
            .image-input-group {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-home me-2"></i> إنشاء عقار جديد</h1>

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

            <h3>المعلومات الأساسية</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">اسم العقار</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="price">السعر</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="type">النوع</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="rent" {{ old('type') == 'rent' ? 'selected' : '' }}>إيجار</option>
                        <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>بيع</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">حالة العقار</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="available" {{ old('status', 'available') == 'available' ? 'selected' : '' }}>متاح</option>
                        <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>مباع</option>
                        <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>مؤجر</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                    </select>
                </div>
            </div>

            <div class="form-group section-divider">
                <label for="description">الوصف</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
            </div>

            <h3>تفاصيل العقار</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="bedrooms">عدد غرف النوم</label>
                    <input type="number" name="bedrooms" id="bedrooms" class="form-control" value="{{ old('bedrooms', 0) }}" min="0" required>
                </div>

                <div class="form-group">
                    <label for="bathrooms">عدد الحمامات</label>
                    <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ old('bathrooms', 0) }}" min="0" required>
                </div>

                <div class="form-group">
                    <label for="area">المساحة (متر مربع)</label>
                    <input type="number" name="area" id="area" class="form-control" value="{{ old('area') }}" step="0.1" min="0">
                </div>

                <div class="form-group">
                    <label for="floor">الطابق</label>
                    <input type="number" name="floor" id="floor" class="form-control" value="{{ old('floor') }}" min="0">
                </div>

                <div class="form-group">
                    <label for="total_floors">إجمالي الطوابق</label>
                    <input type="number" name="total_floors" id="total_floors" class="form-control" value="{{ old('total_floors') }}" min="0">
                </div>

                <div class="form-group">
                    <label for="construction_year">سنة البناء</label>
                    <input type="number" name="construction_year" id="construction_year" class="form-control" value="{{ old('construction_year') }}" min="1900" max="{{ date('Y') }}">
                </div>

                <div class="form-group">
                    <label for="furnished">التأثيث</label>
                    <select name="furnished" id="furnished" class="form-select" required>
                        <option value="furnished" {{ old('furnished') == 'furnished' ? 'selected' : '' }}>مفروش</option>
                        <option value="semi_furnished" {{ old('furnished') == 'semi_furnished' ? 'selected' : '' }}>نصف مفروش</option>
                        <option value="unfurnished" {{ old('furnished') == 'unfurnished' ? 'selected' : '' }}>غير مفروش</option>
                    </select>
                </div>
            </div>

            <div class="form-group section-divider">
                <label>المرافق</label>
                <div class="checkbox-group">
                    <div>
                        <input type="checkbox" name="amenities[]" value="elevator" {{ in_array('elevator', old('amenities', [])) ? 'checked' : '' }}>
                        <label>مصعد</label>
                    </div>
                    <div>
                        <input type="checkbox" name="amenities[]" value="parking" {{ in_array('parking', old('amenities', [])) ? 'checked' : '' }}>
                        <label>مواقف سيارات</label>
                    </div>
                    <div>
                        <input type="checkbox" name="amenities[]" value="pool" {{ in_array('pool', old('amenities', [])) ? 'checked' : '' }}>
                        <label>مسبح</label>
                    </div>
                </div>
            </div>

            <h3>الموقع</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="address">العنوان</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                </div>

                <div class="form-group">
                    <label for="city">المدينة</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
                </div>

                <div class="form-group">
                    <label for="neighborhood">الحي</label>
                    <input type="text" name="neighborhood" id="neighborhood" class="form-control" value="{{ old('neighborhood') }}">
                </div>

                <div class="form-group">
                    <label for="latitude">خط العرض</label>
                    <input type="number" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}" step="0.00000001" min="-90" max="90">
                </div>

                <div class="form-group">
                    <label for="longitude">خط الطول</label>
                    <input type="number" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}" step="0.00000001" min="-180" max="180">
                </div>
            </div>

        </div>
            <h3>الصور</h3>
            <div class="form-group">
                <label>إضافة صور العقار</label>
                <div id="image-inputs">
                    <div class="image-input-group">
                        <div class="mb-3">
                            <label for="image" class="form-label">صورة العقار</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div> 
                    </div>
                </div>
                {{-- <button type="button" class="btn-add-image" onclick="addImageInput()"><i class="fas fa-plus me-2"></i>إضافة صورة أخرى</button> --}}
            </div>

            <div class="text-center section-divider">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>إنشاء العقار</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        let imageIndex = 1;

        function addImageInput() {
            const container = document.getElementById('image-inputs');
            const newInput = document.createElement('div');
            newInput.className = 'image-input-group';
            newInput.innerHTML = `
                <input type="file" name="images[${imageIndex}][file]" accept="image/*" class="form-control image-file" onchange="previewImage(this)">
                <input type="text" name="images[${imageIndex}][room_type]" placeholder="نوع الغرفة (مثل: غرفة نوم)" class="form-control">
                <input type="text" name="images[${imageIndex}][caption]" placeholder="وصف الصورة" class="form-control">
                <img class="image-preview" alt="معاينة الصورة">
                <i class="fas fa-trash remove-image" onclick="removeImage(this)"></i>
            `;
            container.appendChild(newInput);
            imageIndex++;
        }

        function removeImage(element) {
            element.parentElement.remove();
        }

        function previewImage(input) {
            const preview = input.parentElement.querySelector('.image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script> --}}
</body>
</html>


@endsection