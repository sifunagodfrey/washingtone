<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Washingtone Oruko — Corporate MC, Life Coach & Author')</title>
    <meta name="description" content="@yield('meta_description', 'Washingtone Oruko — Corporate MC, Life Coach, Author of Realign Your Compass, and Team Building Facilitator based in Nairobi, Kenya.')">
    <meta name="keywords" content="@yield('meta_keywords', 'corporate MC Kenya, life coach Nairobi, team building Kenya, motivational speaker, Washingtone Oruko')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Washingtone Oruko">
    <meta property="og:title" content="@yield('og_title', 'Washingtone Oruko — Corporate MC & Life Coach')">
    <meta property="og:description" content="@yield('og_description', 'Corporate MC, Life Coach, Author and Team Building Facilitator based in Nairobi, Kenya.')">
    <meta property="og:image" content="@yield('og_image', asset('images/washingtone-oruko-on-stage-singing-3-main.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:locale" content="en_KE">

    {{-- Twitter Cards --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@odywuor">
    <meta name="twitter:title" content="@yield('twitter_title', 'Washingtone Oruko — Corporate MC & Life Coach')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Corporate MC, Life Coach, Author and Team Building Facilitator based in Nairobi, Kenya.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/washingtone-oruko-on-stage-singing-3-main.jpg'))">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/washingtone-oruko-icon.png') }}">

    {{-- CSS --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    @yield('styles')
</head>
<body>

    @include('frontend.partials.header')
    @include('frontend.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    {{-- Scripts --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 80 });
    </script>

    @yield('scripts')
</body>
</html>
