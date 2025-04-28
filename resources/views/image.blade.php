<div class="gallery">
    @forelse($images as $image)
        <div class="image-card shadow-sm">
            <img src="{{ $image['url'] }}" class="w-100" style="height: 200px; object-fit: cover;">
            <div class="image-info">
                <h6>{{ $image['name'] }}</h6>
                <small class="text-muted d-block">الحجم: {{ $image['size'] }}</small>
                <small class="text-muted d-block">آخر تعديل: {{ $image['modified'] }}</small>
                <form action="{{ route('images.delete', $image['name']) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </form>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">لا توجد صور متاحة</p>
        </div>
    @endforelse
</div>