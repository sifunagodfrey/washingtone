{{-- Top Bar --}}
@php $settings = \App\Models\Setting::first(); @endphp
<div class="bg-gradient-primary text-white py-2 border-bottom" data-aos="fade-down" data-aos-duration="800">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center small gap-3">

            {{-- Left: Contact --}}
            <div class="d-flex align-items-center gap-3">
                <span>
                    <i class="fas fa-lightbulb me-1"></i>
                    Inspired to make a difference
                </span>

                <span class="d-none d-md-inline">
                    <i class="fas fa-envelope me-1"></i>
                    {{ $settings->site_email ?? 'info@washingtoneoruko.com' }}
                </span>
            </div>

            {{-- Right: Social --}}
            <div class="d-flex align-items-center gap-3">
                @if ($settings->facebook ?? null)
                    <a href="{{ $settings->facebook }}" class="text-white" target="_blank" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                @endif
                @if ($settings->instagram ?? null)
                    <a href="{{ $settings->instagram }}" class="text-white" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endif
                @if ($settings->youtube ?? null)
                    <a href="{{ $settings->youtube }}" class="text-white" target="_blank" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                @endif
                @if ($settings->tiktok ?? null)
                    <a href="{{ $settings->tiktok }}" class="text-white" target="_blank" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                @endif
                @if ($settings->twitter ?? null)
                    <a href="{{ $settings->twitter }}" class="text-white" target="_blank" title="X / Twitter">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                @endif
            </div>

        </div>
    </div>
</div>
