@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4895ef;
        --danger-color: #f72585;
        --warning-color: #f8961e;
        --success-color: #4cc9f0;
        --dark-color: #1a1a2e;
        --light-color: #f8f9fa;
        --border-radius: 12px;
        --box-shadow: 0 6px 20px rgba(67, 97, 238, 0.1);
    }

    body {
        font-family: 'Tajawal', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        color: var(--dark-color);
    }

    .search-results-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .search-title {
        font-weight: 900;
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 30px;
        position: relative;
        text-align: right;
        text-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .search-title::after {
        content: "";
        position: absolute;
        right: 0;
        bottom: -8px;
        width: 60px;
        height: 4px;
        background: var(--accent-color);
        border-radius: 3px;
    }

    .property-card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        transition: all 0.3s ease;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(67, 97, 238, 0.15);
    }

    .property-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-top-right-radius: var(--border-radius);
        border-top-left-radius: var(--border-radius);
    }

    .property-card .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .property-card .card-title {
        font-weight: 700;
        font-size: 1.3rem;
        color: var(--dark-color);
        margin-bottom: 10px;
    }

    .property-card .card-price {
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--primary-color);
    }

    .no-results {
        font-size: 1.2rem;
        color: var(--dark-color);
        text-align: center;
        padding: 40px;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }

    @media (max-width: 992px) {
        .search-title { font-size: 2.2rem; }
        .property-card img { height: 180px; }
    }

    @media (max-width: 768px) {
        .search-results-container { margin: 30px auto; padding: 0 15px; }
        .search-title { font-size: 2rem; }
        .property-card { margin-bottom: 20px; }
        .property-card img { height: 160px; }
    }

    @media (max-width: 576px) {
        .search-title { font-size: 1.8rem; }
        .property-card .card-title { font-size: 1.2rem; }
        .property-card .card-price { font-size: 1rem; }
        .no-results { font-size: 1.1rem; padding: 30px; }
    }
</style>

<div class="search-results-container fade-in">
    <h2 class="search-title">نتائج البحث</h2>
    @if($properties->count())
        <div class="row">
            @foreach($properties as $property)
                <div class="col-md-4 mb-4 fade-in" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                    <div class="property-card">
                        <img src="{{ $property->image ? asset('storage/' . $property->image) : asset('images/default-property.jpg') }}" class="card-img-top" alt="{{ $property->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->title }}</h5>
                            <p class="card-price">{{ number_format($property->price) }} جنيه</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-results fade-in">
            <p>لا توجد نتائج مطابقة.</p>
        </div>
    @endif
</div>
@endsection