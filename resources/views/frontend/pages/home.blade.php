@extends('frontend.layouts.app')

@section('title', 'Washingtone Oruko | Corporate MC, Life Coach & Author - Nairobi, Kenya')
@section('meta_description',
    'Washingtone Oruko - Corporate MC with 10+ years experience, Life Coach, Author of Realign
    Your Compass, and Team Building Facilitator based in Nairobi, Kenya.')
@section('og_title', 'Washingtone Oruko | Corporate MC & Life Coach')

@section('content')

    {{-- ================================================
HERO - Carousel
================================================ --}}
    <section data-aos="fade-up" data-aos-duration="1000">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">

                @php
                    $slides = [
                        [
                            'img' => 'washintone-event-mc-in-action.jpg',
                            'label' => '7 Years of Experience',
                            'line1' => 'Your Event Deserves',
                            'line2' => 'the Best',
                            'accent' => 'MC',
                            'desc' =>
                                'Energetic, professional and unforgettable - Washingtone turns every event into an experience.',
                            'cta' => 'Book Washingtone',
                            'cta_link' => 'contact.index',
                        ],
                        [
                            'img' => 'washingtone-doing-team-building.jpg',
                            'label' => '70+ Corporate Sessions',
                            'line1' => 'Transform Your Team.',
                            'line2' => 'Elevate Your',
                            'accent' => 'Results.',
                            'desc' => 'Over 70 corporate team building sessions that produce real, measurable change.',
                            'cta' => 'Book Washingtone',
                            'cta_link' => 'contact.index',
                        ],
                        [
                            'img' => 'washingtone-oruko-on-stage-singing-3-main.jpg',
                            'label' => 'Life Coach · Author · Speaker',
                            'line1' => 'I am Here',
                            'line2' => 'To Make Your',
                            'accent' => 'Day',
                            'desc' =>
                                'Author of Realign Your Compass - helping individuals discover purpose, clarity and direction.',
                            'cta' => 'My Biography',
                            'cta_link' => 'biography',
                        ],
                    ];
                @endphp

                @foreach ($slides as $index => $slide)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="container py-5">
                            <div class="row align-items-center min-vh-75 g-4 py-4">

                                {{-- Left: Text --}}
                                <div class="col-12 col-lg-6">
                                    <p class="text-uppercase fw-bold text-secondary small ls-wider mb-3">
                                        {{ $slide['label'] }}
                                    </p>
                                    <h1 class="display-5 fw-bold text-dark mb-3">
                                        {{ $slide['line1'] }}<br>
                                        {{ $slide['line2'] }}
                                        <span class="text-primary">{{ $slide['accent'] }}</span>
                                    </h1>
                                    <hr class="border-primary border-2 opacity-100 w-25 ms-0 mb-3">
                                    <p class="text-muted fs-6 mb-4 pe-lg-5">
                                        {{ $slide['desc'] }}
                                    </p>
                                    <a href="{{ route($slide['cta_link']) }}"
                                        class="btn btn-primary btn-lg px-4 fw-semibold">
                                        {{ $slide['cta'] }}
                                    </a>
                                </div>

                                {{-- Right: Circular Image --}}
                                <div class="col-12 col-lg-6 d-flex justify-content-center">
                                    <img src="{{ asset('images/' . $slide['img']) }}" alt="Washingtone Oruko"
                                        class="rounded-circle object-fit-cover border border-4 border-light shadow"
                                        style="width: 380px; height: 380px;">
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Controls --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    {{-- ================================================
STATS SECTION
================================================ --}}
    <section class="py-5 bg-white overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="badge bg-secondary text-white mb-2 px-3 py-2">10+ Years of Excellence</span>
                    <h2 class="fw-bold text-primary mb-3">One Event at a Time</h2>
                    <p class="text-muted mb-4">
                        From corporate boardrooms to school grounds, Washingtone brings energy, expertise
                        and authentic passion that leaves a lasting impact on every audience he serves.
                    </p>
                    <div class="mb-4">
                        <h1 class="fw-bold display-4 text-secondary counter" data-target="200">0</h1>
                        <p class="text-muted mb-0">Events hosted as Corporate MC</p>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-light">
                                <h3 class="fw-bold text-primary counter" data-target="10">0</h3>
                                <p class="small text-muted mb-0">Years Experience</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-light">
                                <h3 class="fw-bold text-primary counter" data-target="70">0</h3>
                                <p class="small text-muted mb-0">Team Buildings</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-light">
                                <h3 class="fw-bold text-primary counter" data-target="50">0</h3>
                                <p class="small text-muted mb-0">Workshops Hosted</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-primary text-white">
                                <h3 class="fw-bold text-warning">1,000+</h3>
                                <p class="small text-white-75 mb-0">Lives Impacted</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll('.counter');
            let started = false;

            function animateCounters() {
                if (started) return;
                started = true;
                counters.forEach(counter => {
                    const target = parseFloat(counter.dataset.target);
                    let current = 0;
                    const timer = setInterval(() => {
                        current += target / 60;
                        if (current >= target) {
                            counter.innerText = Math.ceil(target) + '+';
                            clearInterval(timer);
                        } else {
                            counter.innerText = Math.floor(current);
                        }
                    }, 25);
                });
            }
            const observer = new IntersectionObserver(e => {
                if (e[0].isIntersecting) animateCounters();
            }, {
                threshold: 0.3
            });
            if (document.querySelector('.counter')) observer.observe(document.querySelector('.counter').closest(
                'section'));
        });
    </script>

    {{-- ================================================
SERVICES PREVIEW
================================================ --}}
    <section class="py-5 bg-light overflow-hidden" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary text-white mb-2 px-3 py-2">What I Do</span>
                <h2 class="fw-bold text-primary">My Services</h2>
                <p class="text-muted">Professional services delivered with passion and excellence</p>
            </div>
            <div class="row g-4">
                @forelse($services as $service)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="text-decoration-none text-dark h-100">
                            <div class="card border-0 shadow-sm h-100 service-card" style="transition:.3s;">
                                @if ($service->image)
                                    <img src="{{ asset('uploads/services/' . $service->image) }}" class="card-img-top"
                                        style="height:200px; object-fit:cover;">
                                @else
                                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center"
                                        style="height:200px;">
                                        <i class="{{ $service->icon ?? 'fas fa-star' }} fa-4x text-warning"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h6 class="fw-bold mb-2">{{ $service->title }}</h6>
                                    <p class="small text-muted mb-0">
                                        {{ Str::limit(strip_tags($service->short_description ?? $service->description), 90) }}
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pb-3">
                                    <span class="text-primary fw-semibold small">Learn More <i
                                            class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Services coming soon.</div>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('services.index') }}" class="btn btn-primary px-5 rounded-pill">View All Services</a>
            </div>
        </div>
    </section>

    {{-- ================================================
ABOUT SNIPPET
================================================ --}}
    <section class="py-5 bg-white overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="{{ asset('images/washingtone-oruko-in-black.jpg') }}" class="img-fluid rounded shadow"
                            style="width:100%; object-fit:cover; max-height:480px;">
                        <div class="position-absolute bottom-0 start-0 bg-warning text-dark p-3 rounded-end"
                            style="margin-bottom:30px;">
                            <strong class="d-block">Author</strong>
                            <small>Realign Your Compass</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="badge bg-primary text-white mb-3 px-3 py-2">About Washingtone</span>
                    <h2 class="fw-bold text-primary mb-3">A Dynamic Force for Transformation</h2>
                    <p class="text-muted mb-3">
                        Born on October 17, 1989, Washingtone Oduor Oruko is one of Kenya's most electrifying
                        personalities - a Corporate MC, Life Coach, Author, Theatre Director and Team Building Facilitator
                        who has dedicated his life to transforming others.
                    </p>
                    <p class="text-muted mb-4">
                        His philosophy is simple: <em>"The more we work on ourselves, the better our chances of
                            success."</em>
                        This conviction drives everything he does - on stage, in boardrooms, and through the pages of his
                        book.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('biography') }}" class="btn btn-primary px-4 rounded-pill">Full Biography</a>
                        <a href="{{ route('store.index') }}" class="btn btn-outline-warning px-4 rounded-pill">
                            <i class="fas fa-book me-2"></i>Get My Book
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================
CLIENTS WE HAVE SERVED
================================================ --}}
    <section class="py-5 bg-light overflow-hidden" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary text-white mb-2 px-3 py-2">Trusted By</span>
                <h2 class="fw-bold text-primary">Clients We Have Served</h2>
                <p class="text-muted">Trusted by schools, corporates, churches and institutions across Kenya</p>
            </div>

            @php
                $clients = [
                    ['img' => 'client-logo-kcb-bank.jpg', 'name' => 'KCB Bank'],
                    ['img' => 'client-logo-stima-sacco.jpg', 'name' => 'Stima Sacco'],
                    ['img' => 'client-logo-kenya-utalii-college.jpg', 'name' => 'Kenya Utalii College'],
                    ['img' => 'client-logo-kabete-national-polytechnic.jpg', 'name' => 'Kabete National Polytechnic'],
                    ['img' => 'client-logo-quest-holdings.jpg', 'name' => 'Quest Holdings'],
                    ['img' => 'client-logo-izwe-africa.jpg', 'name' => 'Izwe Africa'],
                    ['img' => 'client-logo-olsupat-lodge.jpg', 'name' => 'Olsupat Lodge'],
                    ['img' => 'client-logo-zeteck-university.jpg', 'name' => 'Zeteck University'],
                    ['img' => 'client-logo-rock-solid-academy.jpg', 'name' => 'Rock Solid Academy'],
                    ['img' => 'client-logo-precious-gem-school.jpg', 'name' => 'Precious Gem School'],
                    ['img' => 'client-logo-mountain-view-school.jpg', 'name' => 'Mountain View School'],
                    ['img' => 'client-logo-accurate-schools.jpg', 'name' => 'Accurate Schools'],
                    ['img' => 'client-logo-passion-yangu.jpg', 'name' => 'Passion Yangu'],
                    ['img' => 'client-logo-batanique-naturelle.jpg', 'name' => 'Batanique Naturelle'],
                    ['img' => 'client-logo-telesky.jpg', 'name' => 'Telesky'],
                    ['img' => 'client-logo-hardi.jpg', 'name' => 'Hardi'],
                    ['img' => 'client-logo-anns-yummy-bakes.jpg', 'name' => "Ann's Yummy Bakes"],
                ];
                $chunks = array_chunk($clients, 5);
            @endphp

            {{-- Desktop carousel --}}
            <div id="clientsCarousel" class="carousel slide d-none d-md-block" data-bs-ride="carousel"
                data-bs-interval="3000">
                <div class="carousel-inner">
                    @foreach ($chunks as $ci => $chunk)
                        <div class="carousel-item {{ $ci === 0 ? 'active' : '' }}">
                            <div class="row g-3 justify-content-center">
                                @foreach ($chunk as $client)
                                    <div class="col-md-2 col-4">
                                        <div class="p-3 bg-white rounded shadow-sm d-flex align-items-center justify-content-center"
                                            style="height:80px;">
                                            <img src="{{ asset('images/' . $client['img']) }}"
                                                alt="{{ $client['name'] }}"
                                                style="max-height:55px; max-width:100%; object-fit:contain;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="carousel-indicators position-relative mt-3">
                    @foreach ($chunks as $ci => $c)
                        <button type="button" data-bs-target="#clientsCarousel" data-bs-slide-to="{{ $ci }}"
                            class="{{ $ci === 0 ? 'active' : '' }} bg-primary"></button>
                    @endforeach
                </div>
            </div>

            {{-- Mobile scroll --}}
            <div class="d-md-none position-relative">
                <button onclick="scrollClients(-1)"
                    class="btn btn-outline-primary btn-sm position-absolute start-0 top-50 translate-middle-y z-1">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div id="mobileClientsRow" class="d-flex flex-nowrap gap-3 px-4"
                    style="overflow-x:auto;scrollbar-width:none;">
                    @foreach ($clients as $client)
                        <div class="flex-shrink-0" style="width:130px;">
                            <div class="p-2 bg-white rounded shadow-sm d-flex align-items-center justify-content-center"
                                style="height:75px;">
                                <img src="{{ asset('images/' . $client['img']) }}" alt="{{ $client['name'] }}"
                                    style="max-height:50px;max-width:100%;object-fit:contain;">
                            </div>
                        </div>
                    @endforeach
                </div>
                <button onclick="scrollClients(1)"
                    class="btn btn-outline-primary btn-sm position-absolute end-0 top-50 translate-middle-y z-1">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <script>
                function scrollClients(d) {
                    document.getElementById('mobileClientsRow').scrollBy({
                        left: d * 150,
                        behavior: 'smooth'
                    });
                }
            </script>
        </div>
    </section>

    {{-- ================================================
RATE CARD TEASER (Featured Packages)
================================================ --}}
    @if ($packages->count())
        <section class="py-5 bg-primary overflow-hidden" data-aos="fade-up">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-warning text-dark mb-2 px-3 py-2">Transparent Pricing</span>
                    <h2 class="fw-bold text-white">Rate Card Highlights</h2>
                    <p class="text-white-75">Clear, competitive pricing for every occasion</p>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach ($packages as $pkg)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div
                                class="card border-0 shadow h-100 {{ $pkg->is_featured ? 'border-warning border-2' : '' }}">
                                @if ($pkg->is_featured)
                                    <div class="card-header bg-warning text-dark text-center fw-bold py-2">⭐ Most Popular
                                    </div>
                                @endif
                                <div class="card-body text-center p-4">
                                    <small class="text-muted text-uppercase fw-semibold">{{ $pkg->category }}</small>
                                    <h5 class="fw-bold mt-2 mb-1">{{ $pkg->title }}</h5>
                                    <div class="display-6 fw-bold text-primary my-3">
                                        KES {{ number_format($pkg->price) }}
                                        @if ($pkg->price_suffix)
                                            <small class="fs-6 text-muted">/ {{ $pkg->price_suffix }}</small>
                                        @endif
                                    </div>
                                    @if ($pkg->description)
                                        <p class="text-muted small">{{ $pkg->description }}</p>
                                    @endif
                                </div>
                                <div class="card-footer bg-transparent border-0 text-center pb-4">
                                    <a href="{{ route('contact.index') }}" class="btn btn-primary px-4 rounded-pill">Book
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('rate-card') }}" class="btn btn-warning btn-lg px-5 rounded-pill fw-semibold">View
                        Full Rate Card</a>
                </div>
            </div>
        </section>
    @endif

    {{-- ================================================
GALLERY PREVIEW
================================================ --}}
    @if ($gallery->count())
        <section class="py-5 bg-white overflow-hidden" data-aos="fade-up">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-primary text-white mb-2 px-3 py-2">Moments</span>
                    <h2 class="fw-bold text-primary">Gallery</h2>
                    <p class="text-muted">A glimpse into Washingtone's world</p>
                </div>
                <div class="row g-2">
                    @foreach ($gallery->take(8) as $img)
                        <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                            <a href="{{ route('gallery.index') }}">
                                <img src="{{ asset('uploads/gallery/' . $img->image) }}" class="img-fluid w-100 rounded"
                                    style="height:180px; object-fit:cover;" alt="{{ $img->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary px-5 rounded-pill">View Full
                        Gallery</a>
                </div>
            </div>
        </section>
    @endif

    {{-- ================================================
AWARDS & RECOGNITION
================================================ --}}
    <section class="py-5 bg-light overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2">Recognition</span>
                    <h2 class="fw-bold text-primary mb-3">Awards & Achievements</h2>
                    <p class="text-muted mb-3">
                        Washingtone's commitment to excellence has been recognized with multiple awards across
                        the entertainment, personal development and corporate facilitation space.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-trophy text-warning fa-lg me-3 mt-1"></i>
                            <div><strong>Best Corporate MC</strong><br><small class="text-muted">Consistently rated the
                                    best in service delivery</small></div>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-medal text-warning fa-lg me-3 mt-1"></i>
                            <div><strong>Published Author</strong><br><small class="text-muted">Author of Realign Your
                                    Compass - a life-changing self-help book</small></div>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-star text-warning fa-lg me-3 mt-1"></i>
                            <div><strong>National Theatre Facilitator</strong><br><small class="text-muted">Dance classes
                                    at Kenya National Theatre for kids, youth and adults</small></div>
                        </li>
                    </ul>
                    <a href="{{ route('biography') }}" class="btn btn-primary px-4 rounded-pill">Read Full Story</a>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('images/all-washingtone-awards-presents-holding-them.jpg') }}"
                        class="img-fluid rounded shadow" style="width:100%;object-fit:cover;max-height:440px;"
                        alt="Washingtone Oruko Awards">
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================
BLOG PREVIEW
================================================ --}}
    @if ($blogs->count())
        <section class="py-5 bg-white overflow-hidden" data-aos="fade-up">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-primary text-white mb-2 px-3 py-2">Insights</span>
                    <h2 class="fw-bold text-primary">Latest from the Blog</h2>
                </div>
                <div class="row g-4">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                                <div class="card border-0 shadow-sm h-100">
                                    @if ($blog->featured_image)
                                        <img src="{{ asset('uploads/blogs/' . $blog->featured_image) }}"
                                            class="card-img-top" style="height:200px; object-fit:cover;">
                                    @else
                                        <div class="card-img-top bg-primary d-flex align-items-center justify-content-center"
                                            style="height:200px;">
                                            <i class="fas fa-pen-nib fa-3x text-warning"></i>
                                        </div>
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        @if ($blog->category)
                                            <span
                                                class="badge bg-primary text-white mb-2 align-self-start">{{ $blog->category->name }}</span>
                                        @endif
                                        <h6 class="fw-bold mb-2">{{ $blog->title }}</h6>
                                        <p class="small text-muted mb-3">{{ Str::limit(strip_tags($blog->content), 100) }}
                                        </p>
                                        <div class="mt-auto">
                                            <span class="btn btn-sm btn-outline-primary rounded-pill">Read More →</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline-primary px-5 rounded-pill">View All
                        Posts</a>
                </div>
            </div>
        </section>
    @endif

    @include('frontend.partials.cta')

@endsection
