@extends('frontend.layouts.app')
@section('title', 'Terms & Conditions | Washingtone Oruko')
@section('content')
<section class="py-4 bg-primary text-white"><div class="container text-center"><h1 class="fw-bold">Terms &amp; Conditions</h1></div></section>
<section class="py-5 bg-light"><div class="container"><div class="row justify-content-center"><div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4 p-lg-5">{!! $page->content !!}</div>
</div></div></div></section>
@endsection
