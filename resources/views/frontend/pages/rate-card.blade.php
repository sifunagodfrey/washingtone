@extends('frontend.layouts.app')
@section('title', 'Rate Card | Washingtone Oruko — Pricing & Packages')
@section('meta_description', 'Transparent pricing for Washingtone Oruko services — MC, Team Building, Dance Classes and more. View packages and book today.')

@section('content')
{{-- Header --}}
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <img src="{{ asset('images/washingtone-mc-with-white.jpg') }}" class="w-100 h-100 object-fit-cover opacity-20" alt="">
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">Rate Card</h1>
        <p class="text-white-75 mb-0">Transparent, competitive pricing for every occasion</p>
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
                <li class="breadcrumb-item active text-white">Rate Card</li>
            </ol>
        </nav>
    </div>
</section>

{{-- Packages --}}
<section class="py-5 bg-light">
    <div class="container">
        @foreach($packages as $category => $pkgs)
        <div class="mb-5" data-aos="fade-up">
            <h3 class="fw-bold text-primary mb-1 text-center">{{ $category }}</h3>
            <div class="text-center mb-4"><span class="d-inline-block bg-warning rounded" style="height:3px;width:60px;"></span></div>
            <div class="row g-4 justify-content-center">
                @foreach($pkgs as $pkg)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card border-0 shadow h-100 {{ $pkg->is_featured ? 'border border-warning border-2' : '' }}">
                        @if($pkg->is_featured)
                        <div class="card-header bg-warning text-dark text-center fw-bold py-2 rounded-top">⭐ Most Popular</div>
                        @endif
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-1">{{ $pkg->title }}</h5>
                            @if($pkg->description)
                            <p class="text-muted small mb-3">{{ $pkg->description }}</p>
                            @endif
                            <div class="display-6 fw-bold text-primary mb-3">
                                KES {{ number_format($pkg->price) }}
                                @if($pkg->price_suffix)<div class="fs-6 fw-normal text-muted">{{ $pkg->price_suffix }}</div>@endif
                            </div>
                            @if($pkg->features)
                            <ul class="list-unstyled mb-0">
                                @foreach($pkg->features as $feature)
                                <li class="d-flex align-items-center gap-2 mb-2">
                                    <i class="fas fa-check-circle text-success small"></i>
                                    <span class="small">{{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-4 text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary rounded-pill px-4">Book This Package</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="alert alert-info text-center mt-3" data-aos="fade-up">
            <i class="fas fa-info-circle me-2"></i>
            All prices are in Kenyan Shillings (KES). Prices may vary depending on event duration, location and specific requirements.
            <br><strong>Contact Washingtone to discuss your event needs.</strong>
        </div>
    </div>
</section>

@include('frontend.partials.cta')
@endsection
