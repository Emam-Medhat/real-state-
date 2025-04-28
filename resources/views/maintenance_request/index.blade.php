@extends('layouts.app')

@section('title', 'طلبات الصيانة')

@section('content')
<style>
    .maintenance-requests-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th, .table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .table th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .btn-view {
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .btn-view:hover {
        background-color: #0056b3;
    }

    .status-pending {
        color: orange;
        font-weight: bold;
    }

    .status-in-progress {
        color: blue;
        font-weight: bold;
    }

    .status-completed {
        color: green;
        font-weight: bold;
    }

    .status-cancelled {
        color: red;
        font-weight: bold;
    }

    .image-preview {
        max-width: 100px;
        margin: 5px auto;
    }
</style>

<div class="maintenance-requests-container">
    <h1 class="section-title">طلبات الصيانة</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>العقار</th>
                <th>نوع المشكلة</th>
                <th>الأهمية</th>
                <th>الحالة</th>
                <th>تاريخ الإنشاء</th>
                <th>صورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $maintenanceRequest)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $maintenanceRequest->property->title ?? 'غير متوفر' }}</td>
                <td>
                    @switch($maintenanceRequest->issue_type)
                        @case('plumbing') مشاكل سباكة @break
                        @case('electrical') مشاكل كهرباء @break
                        @case('structural') مشاكل هيكلية @break
                        @default أخرى
                    @endswitch
                </td>
                <td>
                    @if($maintenanceRequest->priority === 'urgent')
                        <span style="color: red; font-weight: bold;">عاجل</span>
                    @else
                        عادي
                    @endif
                </td>
                <td>
                    @switch($maintenanceRequest->status)
                        @case('pending') <span class="status-pending">قيد المراجعة</span> @break
                        @case('in_progress') <span class="status-in-progress">جاري التنفيذ</span> @break
                        @case('completed') <span class="status-completed">مكتمل</span> @break
                        @case('cancelled') <span class="status-cancelled">ملغي</span> @break
                    @endswitch
                </td>
                <td>{{ $maintenanceRequest->created_at->format('Y-m-d') }}</td>
                <td>
                    @if($maintenanceRequest->images)
                        <img src="{{ asset('storage/' . $maintenanceRequest->images) }}" alt="صورة المشكلة" style="max-width: 300px;">
                    @else
                        <p>لا توجد صورة</p>
                    @endif
                </td>
                <td>
                    {{-- <a href="{{ route('maintenance_requests.show', $maintenanceRequest->id) }}" class="btn-view">عرض التفاصيل</a> --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection