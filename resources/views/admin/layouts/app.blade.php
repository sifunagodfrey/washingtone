<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel | Washingtone Oruko')</title>
    <link rel="icon" href="{{ asset('images/washingtone-oruko-icon.png') }}">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        body { background-color: #f4f6fb; }
        .admin-sidebar { background-color: #1a1a2e; min-height: 100vh; }
        .admin-content { background-color: #f4f6fb; min-height: 100vh; }
        .sidebar-link { color: #a0aec0; padding: .55rem .85rem; border-radius: 8px; display:flex; align-items:center; gap:.6rem; text-decoration:none; font-size:.88rem; transition:.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,.1); color: #fff; }
        .sidebar-link.active { background: var(--bs-primary); color: #fff !important; }
        .sidebar-section { font-size:.7rem; text-transform:uppercase; letter-spacing:.08em; color:#718096; padding:.4rem .85rem; margin-top:.8rem; }
        .admin-top-nav { background:#fff; border-bottom:1px solid #e2e8f0; position:sticky; top:0; z-index:1020; }
    </style>
    @yield('styles')
</head>
<body>

@include('admin.partials.navbar')

<div class="container-fluid p-0">
    <div class="row g-0" style="min-height:100vh;">
        {{-- Sidebar --}}
        <div class="col-md-2 admin-sidebar d-none d-md-block">
            @include('admin.partials.sidebar')
        </div>
        {{-- Content --}}
        <div class="col-12 col-md-10 admin-content p-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('scripts')
</body>
</html>
