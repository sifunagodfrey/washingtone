@extends('frontend.layouts.app')
@section('title', 'Terms & Conditions | Washingtone Oruko')
@section('meta_description', 'Read the terms and conditions governing use of Washingtone Oruko\'s website and
    services.')

@section('content')

    {{-- Header --}}
    <section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('images/washintone-in-conference-presenting-gift.jpg') }}"
                class="w-100 h-100 object-fit-cover opacity-15" alt="">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-85"></div>
        <div class="container position-relative text-center py-3">
            <h1 class="fw-bold display-5 mb-2">Terms &amp; Conditions</h1>
            <p class="text-white-75 mb-0">Please read these terms carefully before using our services</p>
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
                    <li class="breadcrumb-item active text-white">Terms &amp; Conditions</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    {{-- Last updated badge --}}
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <i class="fas fa-file-contract text-primary fa-lg"></i>
                        <span class="text-muted small">Last updated: {{ date('F Y') }}</span>
                    </div>

                    @if ($page && $page->content)
                        {{-- Admin-edited content --}}
                        <div class="card border-0 shadow-sm p-4 p-lg-5">
                            <div class="legal-content">{!! $page->content !!}</div>
                        </div>
                    @else
                        {{-- Default content --}}
                        <div class="card border-0 shadow-sm p-4 p-lg-5">
                            <div class="legal-content">

                                <h4 class="fw-bold text-primary mb-3">1. Acceptance of Terms</h4>
                                <p>By accessing and using this website (<strong>washingtoneoruko.com</strong>), you accept
                                    and agree to be bound by these Terms and Conditions. If you do not agree with any part
                                    of these terms, please do not use our website or services.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">2. About Our Services</h4>
                                <p>Washingtone Oduor Oruko offers the following professional services:</p>
                                <ul>
                                    <li>Corporate, Wedding and Private Event MC Services</li>
                                    <li>Team Building Facilitation</li>
                                    <li>Life Coaching (individual and group sessions)</li>
                                    <li>Motivational Talks (schools, corporates, youth groups)</li>
                                    <li>Dance Classes and Choreography</li>
                                    <li>Theatre Direction and Stage Script Writing</li>
                                    <li>Sale of the book <em>Realign Your Compass</em></li>
                                </ul>

                                <h4 class="fw-bold text-primary mt-4 mb-3">3. Bookings and Engagements</h4>
                                <p>All service bookings are subject to availability and confirmation by Washingtone Oruko or
                                    his team. A booking is only confirmed once you have received written or verbal
                                    confirmation and, where applicable, paid a booking deposit.</p>
                                <p>We reserve the right to decline any booking at our discretion.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">4. Payments</h4>
                                <p>Payments for services and products may be made via:</p>
                                <ul>
                                    <li><strong>M-Pesa</strong> — using the Paybill or Till number provided</li>
                                    <li><strong>WhatsApp order</strong> — subject to confirmation and payment agreement</li>
                                    <li><strong>Bank transfer or cash</strong> — where agreed in advance</li>
                                </ul>
                                <p>All prices are quoted in <strong>Kenyan Shillings (KES)</strong> and are inclusive of
                                    applicable taxes unless stated otherwise. Prices are subject to change without prior
                                    notice.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">5. Cancellations and Refunds</h4>
                                <p><strong>By the client:</strong> Cancellations must be communicated in writing (via
                                    WhatsApp or email) at least 7 days before the scheduled event or session. Deposits are
                                    non-refundable. For cancellations made less than 7 days before the event, 50% of the
                                    agreed fee may be charged.</p>
                                <p><strong>By Washingtone Oruko:</strong> In the unlikely event that Washingtone is unable
                                    to fulfil a confirmed booking due to illness or emergency, we will endeavour to provide
                                    an alternative arrangement or issue a full refund of any amount paid.</p>
                                <p><strong>Book orders:</strong> Once an order for <em>Realign Your Compass</em> has been
                                    placed and payment confirmed, cancellations are only accepted before delivery has been
                                    dispatched.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">6. Intellectual Property</h4>
                                <p>All content on this website including text, images, videos, logos and the book
                                    <em>Realign Your Compass</em> is the intellectual property of Washingtone Oduor Oruko
                                    unless otherwise stated. You may not reproduce, distribute or use any content from this
                                    website without prior written permission.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">7. Photography and Video at Events</h4>
                                <p>Washingtone Oruko or his team may photograph or video record events for promotional and
                                    portfolio purposes. By engaging our services, you consent to such recordings being used
                                    on our website and social media platforms. If you do not consent, please notify us in
                                    writing before the event.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">8. Limitation of Liability</h4>
                                <p>Washingtone Oruko shall not be liable for any indirect, incidental or consequential
                                    damages arising from the use of our services or website. Our total liability in
                                    connection with any service shall not exceed the amount paid for that specific service.
                                </p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">9. Website Use</h4>
                                <p>You agree to use this website only for lawful purposes. You must not use our website in
                                    any way that causes or may cause damage to the website or impair its availability.
                                    Unauthorized use of this website may give rise to a claim for damages.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">10. External Links</h4>
                                <p>Our website may contain links to third-party websites including YouTube, Facebook, TikTok
                                    and X (Twitter). These links are provided for convenience only. We have no control over
                                    the content of those sites and accept no responsibility for them or for any loss or
                                    damage arising from your use of them.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">11. Governing Law</h4>
                                <p>These Terms and Conditions are governed by and construed in accordance with the laws of
                                    the Republic of Kenya. Any disputes arising under these terms shall be subject to the
                                    exclusive jurisdiction of the courts of Kenya.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">12. Changes to These Terms</h4>
                                <p>We reserve the right to update these Terms and Conditions at any time. Changes will be
                                    posted on this page with an updated date. Your continued use of our website or services
                                    after changes are made constitutes your acceptance of the revised terms.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">13. Contact Us</h4>
                                <p>If you have any questions about these Terms and Conditions, please contact us:</p>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-globe me-2 text-primary"></i> washingtoneoruko.com</li>
                                    <li><i class="fas fa-envelope me-2 text-primary"></i> info@washingtoneoruko.com</li>
                                    <li><i class="fas fa-map-marker-alt me-2 text-primary"></i> Nairobi, Kenya</li>
                                </ul>

                            </div>
                        </div>
                    @endif

                    {{-- Navigation --}}
                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i>Back to Home
                        </a>
                        <a href="{{ route('privacy') }}" class="btn btn-outline-secondary rounded-pill px-4 ms-2">
                            Privacy Policy
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('styles')
    <style>
        .legal-content h4 {
            font-size: 1.05rem;
        }

        .legal-content p,
        .legal-content li {
            color: #555;
            line-height: 1.8;
        }

        .legal-content ul {
            padding-left: 1.4rem;
            margin-bottom: 1rem;
        }

        .legal-content li {
            margin-bottom: .4rem;
        }
    </style>
@endsection
