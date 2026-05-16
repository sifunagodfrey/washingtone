@extends('frontend.layouts.app')
@section('title', 'Biography | Washingtone Oduor Oruko')
@section('meta_description',
    'Learn about Washingtone Oduor Oruko — Corporate MC, Life Coach, Author of Realign Your
    Compass, and Team Building Facilitator from Nairobi, Kenya.')

@section('content')

    {{-- Page Header --}}
    <section class="position-relative overflow-hidden py-5 bg-primary text-white" data-aos="fade-down">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('images/washintone-in-black-speaking-on-mic.jpg') }}"
                class="w-100 h-100 object-fit-cover opacity-20" alt="">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
        <div class="container position-relative text-center py-4">
            <h1 class="fw-bold display-5 mb-2">Biography</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
                    <li class="breadcrumb-item active text-white">Biography</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Main Bio --}}
    <section class="py-5 bg-white overflow-hidden">
        <div class="container">
            <div class="row align-items-start g-5">
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="{{ asset('images/washingtone-oruko-in-black.jpg') }}"
                            class="img-fluid rounded shadow w-100" style="object-fit:cover; max-height:520px;"
                            alt="Washingtone Oruko">
                        <div class="card border-0 shadow-sm mt-3">
                            <div class="card-body text-center py-4">
                                <h5 class="fw-bold mb-1">Washingtone Oduor Oruko</h5>
                                <p class="text-muted small mb-3">Corporate MC · Life Coach · Author · Facilitator</p>
                                @php
                                    $settings = \App\Models\Setting::first();
                                    $wa = preg_replace('/[^0-9]/', '', $settings->whatsapp_number ?? '254700000000');
                                @endphp
                                <a href="https://wa.me/{{ $wa }}" target="_blank"
                                    class="btn btn-success rounded-pill btn-sm px-4">
                                    <i class="fab fa-whatsapp me-1"></i> WhatsApp Me
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-left">
                    @if ($page->content)
                        <div class="prose">{!! $page->content !!}</div>
                    @else
                        <h2 class="fw-bold text-primary mb-4">About Washingtone</h2>
                        <p class="text-muted">Washingtone Oduor Oruko, born on the 17th day of October, 1989, is a young
                            dynamic Kenyan, best known for his charismatic personality in personal development. He is an
                            author and self-help life coach passionate about impacting, uplifting and helping people become
                            better while transforming their lives.</p>
                        <p class="text-muted">Being a theatrical writer, director and choreographer, he has played major
                            roles in shaping and transforming the lives of young teens through his works of art.</p>
                        <p class="text-muted">Washingtone is a corporate MC, a team building facilitator and a workplace
                            wellness coach. He helps companies by inspiring, motivating and uplifting the morale of their
                            employees, thereby positioning them to be proficient and efficient in discharging their duties,
                            thus improving the overall performance and maximum productivity of every team member.</p>
                    @endif

                    {{-- Skills --}}
                    <h4 class="fw-bold text-primary mt-4 mb-3">Core Skills</h4>
                    <div class="row g-2">
                        @foreach (['Public Speaking & Articulation', 'Event Coordination & Direction', 'Creative Program Development', 'Expert Negotiator', 'Team Building Facilitation', 'Stage Script Writing & Direction', 'Dance Choreography', 'Critical & Problem Solving'] as $skill)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-check-circle text-primary"></i>
                                    <span class="small">{{ $skill }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Education --}}
                    <h4 class="fw-bold text-primary mt-4 mb-3">Education</h4>
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <i class="fas fa-graduation-cap text-warning fa-lg mt-1"></i>
                        <div>
                            <strong>Diploma in Business Management</strong><br>
                            <small class="text-muted">St. Paul's University, Kenya</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Photo Grid --}}
    <section class="py-5 bg-light overflow-hidden" data-aos="fade-up">
        <div class="container">
            <h3 class="fw-bold text-primary text-center mb-4">Washingtone in Action</h3>
            <div class="row g-2">
                @foreach (['washintone-event-mc-in-action.jpg', 'washingtone-doing-team-building.jpg', 'washintone-stage-direction-award-main-image.jpg', 'washingtone-receiving-awards.jpg', 'washingtone-talks-in-highschool.jpg', 'washingtone-dancing-with-people-in-blue.jpg'] as $img)
                    <div class="col-6 col-md-4 col-lg-2">
                        <img src="{{ asset('images/' . $img) }}" class="img-fluid rounded w-100"
                            style="height:160px;object-fit:cover;" alt="Washingtone Oruko">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.partials.cta')
@endsection
