@extends('frontend.layouts.app')
@section('title', 'Gallery | Washingtone Oruko')
@section('meta_description', 'Photo gallery of Washingtone Oruko — Corporate MC, Team Building, Dance and more.')

@section('content')
    <section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('images/washingtone-happy-team-building-2.jpg') }}"
                class="w-100 h-100 object-fit-cover opacity-20" alt="">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
        <div class="container position-relative text-center py-4">
            <h1 class="fw-bold display-5 mb-2">Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
                    <li class="breadcrumb-item active text-white">Gallery</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">

            {{-- Category Filter --}}
            @if ($categories->count())
                <div class="d-flex flex-wrap gap-2 justify-content-center mb-4" data-aos="fade-up">
                    <button class="btn btn-primary rounded-pill px-4 filter-btn active" data-filter="all">All</button>
                    @foreach ($categories as $cat)
                        <button class="btn btn-outline-primary rounded-pill px-4 filter-btn"
                            data-filter="{{ Str::slug($cat) }}">{{ $cat }}</button>
                    @endforeach
                </div>
            @endif

            {{-- Gallery Grid --}}
            <div class="row g-3" id="galleryGrid">
                @forelse($images as $img)
                    <div class="col-6 col-md-4 col-lg-3 gallery-item" data-category="{{ Str::slug($img->category) }}"
                        data-aos="zoom-in" data-aos-delay="{{ ($loop->index % 8) * 50 }}">

                        <a href="#" data-bs-toggle="modal" data-bs-target="#imgModal{{ $img->id }}">
                            <div class="position-relative overflow-hidden rounded shadow-sm gallery-thumb">
                                <img src="{{ asset('uploads/gallery/' . $img->image) }}" class="img-fluid w-100"
                                    style="height:200px; object-fit:cover;" alt="{{ $img->title }}">
                                <div
                                    class="position-absolute top-0 start-0 w-100 h-100 bg-dark gallery-overlay
                                    d-flex align-items-center justify-content-center">
                                    <i class="fas fa-expand-alt text-white fa-2x"></i>
                                </div>
                            </div>
                        </a>

                        @if ($img->title)
                            <p class="small text-muted mt-1 mb-0 text-center">{{ $img->title }}</p>
                        @endif

                        {{-- Lightbox Modal --}}
                        <div class="modal fade" id="imgModal{{ $img->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0" style="background:rgba(0,0,0,.85);">
                                    <div class="modal-header border-0 pb-0">
                                        <button type="button" class="btn-close btn-close-white ms-auto"
                                            data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center px-3 pb-3">
                                        <img src="{{ asset('uploads/gallery/' . $img->image) }}" class="img-fluid rounded"
                                            style="max-height:75vh; object-fit:contain;" alt="{{ $img->title }}">
                                        @if ($img->title)
                                            <p class="text-white mt-3 mb-0 fw-semibold">{{ $img->title }}</p>
                                        @endif
                                        @if ($img->category)
                                            <span class="badge bg-primary mt-1">{{ $img->category }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fas fa-images fa-3x mb-3 d-block"></i>
                        <h5>Gallery images coming soon.</h5>
                    </div>
                @endforelse
            </div>

            {{-- Pagination — uses custom partial (no giant arrows) --}}
            <div class="mt-5">
                {{ $images->links('frontend.partials.pagination') }}
            </div>

        </div>
    </section>

    @include('frontend.partials.cta')
@endsection

@section('styles')
    <style>
        .gallery-thumb {
            cursor: pointer;
        }

        .gallery-thumb .gallery-overlay {
            opacity: 0;
            transition: opacity .25s ease;
        }

        .gallery-thumb:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-thumb img {
            transition: transform .3s ease;
        }

        .gallery-thumb:hover img {
            transform: scale(1.05);
        }

        .filter-btn.active {
            background-color: var(--bs-primary) !important;
            color: #fff !important;
            border-color: var(--bs-primary) !important;
        }

        .filter-btn:not(.active):hover {
            background-color: var(--bs-primary);
            color: #fff;
        }

        /* Clean pagination — kill any stray large icon sizing */
        .pagination .page-link {
            font-size: .875rem;
            padding: .4rem .75rem;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active', 'btn-primary');
                    b.classList.add('btn-outline-primary');
                });
                this.classList.add('active', 'btn-primary');
                this.classList.remove('btn-outline-primary');

                const filter = this.dataset.filter;
                document.querySelectorAll('.gallery-item').forEach(item => {
                    item.style.display =
                        (filter === 'all' || item.dataset.category === filter) ? '' : 'none';
                });
            });
        });
    </script>
@endsection
