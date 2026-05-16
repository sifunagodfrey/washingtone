@extends('frontend.layouts.app')
@section('title', 'Privacy Policy | Washingtone Oruko')
@section('meta_description', 'Read the privacy policy of Washingtone Oruko — how we collect, use and protect your
    personal information.')

@section('content')

    {{-- Header --}}
    <section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('images/washintone-in-conference-listening.jpg') }}"
                class="w-100 h-100 object-fit-cover opacity-15" alt="">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-85"></div>
        <div class="container position-relative text-center py-3">
            <h1 class="fw-bold display-5 mb-2">Privacy Policy</h1>
            <p class="text-white-75 mb-0">How we collect, use and protect your information</p>
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning">Home</a></li>
                    <li class="breadcrumb-item active text-white">Privacy Policy</li>
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
                        <i class="fas fa-shield-alt text-primary fa-lg"></i>
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

                                <h4 class="fw-bold text-primary mb-3">1. Introduction</h4>
                                <p>Welcome to the official website of Washingtone Oduor Oruko
                                    (<strong>washingtoneoruko.com</strong>). We are committed to protecting your personal
                                    information and your right to privacy. This Privacy Policy explains how we collect, use,
                                    and safeguard information when you visit our website or engage with our services.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">2. Information We Collect</h4>
                                <p>We collect information you voluntarily provide when you:</p>
                                <ul>
                                    <li>Fill out our <strong>Get In Touch</strong> contact form (name, email, phone number,
                                        message)</li>
                                    <li>Place an order for our book <em>Realign Your Compass</em> (name, phone, email,
                                        M-Pesa transaction code, delivery notes)</li>
                                    <li>Subscribe to updates or newsletters</li>
                                    <li>Communicate with us via WhatsApp, email or phone</li>
                                </ul>
                                <p>We may also automatically collect non-personal technical information such as browser
                                    type, pages visited and time spent on our site for analytics purposes.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">3. How We Use Your Information</h4>
                                <p>We use the information we collect to:</p>
                                <ul>
                                    <li>Respond to your enquiries and booking requests</li>
                                    <li>Process and fulfil orders for our products</li>
                                    <li>Contact you regarding your event, session or order</li>
                                    <li>Send you relevant updates about our services (only with your consent)</li>
                                    <li>Improve our website and services</li>
                                </ul>
                                <p>We do not sell, trade or rent your personal information to any third party.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">4. M-Pesa Payments</h4>
                                <p>When you pay via M-Pesa, we collect the M-Pesa transaction confirmation code you provide.
                                    We do not collect or store your M-Pesa PIN or any banking credentials. Payment
                                    verification is done manually through Safaricom's M-Pesa records.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">5. Data Security</h4>
                                <p>We implement appropriate technical and organisational measures to protect your personal
                                    information against unauthorized access, alteration, disclosure or destruction. However,
                                    no method of transmission over the internet is 100% secure, and we cannot guarantee
                                    absolute security.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">6. Cookies</h4>
                                <p>Our website may use cookies to enhance your browsing experience. Cookies are small files
                                    stored on your device that help us understand how visitors use our site. You can choose
                                    to disable cookies through your browser settings, although this may affect some features
                                    of the website.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">7. Third-Party Links</h4>
                                <p>Our website may contain links to third-party websites including YouTube, TikTok,
                                    Facebook, X (Twitter) and WhatsApp. We are not responsible for the privacy practices of
                                    those platforms. We encourage you to read their privacy policies before sharing your
                                    personal information with them.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">8. Children's Privacy</h4>
                                <p>Our services are not directed to children under the age of 13. We do not knowingly
                                    collect personal information from children. If you believe a child has provided us with
                                    personal information, please contact us immediately.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">9. Your Rights</h4>
                                <p>You have the right to:</p>
                                <ul>
                                    <li>Request access to the personal data we hold about you</li>
                                    <li>Request correction of inaccurate information</li>
                                    <li>Request deletion of your personal data</li>
                                    <li>Withdraw consent to marketing communications at any time</li>
                                </ul>
                                <p>To exercise any of these rights, please contact us using the details below.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">10. Changes to This Policy</h4>
                                <p>We may update this Privacy Policy from time to time. Changes will be posted on this page
                                    with an updated date. Your continued use of our website after changes are posted
                                    constitutes your acceptance of the updated policy.</p>

                                <h4 class="fw-bold text-primary mt-4 mb-3">11. Contact Us</h4>
                                <p>If you have any questions about this Privacy Policy, please contact us:</p>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-globe me-2 text-primary"></i> washingtoneoruko.com</li>
                                    <li><i class="fas fa-envelope me-2 text-primary"></i> info@washingtoneoruko.com</li>
                                    <li><i class="fas fa-map-marker-alt me-2 text-primary"></i> Nairobi, Kenya</li>
                                </ul>

                            </div>
                        </div>
                    @endif

                    {{-- Back to home --}}
                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i>Back to Home
                        </a>
                        <a href="{{ route('terms') }}" class="btn btn-outline-secondary rounded-pill px-4 ms-2">
                            Terms &amp; Conditions
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
