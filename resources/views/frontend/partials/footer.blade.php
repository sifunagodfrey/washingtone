{{-- Footer --}}
@php $settings = \App\Models\Setting::first(); @endphp
<footer class="bg-light border-top" data-aos="fade-up" data-aos-duration="1000">

    {{-- Main Footer Content --}}
    <div class="container py-5">
        <div class="row g-5">

            {{-- Brand --}}
            <div class="col-lg-3 col-md-6">
                <img src="{{ asset('images/washingtone-oruko-logo.png') }}" height="30" alt="Washingtone Oruko"
                    class="mb-3">
                <p class="text-muted small lh-lg">
                    {{ $settings->about_short ?? 'Washingtone Oruko: Corporate MC, Life Coach, Author and Team Building Facilitator passionate about transforming lives across Kenya.' }}
                </p>
                {{-- Social Icons --}}
                <div class="d-flex gap-2 mt-3 flex-wrap">
                    @if ($settings->facebook ?? null)
                        <a href="{{ $settings->facebook }}" target="_blank"
                            class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px; height:36px;">
                            <i class="fab fa-facebook"></i>
                        </a>
                    @endif
                    @if ($settings->instagram ?? null)
                        <a href="{{ $settings->instagram }}" target="_blank"
                            class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px; height:36px;">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    @if ($settings->youtube ?? null)
                        <a href="{{ $settings->youtube }}" target="_blank"
                            class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px; height:36px;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif
                    @if ($settings->tiktok ?? null)
                        <a href="{{ $settings->tiktok }}" target="_blank"
                            class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px; height:36px;">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    @endif
                    @if ($settings->twitter ?? null)
                        <a href="{{ $settings->twitter }}" target="_blank"
                            class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px; height:36px;">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="fw-bold text-dark mb-3 pb-2 border-bottom border-primary border-2">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Home</a></li>
                    <li class="mb-2"><a href="{{ route('biography') }}" class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Biography</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('services.index') }}"
                            class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>My
                            Services</a></li>
                    <li class="mb-2"><a href="{{ route('rate-card') }}"
                            class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Rate Card</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('store.index') }}"
                            class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>My Book</a>
                    </li>
                </ul>
            </div>

            {{-- Explore --}}
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="fw-bold text-dark mb-3 pb-2 border-bottom border-primary border-2">Explore</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('videos.index') }}"
                            class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Videos</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('gallery.index') }}"
                            class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Gallery</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('blog.index') }}"
                            class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Blog</a></li>
                    <li class="mb-2"><a href="{{ route('privacy') }}" class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Privacy
                            Policy</a></li>
                    <li class="mb-2"><a href="{{ route('terms') }}" class="text-muted text-decoration-none small">
                            <i class="fas fa-chevron-right me-1 text-primary" style="font-size:10px;"></i>Terms &
                            Conditions</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-dark mb-3 pb-2 border-bottom border-primary border-2">Get In Touch</h6>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-start gap-2">
                        <span
                            class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 p-0"
                            style="width:30px; height:30px;">
                            <i class="fas fa-map-marker-alt" style="font-size:11px;"></i>
                        </span>
                        <span class="text-muted small">{{ $settings->business_location ?? 'Nairobi, Kenya' }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start gap-2">
                        <span
                            class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 p-0"
                            style="width:30px; height:30px;">
                            <i class="fas fa-phone" style="font-size:11px;"></i>
                        </span>
                        <span class="text-muted small">{{ $settings->support_phone ?? '+254 700 000 000' }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start gap-2">
                        <span
                            class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 p-0"
                            style="width:30px; height:30px;">
                            <i class="fas fa-envelope" style="font-size:11px;"></i>
                        </span>
                        <span
                            class="text-muted small">{{ $settings->site_email ?? 'info@washingtoneoruko.com' }}</span>
                    </li>
                </ul>
                @php
                    $wa = $settings->whatsapp_number ?? '+254700000000';
                    $waClean = preg_replace('/[^0-9]/', '', $wa);
                @endphp
                <a href="https://wa.me/{{ $waClean }}?text=Hi%20Washingtone%2C%20I%27d%20like%20to%20enquire%20about%20your%20services."
                    target="_blank" class="btn btn-success btn-sm rounded-pill px-3">
                    <i class="fab fa-whatsapp me-1"></i> WhatsApp Me
                </a>
            </div>

            {{-- Book CTA --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold text-dark mb-3 pb-2 border-bottom border-primary border-2">My Book</h6>
                <a href="{{ route('store.index') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <i class="fas fa-book fa-2x text-primary mb-2"></i>
                        <p class="small fw-semibold text-dark mb-2">Realign Your Compass</p>
                        <span class="btn btn-primary btn-sm rounded-pill px-3">Order Now</span>
                    </div>
                </a>
            </div>

        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="bg-gradient-primary py-3">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <p class="small text-white mb-0">
                    © {{ date('Y') }} Washingtone Oduor Oruko. All rights reserved.
                </p>
                <p class="small text-white mb-0">
                    Built with passion by <a href="https://suweka.com/" target="_blank"
                        class="text-white fw-semibold">Suweka</a>.
                </p>
            </div>
        </div>
    </div>

</footer>
