@extends('frontend.layouts.app')
@section('title', $service->title . ' | Washingtone Oruko')
@section('meta_description', $service->short_description ?? strip_tags(Str::limit($service->description, 160)))
@section('content')
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-90"></div>
    <div class="container position-relative text-center py-3">
        <h1 class="fw-bold mb-1">{{ $service->title }}</h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}" class="text-warning">Services</a></li>
            <li class="breadcrumb-item active text-white">{{ $service->title }}</li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5" data-aos="fade-right">
                @if($service->image)
                <img src="{{ asset('uploads/services/' . $service->image) }}" class="img-fluid rounded shadow w-100" style="max-height:420px;object-fit:cover;" alt="{{ $service->title }}">
                @else
                <div class="bg-primary rounded d-flex align-items-center justify-content-center shadow" style="height:320px;">
                    <i class="{{ $service->icon ?? 'fas fa-star' }} fa-6x text-warning"></i>
                </div>
                @endif
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <span class="badge bg-primary text-white mb-3 px-3 py-2">Service</span>
                <h2 class="fw-bold text-primary mb-3">{{ $service->title }}</h2>
                @if($service->short_description)<p class="lead text-muted mb-4">{{ $service->short_description }}</p>@endif
                <div class="text-muted mb-4">{!! $service->description !!}</div>
                @if($service->features)
                <h5 class="fw-bold text-primary mt-4 mb-3">What's Included</h5>
                <ul class="list-unstyled">
                    @foreach($service->features as $feature)
                    <li class="d-flex align-items-center gap-2 mb-2"><i class="fas fa-check-circle text-success"></i><span>{{ $feature }}</span></li>
                    @endforeach
                </ul>
                @endif
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary px-4 rounded-pill fw-semibold">Book This Service</a>
                    <a href="{{ route('rate-card') }}" class="btn btn-outline-warning px-4 rounded-pill">View Rate Card</a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.partials.cta')
@endsection
