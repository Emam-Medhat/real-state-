<div class="col-xl-4 col-lg-6 col-md-6 mb-4">
    <div class="company-card card h-100" data-rating="{{ $company->rating ?? 0 }}">
        <div id="carousel-{{ $company->id }}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="text-align: center">
                    <img src="{{ asset('storage/' . $company->image) }}" class="company-img" alt="{{ $company->name }}">
                </div>
            </div>
        </div>
        <div class="card-body pt-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3 class="h5 mb-0">
                    <a href="{{ route('engineering_companies.show', $company->id) }}" class="text-dark text-decoration-none">
                        {{ $company->name }}
                    </a>
                </h3>
            </div>
            <hr class="my-3">
            <div class="mb-3">
                <h6 class="text-muted mb-2">سنوات الخبرة</h6>
                <div class="d-flex align-items-center">
                    <div class="progress flex-grow-1">
                        <div class="progress-bar" role="progressbar" style="width: {{ min(100, ($company->years_experience ?? 0) * 10) }}%" aria-valuenow="{{ $company->years_experience ?? 0 }}" aria-valuemin="0" aria-valuemax="10"></div>
                    </div>
                    <span class="ms-2 fw-bold">{{ $company->years_experience ?? 'غير محدد' }} سنة</span>
                </div>
            </div>
            <div class="mb-3">
                <h6 class="text-muted mb-2">التخصصات</h6>
                <div class="d-flex flex-wrap">
                    @forelse ($company->specializations ?? [] as $spec)
                        <span class="specialization-tag">{{ $spec }}</span>
                    @empty
                        <span class="text-muted small">غير محدد</span>
                    @endforelse
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-1">
                    <h6 class="text-muted mb-0">معدل إنجاز المشاريع</h6>
                    <span class="fw-bold">{{ $company->completion_rate ?? 0 }}%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $company->completion_rate ?? 0 }}%" aria-valuenow="{{ $company->completion_rate ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('engineering_companies.show', $company->id) }}" class="btn btn-outline-primary flex-grow-1 py-2">
                    <i class="fas fa-eye me-1"></i> عرض التفاصيل
                </a>
                <button class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#contactModal" data-company="{{ $company->name }}" data-id="{{ $company->id }}">
                    <i class="fas fa-envelope"></i>
                </button>
            </div>
        </div>
    </div>
</div>