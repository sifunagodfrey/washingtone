{{-- Main Navigation --}}
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top" data-aos="fade-down"
    data-aos-duration="1000">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/washingtone-oruko-logo.png') }}" height="35" alt="Washingtone Oruko">
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#mobileNav" aria-controls="mobileNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- DESKTOP NAV (lg and up only) --}}
        <div class="collapse navbar-collapse d-none d-lg-flex" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('biography') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('biography') }}">Biography</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services*') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('services.index') }}">My Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rate-card') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('rate-card') }}">Rate Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('store*') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('store.index') }}">My Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('videos*') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('videos.index') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery*') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('gallery.index') }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blog*') ? 'text-primary' : 'text-dark' }}"
                        href="{{ route('blog.index') }}">Blog</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary px-4 rounded-pill" href="{{ route('contact.index') }}">Get In Touch</a>
                </li>

            </ul>
        </div>

    </div>
</nav>

{{-- MOBILE Offcanvas (below lg) --}}
{{-- IMPORTANT: <a> tags deliberately have NO data-bs-dismiss —      --}}
{{--            that attribute blocks href navigation on mobile.      --}}
{{--            Navigation is handled by the JS block below instead. --}}
<div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="mobileNav">

    <div class="offcanvas-header border-bottom">
        <a href="{{ route('home') }}" class="text-decoration-none">
            <img src="{{ asset('images/washingtone-oruko-logo.png') }}" height="38" alt="Washingtone Oruko">
        </a>
        {{-- Only the close × button uses data-bs-dismiss --}}
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body px-0">
        <ul class="navbar-nav flex-column px-3 gap-1">

            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('home') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('home') }}">
                    <i class="fas fa-home fa-fw me-2 text-primary opacity-75"></i>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('biography') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('biography') }}">
                    <i class="fas fa-user fa-fw me-2 text-primary opacity-75"></i>Biography
                </a>
            </li>
            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('services*') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('services.index') }}">
                    <i class="fas fa-briefcase fa-fw me-2 text-primary opacity-75"></i>My Services
                </a>
            </li>
            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('rate-card') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('rate-card') }}">
                    <i class="fas fa-tags fa-fw me-2 text-primary opacity-75"></i>Rate Card
                </a>
            </li>
            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('store*') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('store.index') }}">
                    <i class="fas fa-book fa-fw me-2 text-primary opacity-75"></i>My Book
                </a>
            </li>
            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('videos*') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('videos.index') }}">
                    <i class="fab fa-youtube fa-fw me-2 text-primary opacity-75"></i>Videos
                </a>
            </li>
            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('gallery*') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('gallery.index') }}">
                    <i class="fas fa-images fa-fw me-2 text-primary opacity-75"></i>Gallery
                </a>
            </li>
            <li class="nav-item">
                <a class="mobile-nav-link nav-link rounded px-3 py-2 {{ request()->routeIs('blog*') ? 'text-primary fw-semibold bg-primary bg-opacity-10' : 'text-dark' }}"
                    href="{{ route('blog.index') }}">
                    <i class="fas fa-pen-nib fa-fw me-2 text-primary opacity-75"></i>Blog
                </a>
            </li>

            <li class="nav-item mt-3">
                <a class="mobile-nav-link btn btn-primary w-100 rounded-pill py-2" href="{{ route('contact.index') }}">
                    <i class="fas fa-envelope me-2"></i>Get In Touch
                </a>
            </li>

        </ul>
    </div>

</div>

{{-- Mobile nav: close offcanvas first, THEN navigate to href --}}
{{-- This avoids Bootstrap's dismiss handler swallowing the click --}}
<script>
    (function() {
        var offcanvasEl = document.getElementById('mobileNav');
        if (!offcanvasEl) return;

        offcanvasEl.addEventListener('show.bs.offcanvas', function attachLinks() {
            offcanvasEl.querySelectorAll('.mobile-nav-link').forEach(function(link) {
                // Remove any previous listener before adding a new one (safety)
                link.replaceWith(link.cloneNode(true));
            });

            offcanvasEl.querySelectorAll('.mobile-nav-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    var href = this.getAttribute('href');
                    if (!href || href === '#') return;

                    e.preventDefault(); // hold navigation briefly
                    var destination = href;

                    var instance = bootstrap.Offcanvas.getInstance(offcanvasEl);
                    if (instance) {
                        // Navigate as soon as drawer finishes closing
                        offcanvasEl.addEventListener('hidden.bs.offcanvas', function go() {
                            offcanvasEl.removeEventListener('hidden.bs.offcanvas',
                                go);
                            window.location.href = destination;
                        });
                        instance.hide();
                    } else {
                        window.location.href = destination; // fallback
                    }
                });
            });
        });
    })();
</script>
