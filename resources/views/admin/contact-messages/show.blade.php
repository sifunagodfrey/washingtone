@extends('admin.layouts.app')
@section('title','Message | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Message from {{ $message->name }}</h4>
    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
<div class="row justify-content-center"><div class="col-lg-8">
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <dl class="row small">
            <dt class="col-sm-3">From:</dt><dd class="col-sm-9 fw-bold">{{ $message->name }}</dd>
            <dt class="col-sm-3">Email:</dt><dd class="col-sm-9"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
            <dt class="col-sm-3">Phone:</dt><dd class="col-sm-9">{{ $message->phone ?? '—' }}</dd>
            <dt class="col-sm-3">Subject:</dt><dd class="col-sm-9">{{ $message->subject ?? '—' }}</dd>
            <dt class="col-sm-3">Received:</dt><dd class="col-sm-9">{{ $message->created_at->format('F j, Y g:i A') }}</dd>
        </dl>
        <hr>
        <h6 class="fw-bold text-primary mb-2">Message</h6>
        <p class="text-muted">{{ $message->message }}</p>
        <div class="d-flex gap-3 mt-4">
            <a href="mailto:{{ $message->email }}" class="btn btn-primary rounded-pill px-4"><i class="fas fa-reply me-2"></i>Reply via Email</a>
            @php $wa = preg_replace("/[^0-9]/", "", $message->phone ?? ""); @endphp
            @if($wa)<a href="https://wa.me/254{{ ltrim($wa, '0') }}" target="_blank" class="btn btn-success rounded-pill px-4"><i class="fab fa-whatsapp me-2"></i>WhatsApp</a>@endif
            <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
                <button class="btn btn-outline-danger rounded-pill px-4">Delete</button></form>
        </div>
    </div>
</div>
</div></div>
@endsection
