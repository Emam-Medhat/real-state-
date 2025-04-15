@extends('layouts.app')

@section('title', 'بحث عن عقارات')

@section('content')
<section class="search-results">
    <div class="container">
        <h2>نتائج البحث</h2>
        @if(count($properties) > 0)
            <div class="properties-grid">
                @foreach($properties as $property)
                    <div class="property-card">
                        <img src="{{ asset('img/'.$property->image) }}" alt="{{ $property->title }}">
                        <div class="property-info">
                            <h3>{{ $property->title }}</h3>
                            <p>{{ $property->rooms }} غرف • {{ $property->bathrooms }} حمام • {{ $property->area }} م²</p>
                            <p class="price">السعر: {{ $property->price }} جنيه</p>
                            <a href="{{ route('property.show', $property->id) }}" class="details-btn">عرض التفاصيل</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>لا توجد نتائج مطابقة لبحثك.</p>
        @endif
    </div>
</section>
@endsection
