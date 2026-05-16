@extends('frontend.layouts.app')
@section('title', 'Blog | Washingtone Oruko')
@section('meta_description', 'Insights on personal development, leadership, and event management from Washingtone Oruko.')
@section('content')
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-90"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">Blog</h1>
        <p class="text-white-75">Insights from Washingtone Oruko</p>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">Blog</li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            @forelse($blogs as $blog)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 6) * 100 }}">
                <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm h-100">
                        @if($blog->featured_image)
                        <img src="{{ asset('uploads/blogs/' . $blog->featured_image) }}" class="card-img-top" style="height:210px;object-fit:cover;">
                        @else
                        <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height:210px;"><i class="fas fa-pen-nib fa-3x text-warning"></i></div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            @if($blog->category)<span class="badge bg-primary mb-2 align-self-start">{{ $blog->category->name }}</span>@endif
                            <h6 class="fw-bold mb-2">{{ $blog->title }}</h6>
                            <p class="small text-muted mb-3">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="btn btn-sm btn-outline-primary rounded-pill">Read More →</span>
                                <small class="text-muted">{{ $blog->published_at?->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted"><i class="fas fa-pen-nib fa-3x mb-3 d-block"></i><h5>No blog posts yet.</h5></div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">{{ $blogs->links() }}</div>
    </div>
</section>
@include('frontend.partials.cta')
@endsection
