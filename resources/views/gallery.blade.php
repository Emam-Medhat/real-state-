<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معرض الصور</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .image-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .image-card:hover {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .image-info {
            padding: 15px;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>معرض الصور</h1>
            <a href="{{ route('upload.form') }}" class="btn btn-primary">رفع صورة جديدة</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(count($images) > 0)
            <div class="gallery">
                @foreach($images as $image)
                    <div class="image-card">
                        <img src="{{ $image['url'] }}" class="w-100" style="height: 200px; object-fit: cover;">
                        <div class="image-info">
                            <h6>{{ Str::limit($image['name'], 20) }}</h6>
                            <small class="text-muted d-block">الحجم: {{ $image['size'] }}</small>
                            <small class="text-muted d-block">آخر تعديل: {{ $image['modified'] }}</small>
                            <form action="{{ route('images.delete', $image['name']) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="alert alert-info">
                    لا توجد صور متاحة حالياً
                </div>
                <a href="{{ route('upload.form') }}" class="btn btn-primary">رفع أول صورة</a>
            </div>
        @endif
    </div>
</body>
</html>