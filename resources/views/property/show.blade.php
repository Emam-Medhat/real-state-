@extends('layouts.app')

@section('title', 'تفاصيل العقار')

@section('content')
<section class="property-details">
    <div class="container">
        <h2>{{ $property->title }}</h2>

        <!-- Property Info -->
        <div class="property-info">
            <div class="property-image">
                <img 
                    src="{{ asset('img/'.$property->image) }}" 
                    alt="{{ $property->title }}"
                    class="img-fluid"
                >
            </div>

            <!-- Property Details -->
            <div class="details">
                <p><strong>السعر:</strong> {{ $property->price }} جنيه</p>
                <p><strong>الموقع:</strong> {{ $property->location }}</p>
                <p><strong>عدد الغرف:</strong> {{ $property->rooms }}</p>
                <p><strong>عدد الحمامات:</strong> {{ $property->bathrooms }}</p>
                <p><strong>المساحة:</strong> {{ $property->area }} م²</p>
                <p><strong>الوصف:</strong> {{ $property->description }}</p>
                <p><strong>أقرب مكان:</strong> {{ $property->nearest_location }}</p>
                <p><strong>نوع العقار:</strong> {{ $property->property_type }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
