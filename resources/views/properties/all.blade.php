@extends('layouts.app')

@section('title', 'جميع العقارات')

@section('content')

<section class="properties-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="fw-bold text-dark mb-3 position-relative d-inline-block">
                <i class="bi bi-house-heart-fill text-primary me-2"></i>
                تصفح عقاراتنا
                <span class="position-absolute bottom-0 start-50 translate-middle-x bg-primary" style="height: 3px; width: 80px;"></span>
            </h2>
            <p class="text-muted lead">اكتشف مجموعة مختارة من أفضل العقارات المناسبة لاحتياجاتك</p>
        </div>
        

        <div class="row g-4">
            @forelse ($properties as $property)
            <div class="col-lg-4 col-md-6">
                <div class="property-card card h-100 border-0 shadow-sm overflow-hidden transition-all">
                    <div class="position-relative property-thumbnail">
                        @if($property->image)
                            <img src="{{ asset('storage/' . $property->image) }}"
                                 alt="{{ $property->title }}"
                                 class="card-img-top property-image w-100">
                        @else
                            <img src="{{ asset('images/default-property.jpg') }}"
                                 alt="Default property image"
                                 class="card-img-top w-100">
                        @endif
                        <div class="property-badge bg-primary text-white px-3 py-2 position-absolute top-0 end-0 m-3 rounded-start-pill">
                            {{ $property->type == 'rent' ? 'للإيجار' : 'للبيع' }}
                            <div class="badge-arrow"></div>
                        </div>
                        <div class="property-price-tag bg-dark text-white px-3 py-2 position-absolute bottom-0 start-0 m-3 rounded-end-pill">
                            {{ number_format($property->price) }} ج.م
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <h3 class="card-title fw-bold mb-2 text-dark">{{ $property->title }}</h3>

                        <div class="location mb-3 d-flex align-items-center">
                            <i class="fas fa-map-marker-alt text-primary me-2 fs-5"></i>
                            <span class="text-muted">{{ $property->city }} - {{ $property->neighborhood }}</span>
                        </div>

                        <div class="property-features d-flex justify-content-between mb-3 py-2 border-top border-bottom">
                            <span class="d-flex flex-column align-items-center">
                                <i class="fas fa-bed text-primary mb-1"></i>
                                <small class="text-dark">{{ $property->bedrooms }} غرف</small>
                            </span>
                            <span class="d-flex flex-column align-items-center">
                                <i class="fas fa-bath text-primary mb-1"></i>
                                <small class="text-dark">{{ $property->bathrooms }} حمام</small>
                            </span>
                            <span class="d-flex flex-column align-items-center">
                                <i class="fas fa-ruler-combined text-primary mb-1"></i>
                                <small class="text-dark">{{ $property->area ?? '--' }} م²</small>
                            </span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="property-date text-muted small">
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ $property->created_at->diffForHumans() }}
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('property.show', $property->id) }}"
                                   class="btn btn-outline-primary btn-sm px-3 rounded-pill">
                                   التفاصيل
                                </a>
                                <a href="{{ url('contact') }}"
                                   class="btn btn-primary btn-sm px-3 rounded-pill">
                                   <i class="fas fa-phone-alt me-1">الدعم الفني</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state text-center py-5 bg-white rounded-3 shadow-sm">
                    <img src="{{ asset('images/no-properties.svg') }}" alt="لا توجد عقارات" class="mb-4" style="height: 180px;">
                    <h4 class="text-muted mb-3">لا توجد عقارات متاحة حالياً</h4>
                    <a href="{{ url('contact') }}" class="btn btn-primary px-4 py-2">
                        <i class="fas fa-envelope me-2"></i> تواصل معنا
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        {{-- @if($properties->hasPages())
        <div class="mt-5">
            {{ $properties->links('vendor.pagination.bootstrap-5') }}
        </div>
        @endif --}}
    </div>
</section>

<style>
    /* Main Styles */
    .properties-section {
        background-color: #f8f9fa;
    }

    /* Property Card */
    .property-card {
        border-radius: 12px;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    /* Property Thumbnail */
    .property-thumbnail {
        height: 220px;
        background-color: #f5f5f5;
    }

    .property-thumbnail img {
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .property-card:hover .property-thumbnail img {
        transform: scale(1.05);
    }

    /* Property Badge - Updated Style */
    .property-badge {
        font-size: 0.9rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
    }

    .badge-arrow {
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-top: 8px solid #0d6efd;
        position: absolute;
        bottom: -8px;
        right: 0;
    }

    /* Price Tag */
    .property-price-tag {
        font-weight: 600;
        z-index: 2;
    }

    /* Empty State */
    .empty-state {
        background-color: white;
    }

    /* Features Icons */
    .property-features span {
        flex: 1;
        text-align: center;
    }

    /* Responsive Adjustments */
    @media (max-width: 767.98px) {
        .property-thumbnail {
            height: 180px;
        }
    }
</style>

@endsection