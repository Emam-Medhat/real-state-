{{-- @extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء شركة هندسية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f4f7fa; font-family: 'Cairo', sans-serif; }
        .container { max-width: 1200px; margin-top: 40px; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); }
        h1, h3 { color: #2c3e50; margin-bottom: 20px; font-weight: 700; }
        .form-group { margin-bottom: 20px; }
        .form-control, .form-select { border-radius: 8px; padding: 12px; border: 1px solid #ced4da; transition: border-color 0.3s ease; }
        .form-control:focus { border-color: #22C55E; box-shadow: 0 0 5px rgba(34, 197, 94, 0.3); }
        label { font-weight: 600; color: #34495e; margin-bottom: 8px; }
        .btn-primary { background-color: #22C55E; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; }
        .btn-primary:hover { background-color: #16A34A; }
        .btn-add { background-color: #28a745; color: #fff; padding: 10px 20px; border-radius: 8px; border: none; margin-top: 10px; }
        .btn-add:hover { background-color: #218838; }
        .image-input-group, .dynamic-input-group { background-color: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 15px; display: flex; align-items: center; gap: 15px; flex-wrap: wrap; }
        .image-preview { max-width: 100px; max-height: 100px; border-radius: 8px; margin-top: 10px; display: none; }
        .remove-input { color: #DC2626; cursor: pointer; font-size: 1.2rem; }
        .remove-input:hover { color: #B91C1C; }
        .form-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .section-divider { border-top: 1px solid #e9ecef; padding-top: 20px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-building me-2"></i> إنشاء شركة هندسية</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('engineering_companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>المعلومات الأساسية</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">اسم الشركة</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="city">المدينة</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
                </div>
                <div class="form-group">
                    <label for="phone">رقم الهاتف</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="email">الإيميل</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="website">الموقع الإلكتروني</label>
                    <input type="url" name="website" id="website" class="form-control" value="{{ old('website') }}">
                </div>
                <div class="form-group">
                    <label for="years_experience">سنوات الخبرة</label>
                    <input type="number" name="years_experience" id="years_experience" class="form-control" value="{{ old('years_experience') }}" min="0">
                </div>
            </div>

            <div class="form-group section-divider">
                <label for="description">الوصف</label>
                <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
            </div>

            <h3>الصور</h3>
            <div class="form-group">
                <label>إضافة صور الشركة</label>
                <div id="image-inputs">
                    <div class="image-input-group">
                        <input type="file" name="images[]" id="images" class="custom-file-input" multiple accept="image/*">
            <input type="text" name="images[0][caption]" placeholder="وصف الصورة" class="form-control" multiple>
                        <img class="image-preview" alt="معاينة الصورة">
                        <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addImageInput()"><i class="fas fa-plus me-2"></i>إضافة صورة أخرى</button>
            </div>

            <h3>الخدمات</h3>
            <div class="form-group">
                <label>إضافة خدمات الشركة</label>
                <div id="service-inputs">
                    <div class="dynamic-input-group">
                        <input type="text" name="services[0]" placeholder="مثل: تصميم معماري" class="form-control">
                        <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addServiceInput()"><i class="fas fa-plus me-2"></i>إضافة خدمة أخرى</button>
            </div>

            <h3>المشاريع السابقة</h3>
            <div class="form-group">
                <label>إضافة مشاريع</label>
                <div id="project-inputs">
                    <div class="dynamic-input-group">
                        <input type="text" name="projects[0][name]" placeholder="اسم المشروع" class="form-control">
                        <textarea name="projects[0][description]" placeholder="وصف المشروع" class="form-control" rows="3"></textarea>
                        <input type="file" name="projects[0][image]" accept="image/*" class="form-control image-file" onchange="previewImage(this)">
                        <img class="image-preview" alt="معاينة الصورة">
                        <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addProjectInput()"><i class="fas fa-plus me-2"></i>إضافة مشروع آخر</button>
            </div>

            <h3>شهادات الاعتماد</h3>
            <div class="form-group">
                <label>إضافة شهادات</label>
                <div id="certification-inputs">
                    <div class="dynamic-input-group">
                        <input type="text" name="certifications[0][name]" placeholder="اسم الشهادة" class="form-control">
                        <input type="text" name="certifications[0][issuer]" placeholder="الجهة المانحة" class="form-control">
                        <input type="number" name="certifications[0][year]" placeholder="سنة الحصول" class="form-control" min="1900" max="{{ date('Y') }}">
                        <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addCertificationInput()"><i class="fas fa-plus me-2"></i>إضافة شهادة أخرى</button>
            </div>

            <h3>فريق العمل</h3>
            <div class="form-group">
                <label>إضافة أعضاء الفريق</label>
                <div id="team-inputs">
                    <div class="dynamic-input-group">
                        <input type="text" name="team[0][name]" placeholder="اسم العضو" class="form-control">
                        <input type="text" name="team[0][position]" placeholder="المنصب" class="form-control">
                        <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addTeamInput()"><i class="fas fa-plus me-2"></i>إضافة عضو آخر</button>
            </div>

            <div class="text-center section-divider">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>إنشاء الشركة</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let imageIndex = 1;
        let serviceIndex = 1;
        let projectIndex = 1;
        let certificationIndex = 1;
        let teamIndex = 1;

        function addImageInput() {
            const container = document.getElementById('image-inputs');
            const newInput = document.createElement('div');
            newInput.className = 'image-input-group';
            newInput.innerHTML = `
                <input type="file" name="images[${imageIndex}][file]" accept="image/*" class="form-control image-file" onchange="previewImage(this)">
                <input type="text" name="images[${imageIndex}][caption]" placeholder="وصف الصورة" class="form-control">
                <img class="image-preview" alt="معاينة الصورة">
                <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
            `;
            container.appendChild(newInput);
            imageIndex++;
        }

        function addServiceInput() {
            const container = document.getElementById('service-inputs');
            const newInput = document.createElement('div');
            newInput.className = 'dynamic-input-group';
            newInput.innerHTML = `
                <input type="text" name="services[${serviceIndex}]" placeholder="مثل: تصميم معماري" class="form-control">
                <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
            `;
            container.appendChild(newInput);
            serviceIndex++;
        }

        function addProjectInput() {
            const container = document.getElementById('project-inputs');
            const newInput = document.createElement('div');
            newInput.className = 'dynamic-input-group';
            newInput.innerHTML = `
                <input type="text" name="projects[${projectIndex}][name]" placeholder="اسم المشروع" class="form-control">
                <textarea name="projects[${projectIndex}][description]" placeholder="وصف المشروع" class="form-control" rows="3"></textarea>
                <input type="file" name="projects[${projectIndex}][image]" accept="image/*" class="form-control image-file" onchange="previewImage(this)">
                <img class="image-preview" alt="معاينة الصورة">
                <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
            `;
            container.appendChild(newInput);
            projectIndex++;
        }

        function addCertificationInput() {
            const container = document.getElementById('certification-inputs');
            const newInput = document.createElement('div');
            newInput.className = 'dynamic-input-group';
            newInput.innerHTML = `
                <input type="text" name="certifications[${certificationIndex}][name]" placeholder="اسم الشهادة" class="form-control">
                <input type="text" name="certifications[${certificationIndex}][issuer]" placeholder="الجهة المانحة" class="form-control">
                <input type="number" name="certifications[${certificationIndex}][year]" placeholder="سنة الحصول" class="form-control" min="1900" max="{{ date('Y') }}">
                <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
            `;
            container.appendChild(newInput);
            certificationIndex++;
        }

        function addTeamInput() {
            const container = document.getElementById('team-inputs');
            const newInput = document.createElement('div');
            newInput.className = 'dynamic-input-group';
            newInput.innerHTML = `
                <input type="text" name="team[${teamIndex}][name]" placeholder="اسم العضو" class="form-control">
                <input type="text" name="team[${teamIndex}][position]" placeholder="المنصب" class="form-control">
                <i class="fas fa-trash remove-input" onclick="removeInput(this)"></i>
            `;
            container.appendChild(newInput);
            teamIndex++;
        }

        function removeInput(element) {
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
    </script>
</body>
</html>


@endsection --}}


@extends('layouts.app')

@section('title', 'إضافة شركة هندسية')

@section('content')
<div class="container mt-5">
    <h1>إضافة شركة هندسية</h1>
    <form action="{{ route('engineering_companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم الشركة</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">المدينة</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">الإيميل</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">الموقع الإلكتروني</label>
            <input type="url" name="website" id="website" class="form-control">
        </div>
        <div class="mb-3">
            <label for="years_experience" class="form-label">سنوات الخبرة</label>
            <input type="number" name="years_experience" id="years_experience" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">صورة الشركة</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div>
@endsection