@extends('frontend.layouts.app')
@section('title', 'Order Received | Washingtone Oruko')
@section('content')
<section class="py-5 bg-light" style="min-height:80vh;" data-aos="zoom-in">
    <div class="container d-flex align-items-center justify-content-center" style="min-height:70vh;">
        <div class="text-center card border-0 shadow p-5" style="max-width:520px;">
            <i class="fas fa-check-circle fa-5x text-success mb-4 d-block"></i>
            <h2 class="fw-bold text-primary mb-2">Order Received!</h2>
            @if($orderNumber)<div class="badge bg-primary fs-5 px-4 py-2 mb-3">{{ $orderNumber }}</div>@endif
            <p class="text-muted mb-4">Thank you! Washingtone will contact you shortly to confirm your order and arrange delivery of <em>Realign Your Compass</em>.</p>
            @php $settings = \App\Models\Setting::first(); $wa = preg_replace('/[^0-9]/', '', $settings->whatsapp_number ?? '254700000000'); @endphp
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4">Back to Home</a>
                <a href="https://wa.me/{{ $wa }}" target="_blank" class="btn btn-success rounded-pill px-4"><i class="fab fa-whatsapp me-2"></i>Chat on WhatsApp</a>
            </div>
        </div>
    </div>
</section>
@endsection
