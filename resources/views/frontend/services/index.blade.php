@extends('frontend.layouts.app')
@section('title', 'My Services | Washingtone Oruko')
@section('meta_description', 'Explore all services offered by Washingtone Oruko — Corporate MC, Team Building, Life Coaching, Theatre and more.')
@section('content')
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100"><img src="{{ asset('images/washintone-in-conference-presenting-gift.jpg') }}" class="w-100 h-100 object-fit-cover opacity-20" alt=""></div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">My Services</h1>
        <p class="text-white-75">Professional services delivered with passion and excellence</p>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">Services</li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 6) * 100 }}">
                <a href="{{ route('services.show', $service->slug) }}" class="text-decoration-none text-dark h-100">
                    <div class="card border-0 shadow-sm h-100" style="transition:.3s;">
                        @if($service->image)
                        <img src="{{ asset('uploads/services/' . $service->image) }}" class="card-img-top" style="height:220px;object-fit:cover;">
                        @else
                        <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height:220px;">
                            <i class="{{ $service->icon ?? 'fas fa-star' }} fa-4x text-warning"></i>
                        </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold mb-2">{{ $service->title }}</h5>
                            <p class="text-muted small mb-3">{{ Str::limit(strip_tags($service->short_description ?? $service->description), 110) }}</p>
                            <div class="mt-auto">
                                <span class="btn btn-sm btn-outline-primary rounded-pill">Learn More →</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted"><i class="fas fa-briefcase fa-3x mb-3 d-block"></i><h5>Services coming soon.</h5></div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">{{ $services->links() }}</div>
    </div>
</section>
@include('frontend.partials.cta')
@endsection
