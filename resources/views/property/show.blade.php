@extends('layouts.app')

@section('title', 'تفاصيل العقار')

@section('content')

<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #e74c3c;
        --accent-color: #3498db;
        --light-bg: #f8f9fa;
        --dark-text: #2c3e50;
        --light-text: #7f8c8d;
        --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        --border-radius: 12px;
        --transition: all 0.3s ease;
    }

    .property-details-section {
        padding: 3rem 0;
        background-color: var(--light-bg);
    }

    .property-header {
        text-align: center;
        margin-bottom: 2.5rem;
        position: relative;
    }

    .property-header h1 {
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-size: 2.2rem;
    }

    .property-header .badge {
        background-color: var(--secondary-color);
        font-size: 1rem;
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        position: absolute;
        top: -10px;
        right: 20px;
    }

    .property-image-container {
        position: relative;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        height: 100%;
        transition: var(--transition);
    }

    .property-image-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .property-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .property-details-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--shadow);
        height: 100%;
    }

    .detail-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px dashed #eee;
    }

    .detail-icon {
        width: 40px;
        height: 40px;
        background-color: rgba(52, 152, 219, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 1rem;
        color: var(--accent-color);
        font-size: 1.2rem;
    }

    .detail-label {
        font-weight: 600;
        color: var(--dark-text);
        min-width: 150px;
    }

    .detail-value {
        color: var(--light-text);
        flex-grow: 1;
        text-align: left;
    }

    .price-highlight {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--secondary-color);
    }

    .description-box {
        background-color: #f8f9fa;
        border-left: 4px solid var(--accent-color);
        padding: 1.5rem;
        border-radius: 0 var(--border-radius) var(--border-radius) 0;
        margin: 2rem 0;
    }

    .cta-button {
        background: linear-gradient(135deg, var(--accent-color), #2980b9);
        border: none;
        padding: 12px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(52, 152, 219, 0.6);
    }

    .cta-button i {
        margin-left: 8px;
    }

    .amenities-section {
        margin-top: 2rem;
    }

    .amenity-badge {
        background-color: rgba(46, 204, 113, 0.1);
        color: #2ecc71;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        margin: 0.3rem;
        display: inline-block;
        font-size: 0.9rem;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .gallery img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s;
    }

    .gallery img:hover {
        transform: scale(1.05);
    }

    .status-badge {
        display: inline-block;
        padding: 0.35rem 0.65rem;
        font-size: 0.75rem;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .status-available {
        background-color: #d4edda;
        color: #155724;
    }

    .status-sold {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status-rented {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-pending {
        background-color: #cce5ff;
        color: #004085;
    }

    @media (max-width: 768px) {
        .property-header h1 {
            font-size: 1.8rem;
        }

        .detail-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .detail-icon {
            margin-left: 0;
            margin-bottom: 0.5rem;
        }

        .gallery {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<section class="property-details-section">
    <div class="container">
        <!-- Property Header -->
        <div class="property-header">
            <span class="badge status-{{ $property->status }}">{{ __('properties.status.' . $property->status) }}</span>
            <h1>{{ $property->title }}</h1>
            <p class="text-muted">{{ $property->address }}, {{ $property->neighborhood }}, {{ $property->city }}</p>
        </div>

        <div class="row">
            <!-- Property Image Gallery -->
            <div class="col-lg-7 mb-4">
                <div class="property-image-container">
                    @if($property->image)
                    <div class="property-image-container">
                        <img src="{{ asset('storage/' . $property->image) }}"
                             alt="{{ $property->title }}"
                             class="property-image"
                             style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                @else
                    <img src="{{ asset('images/default-property.jpg') }}"
                         alt="Default property image"
                         class="property-image"
                         style="width: 100%; height: auto; object-fit: cover;">
                @endif
                </div>

                  {{-- @if($property->image)
                    <div class="property-image-container">
                        <img src="{{ asset('storage/' . $property->image) }}"
                             alt="{{ $property->title }}"
                             class="property-image"
                             style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                @else
                    <img src="{{ asset('images/default-property.jpg') }}"
                         alt="Default property image"
                         class="property-image"
                         style="width: 100%; height: auto; object-fit: cover;">
                @endif --}}
            </div>

            <!-- Property Details -->
            <div class="col-lg-5 mb-4">
                <div class="property-details-card">
                    <!-- Price and Type -->
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <span class="detail-label">نوع العرض:</span>
                        <span class="detail-value">
                            <span class="price-highlight">{{ number_format($property->price, 0) }} جنيه</span>
                            <small class="text-muted">({{ $property->type == 'rent' ? 'إيجار' : 'بيع' }})</small>
                        </span>
                    </div>

                    <!-- Basic Details -->
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <span class="detail-label">غرف النوم:</span>
                        <span class="detail-value">{{ $property->bedrooms }}</span>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-bath"></i>
                        </div>
                        <span class="detail-label">الحمامات:</span>
                        <span class="detail-value">{{ $property->bathrooms }}</span>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <span class="detail-label">المساحة:</span>
                        <span class="detail-value">{{ $property->area }} م²</span>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <span class="detail-label">الطابق:</span>
                        <span class="detail-value">
                            {{ $property->floor ?? '--' }}
                            @if($property->total_floors) / {{ $property->total_floors }} @endif
                        </span>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <span class="detail-label">سنة البناء:</span>
                        <span class="detail-value">{{ $property->construction_year ?? '--' }}</span>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-couch"></i>
                        </div>
                        <span class="detail-label">التأثيث:</span>
                        <span class="detail-value">
                            @if($property->furnished == 'furnished')
                                مفروش بالكامل
                            @elseif($property->furnished == 'semi_furnished')
                                شبه مفروش
                            @else
                                غير مفروش
                            @endif
                        </span>
                    </div>

                    <!-- Location Details -->
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="detail-label">الموقع:</span>
                        <span class="detail-value">
                            {{ $property->address }}, {{ $property->neighborhood }}, {{ $property->city }}
                            @if($property->latitude && $property->longitude)
                                <a href="https://maps.google.com/?q={{ $property->latitude }},{{ $property->longitude }}"
                                   target="_blank"
                                   class="text-primary ml-2">
                                    <i class="fas fa-map-marked-alt"></i> عرض على الخريطة
                                </a>
                            @endif
                        </span>
                    </div>

                    <!-- Amenities -->
                    @if($property->amenities)
                    <div class="amenities-section">
                        <h5 class="mb-3"><i class="fas fa-star"></i> المرافق والخدمات:</h5>
                        <div>
                            @foreach(json_decode($property->amenities) as $amenity)
                                <span class="amenity-badge">
                                    <i class="fas fa-{{ $amenityIcons[$amenity] ?? 'check' }}"></i>
                                    {{ __('properties.amenities.' . $amenity) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="description-box">
                    <h4 class="mb-3"><i class="fas fa-align-left"></i> وصف العقار</h4>
                    <p class="lead">{{ $property->description }}</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-5">
            <button class="cta-button mr-3">
                <i class="fas fa-phone-alt"></i> تواصل مع المالك
            </button>
            <a href="{{ url('maintenance_requests/create') }}" class="btn btn-danger"><i class="fas fa-tools me-2"></i> طلب صيانة</a>
            {{-- <button class="cta-button" style="background: linear-gradient(135deg, #2ecc71, #27ae60);">
                <a href="{{ route('property.booking', $property->id) }}" class="btn btn-primary">
                    <i class="fas fa-calendar-check"></i> حجز زيارة
                </a>
            </button> --}}
        </div>
    </div>
</section>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection