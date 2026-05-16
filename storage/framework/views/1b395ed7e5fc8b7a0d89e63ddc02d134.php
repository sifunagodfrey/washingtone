<?php $__env->startSection('title', 'Washingtone Oruko | Corporate MC, Life Coach & Author - Nairobi, Kenya'); ?>
<?php $__env->startSection('meta_description',
    'Washingtone Oruko - Corporate MC with 10+ years experience, Life Coach, Author of Realign
    Your Compass, and Team Building Facilitator based in Nairobi, Kenya.'); ?>
<?php $__env->startSection('og_title', 'Washingtone Oruko | Corporate MC & Life Coach'); ?>

<?php $__env->startSection('content'); ?>

    
    <section data-aos="fade-up" data-aos-duration="1000">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">

                <?php
                    $slides = [
                        [
                            'img' => 'washintone-event-mc-in-action.jpg',
                            'label' => '10+ Years of Experience',
                            'line1' => 'Your Event Deserves',
                            'line2' => 'the Best',
                            'accent' => 'MC',
                            'desc' =>
                                'Energetic, professional and unforgettable - Washingtone turns every event into an experience your guests will never forget.',
                            'cta' => 'Book Corporate MC',
                            'cta_link' => 'contact.index',
                            'cta2' => 'View Rate Card',
                            'cta2_link' => 'rate-card',
                            'badge_bg' => 'bg-primary',
                            'tag' => 'Corporate MC',
                        ],
                        [
                            'img' => 'washingtone-oruko-in-baby-shower-mc.jpg',
                            'label' => 'Weddings · Baby Showers · Private Events',
                            'line1' => 'Making Your Special',
                            'line2' => 'Day Truly',
                            'accent' => 'Unforgettable',
                            'desc' =>
                                'From intimate baby showers to grand weddings - Washingtone hosts your most cherished moments with warmth, elegance and flair.',
                            'cta' => 'Book for My Event',
                            'cta_link' => 'contact.index',
                            'cta2' => 'View Rate Card',
                            'cta2_link' => 'rate-card',
                            'badge_bg' => 'bg-danger',
                            'tag' => 'Wedding & Private MC',
                        ],
                        [
                            'img' => 'washingtone-doing-team-building.jpg',
                            'label' => '70+ Corporate Sessions Facilitated',
                            'line1' => 'Transform Your Team.',
                            'line2' => 'Elevate Your',
                            'accent' => 'Results.',
                            'desc' =>
                                'Over 70 corporate team building sessions designed to boost morale, improve communication and unlock peak team performance.',
                            'cta' => 'Book Team Building',
                            'cta_link' => 'contact.index',
                            'cta2' => 'Learn More',
                            'cta2_link' => 'services.index',
                            'badge_bg' => 'bg-success',
                            'tag' => 'Team Building',
                        ],
                        [
                            'img' => 'washingtone-talks-in-highschool.jpg',
                            'label' => 'Schools · Universities · Youth Groups',
                            'line1' => 'Igniting Purpose',
                            'line2' => 'in Every',
                            'accent' => 'Young Mind.',
                            'desc' =>
                                'Powerful motivational talks that challenge young people to discover their WHY, define their goals and take intentional action.',
                            'cta' => 'Book a Youth Talk',
                            'cta_link' => 'contact.index',
                            'cta2' => 'My Services',
                            'cta2_link' => 'services.index',
                            'badge_bg' => 'bg-warning',
                            'tag' => 'Youth Talks',
                        ],
                        [
                            'img' => 'washingtone-dancing-with-people-in-blue.jpg',
                            'label' => 'Kenya National Theatre',
                            'line1' => 'Move. Express.',
                            'line2' => 'Discover Your',
                            'accent' => 'Rhythm.',
                            'desc' =>
                                'Professional dance classes for kids, youth and adults - from traditional to contemporary styles. Available at Kenya National Theatre and on location.',
                            'cta' => 'Join Dance Classes',
                            'cta_link' => 'contact.index',
                            'cta2' => 'View Rate Card',
                            'cta2_link' => 'rate-card',
                            'badge_bg' => 'bg-info',
                            'tag' => 'Dance Classes',
                        ],
                        [
                            'img' => 'washingtone-oruko-on-stage-singing-3-main.jpg',
                            'label' => 'Life Coach · Author · Speaker',
                            'line1' => 'Realign Your',
                            'line2' => 'Compass. Own Your',
                            'accent' => 'Story.',
                            'desc' =>
                                'Author of Realign Your Compass - coaching individuals to discover purpose, set meaningful goals and live with intention.',
                            'cta' => 'Get My Book',
                            'cta_link' => 'store.index',
                            'cta2' => 'My Biography',
                            'cta2_link' => 'biography',
                            'badge_bg' => 'bg-primary',
                            'tag' => 'Life Coaching & Book',
                        ],
                    ];
                ?>

                <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                        <div class="container py-5">
                            <div class="row align-items-center g-4 py-4" style="min-height: 80vh;">

                                
                                <div class="col-12 col-lg-6">
                                    
                                    <span class="badge <?php echo e($slide['badge_bg']); ?> text-white px-3 py-2 mb-3 rounded-pill">
                                        <?php echo e($slide['tag']); ?>

                                    </span>
                                    <p class="text-uppercase fw-bold text-secondary small mb-2"
                                        style="letter-spacing:.08em;">
                                        <?php echo e($slide['label']); ?>

                                    </p>
                                    <h1 class="display-5 fw-bold text-dark mb-3">
                                        <?php echo e($slide['line1']); ?><br>
                                        <?php echo e($slide['line2']); ?>

                                        <span class="text-primary"><?php echo e($slide['accent']); ?></span>
                                    </h1>
                                    <hr class="border-primary border-2 opacity-100 w-25 ms-0 mb-3">
                                    <p class="text-muted fs-6 mb-4 pe-lg-5">
                                        <?php echo e($slide['desc']); ?>

                                    </p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="<?php echo e(route($slide['cta_link'])); ?>"
                                            class="btn btn-primary btn-lg px-4 rounded-pill fw-semibold">
                                            <?php echo e($slide['cta']); ?>

                                        </a>
                                        <a href="<?php echo e(route($slide['cta2_link'])); ?>"
                                            class="btn btn-outline-secondary btn-lg px-4 rounded-pill">
                                            <?php echo e($slide['cta2']); ?>

                                        </a>
                                    </div>
                                </div>

                                
                                <div class="col-12 col-lg-6 d-flex justify-content-center">
                                    <div class="position-relative">
                                        
                                        <div class="position-absolute top-50 start-50 translate-middle rounded-circle border border-5 border-primary opacity-25"
                                            style="width:410px; height:410px;"></div>
                                        <img src="<?php echo e(asset('images/' . $slide['img'])); ?>" alt="Washingtone Oruko"
                                            class="rounded-circle object-fit-cover border border-4 border-white shadow position-relative"
                                            style="width:370px; height:370px; z-index:1;">
                                        
                                        <span
                                            class="position-absolute bottom-0 end-0 badge <?php echo e($slide['badge_bg']); ?> text-white px-3 py-2 rounded-pill shadow"
                                            style="z-index:2; font-size:.8rem;">
                                            <i class="fas fa-check-circle me-1"></i><?php echo e($slide['tag']); ?>

                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>



            
            

        </div>
    </section>
    
    <section class="py-5 bg-white overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="badge bg-secondary text-white mb-2 px-3 py-2">10+ Years of Excellence</span>
                    <h2 class="fw-bold text-primary mb-3">One Event at a Time</h2>
                    <p class="text-muted mb-4">
                        From corporate boardrooms to school grounds, Washingtone brings energy, expertise
                        and authentic passion that leaves a lasting impact on every audience he serves.
                    </p>
                    <div class="mb-4">
                        <h1 class="fw-bold display-4 text-secondary counter" data-target="200">0</h1>
                        <p class="text-muted mb-0">Events hosted as Corporate MC</p>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-light">
                                <h3 class="fw-bold text-primary counter" data-target="10">0</h3>
                                <p class="small text-muted mb-0">Years Experience</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-light">
                                <h3 class="fw-bold text-primary counter" data-target="70">0</h3>
                                <p class="small text-muted mb-0">Team Buildings</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-light">
                                <h3 class="fw-bold text-primary counter" data-target="50">0</h3>
                                <p class="small text-muted mb-0">Workshops Hosted</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 shadow-sm rounded text-center h-100 bg-primary text-white">
                                <h3 class="fw-bold text-warning">1,000+</h3>
                                <p class="small text-white-75 mb-0">Lives Impacted</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll('.counter');
            let started = false;

            function animateCounters() {
                if (started) return;
                started = true;
                counters.forEach(counter => {
                    const target = parseFloat(counter.dataset.target);
                    let current = 0;
                    const timer = setInterval(() => {
                        current += target / 60;
                        if (current >= target) {
                            counter.innerText = Math.ceil(target) + '+';
                            clearInterval(timer);
                        } else {
                            counter.innerText = Math.floor(current);
                        }
                    }, 25);
                });
            }
            const observer = new IntersectionObserver(e => {
                if (e[0].isIntersecting) animateCounters();
            }, {
                threshold: 0.3
            });
            if (document.querySelector('.counter')) observer.observe(document.querySelector('.counter').closest(
                'section'));
        });
    </script>

    
    <section class="py-5 bg-light overflow-hidden" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary text-white mb-2 px-3 py-2">What I Do</span>
                <h2 class="fw-bold text-primary">My Services</h2>
                <p class="text-muted">Professional services delivered with passion and excellence</p>
            </div>
            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <a href="<?php echo e(route('services.show', $service->slug)); ?>"
                            class="text-decoration-none text-dark h-100">
                            <div class="card border-0 shadow-sm h-100 service-card" style="transition:.3s;">
                                <?php if($service->image): ?>
                                    <img src="<?php echo e(asset('uploads/services/' . $service->image)); ?>" class="card-img-top"
                                        style="height:200px; object-fit:cover;">
                                <?php else: ?>
                                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center"
                                        style="height:200px;">
                                        <i class="<?php echo e($service->icon ?? 'fas fa-star'); ?> fa-4x text-warning"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h6 class="fw-bold mb-2"><?php echo e($service->title); ?></h6>
                                    <p class="small text-muted mb-0">
                                        <?php echo e(Str::limit(strip_tags($service->short_description ?? $service->description), 90)); ?>

                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pb-3">
                                    <span class="text-primary fw-semibold small">Learn More <i
                                            class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted">Services coming soon.</div>
                <?php endif; ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?php echo e(route('services.index')); ?>" class="btn btn-primary px-5 rounded-pill">View All Services</a>
            </div>
        </div>
    </section>

    
    <section class="py-5 bg-white overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="<?php echo e(asset('images/washingtone-oruko-in-black.jpg')); ?>" class="img-fluid rounded shadow"
                            style="width:100%; object-fit:cover; max-height:480px;">
                        <div class="position-absolute bottom-0 start-0 bg-warning text-dark p-3 rounded-end"
                            style="margin-bottom:30px;">
                            <strong class="d-block">Author</strong>
                            <small>Realign Your Compass</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="badge bg-primary text-white mb-3 px-3 py-2">About Washingtone</span>
                    <h2 class="fw-bold text-primary mb-3">A Dynamic Force for Transformation</h2>
                    <p class="text-muted mb-3">
                        Born on October 17, 1989, Washingtone Oduor Oruko is one of Kenya's most electrifying
                        personalities - a Corporate MC, Life Coach, Author, Theatre Director and Team Building Facilitator
                        who has dedicated his life to transforming others.
                    </p>
                    <p class="text-muted mb-4">
                        His philosophy is simple: <em>"The more we work on ourselves, the better our chances of
                            success."</em>
                        This conviction drives everything he does - on stage, in boardrooms, and through the pages of his
                        book.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="<?php echo e(route('biography')); ?>" class="btn btn-primary px-4 rounded-pill">Full Biography</a>
                        <a href="<?php echo e(route('store.index')); ?>" class="btn btn-outline-warning px-4 rounded-pill">
                            <i class="fas fa-book me-2"></i>Get My Book
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="py-5 bg-light overflow-hidden" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary text-white mb-2 px-3 py-2">Trusted By</span>
                <h2 class="fw-bold text-primary">Clients We Have Served</h2>
                <p class="text-muted">Trusted by schools, corporates, churches and institutions across Kenya</p>
            </div>

            <?php
                $clients = [
                    ['img' => 'client-logo-kcb-bank.jpg', 'name' => 'KCB Bank'],
                    ['img' => 'client-logo-stima-sacco.jpg', 'name' => 'Stima Sacco'],
                    ['img' => 'client-logo-kenya-utalii-college.jpg', 'name' => 'Kenya Utalii College'],
                    ['img' => 'client-logo-kabete-national-polytechnic.jpg', 'name' => 'Kabete National Polytechnic'],
                    ['img' => 'client-logo-quest-holdings.jpg', 'name' => 'Quest Holdings'],
                    ['img' => 'client-logo-izwe-africa.jpg', 'name' => 'Izwe Africa'],
                    ['img' => 'client-logo-olsupat-lodge.jpg', 'name' => 'Olsupat Lodge'],
                    ['img' => 'client-logo-zeteck-university.jpg', 'name' => 'Zeteck University'],
                    ['img' => 'client-logo-rock-solid-academy.jpg', 'name' => 'Rock Solid Academy'],
                    ['img' => 'client-logo-precious-gem-school.jpg', 'name' => 'Precious Gem School'],
                    ['img' => 'client-logo-mountain-view-school.jpg', 'name' => 'Mountain View School'],
                    ['img' => 'client-logo-accurate-schools.jpg', 'name' => 'Accurate Schools'],
                    ['img' => 'client-logo-passion-yangu.jpg', 'name' => 'Passion Yangu'],
                    ['img' => 'client-logo-batanique-naturelle.jpg', 'name' => 'Batanique Naturelle'],
                    ['img' => 'client-logo-telesky.jpg', 'name' => 'Telesky'],
                    ['img' => 'client-logo-hardi.jpg', 'name' => 'Hardi'],
                    ['img' => 'client-logo-anns-yummy-bakes.jpg', 'name' => "Ann's Yummy Bakes"],
                ];
                $chunks = array_chunk($clients, 5);
            ?>

            
            <div id="clientsCarousel" class="carousel slide d-none d-md-block" data-bs-ride="carousel"
                data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci => $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($ci === 0 ? 'active' : ''); ?>">
                            <div class="row g-3 justify-content-center">
                                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2 col-4">
                                        <div class="p-3 bg-white rounded shadow-sm d-flex align-items-center justify-content-center"
                                            style="height:80px;">
                                            <img src="<?php echo e(asset('images/' . $client['img'])); ?>"
                                                alt="<?php echo e($client['name']); ?>"
                                                style="max-height:55px; max-width:100%; object-fit:contain;">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="carousel-indicators position-relative mt-3">
                    <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-bs-target="#clientsCarousel" data-bs-slide-to="<?php echo e($ci); ?>"
                            class="<?php echo e($ci === 0 ? 'active' : ''); ?> bg-primary"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="d-md-none position-relative">
                <button onclick="scrollClients(-1)"
                    class="btn btn-outline-primary btn-sm position-absolute start-0 top-50 translate-middle-y z-1">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div id="mobileClientsRow" class="d-flex flex-nowrap gap-3 px-4"
                    style="overflow-x:auto;scrollbar-width:none;">
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-shrink-0" style="width:130px;">
                            <div class="p-2 bg-white rounded shadow-sm d-flex align-items-center justify-content-center"
                                style="height:75px;">
                                <img src="<?php echo e(asset('images/' . $client['img'])); ?>" alt="<?php echo e($client['name']); ?>"
                                    style="max-height:50px;max-width:100%;object-fit:contain;">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button onclick="scrollClients(1)"
                    class="btn btn-outline-primary btn-sm position-absolute end-0 top-50 translate-middle-y z-1">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <script>
                function scrollClients(d) {
                    document.getElementById('mobileClientsRow').scrollBy({
                        left: d * 150,
                        behavior: 'smooth'
                    });
                }
            </script>
        </div>
    </section>

    
    <?php if($packages->count()): ?>
        <section class="py-5 bg-primary overflow-hidden" data-aos="fade-up">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-warning text-dark mb-2 px-3 py-2">Transparent Pricing</span>
                    <h2 class="fw-bold text-white">Rate Card Highlights</h2>
                    <p class="text-white">Clear, competitive pricing for every occasion</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                            <div
                                class="card border-0 shadow h-100 <?php echo e($pkg->is_featured ? 'border-warning border-2' : ''); ?>">
                                <?php if($pkg->is_featured): ?>
                                    <div class="card-header bg-warning text-dark text-center fw-bold py-2">⭐ Most Popular
                                    </div>
                                <?php endif; ?>
                                <div class="card-body text-center p-4">
                                    <small class="text-muted text-uppercase fw-semibold"><?php echo e($pkg->category); ?></small>
                                    <h5 class="fw-bold mt-2 mb-1"><?php echo e($pkg->title); ?></h5>
                                    <div class="display-6 fw-bold text-primary my-3">
                                        KES <?php echo e(number_format($pkg->price)); ?>

                                        <?php if($pkg->price_suffix): ?>
                                            <small class="fs-6 text-muted">/ <?php echo e($pkg->price_suffix); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($pkg->description): ?>
                                        <p class="text-muted small"><?php echo e($pkg->description); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="card-footer bg-transparent border-0 text-center pb-4">
                                    <a href="<?php echo e(route('contact.index')); ?>" class="btn btn-primary px-4 rounded-pill">Book
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('rate-card')); ?>" class="btn btn-warning btn-lg px-5 rounded-pill fw-semibold">View
                        Full Rate Card</a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    
    <?php if($gallery->count()): ?>
        <section class="py-5 bg-white overflow-hidden" data-aos="fade-up">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-primary text-white mb-2 px-3 py-2">Moments</span>
                    <h2 class="fw-bold text-primary">Gallery</h2>
                    <p class="text-muted">A glimpse into Washingtone's world</p>
                </div>
                <div class="row g-2">
                    <?php $__currentLoopData = $gallery->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                            <a href="<?php echo e(route('gallery.index')); ?>">
                                <img src="<?php echo e(asset('uploads/gallery/' . $img->image)); ?>" class="img-fluid w-100 rounded"
                                    style="height:180px; object-fit:cover;" alt="<?php echo e($img->title); ?>">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('gallery.index')); ?>" class="btn btn-outline-primary px-5 rounded-pill">View Full
                        Gallery</a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    
    <section class="py-5 bg-light overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2">Recognition</span>
                    <h2 class="fw-bold text-primary mb-3">Awards & Achievements</h2>
                    <p class="text-muted mb-3">
                        Washingtone's commitment to excellence has been recognized with multiple awards across
                        the entertainment, personal development and corporate facilitation space.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-trophy text-warning fa-lg me-3 mt-1"></i>
                            <div><strong>Best Corporate MC</strong><br><small class="text-muted">Consistently rated the
                                    best in service delivery</small></div>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-medal text-warning fa-lg me-3 mt-1"></i>
                            <div><strong>Published Author</strong><br><small class="text-muted">Author of Realign Your
                                    Compass - a life-changing self-help book</small></div>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-star text-warning fa-lg me-3 mt-1"></i>
                            <div><strong>National Theatre Facilitator</strong><br><small class="text-muted">Dance classes
                                    at Kenya National Theatre for kids, youth and adults</small></div>
                        </li>
                    </ul>
                    <a href="<?php echo e(route('biography')); ?>" class="btn btn-primary px-4 rounded-pill">Read Full Story</a>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="<?php echo e(asset('images/all-washingtone-awards-presents-holding-them.jpg')); ?>"
                        class="img-fluid rounded shadow" style="width:100%;object-fit:cover;max-height:440px;"
                        alt="Washingtone Oruko Awards">
                </div>
            </div>
        </div>
    </section>

    
    <section class="py-5 bg-white overflow-hidden" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary text-white mb-2 px-3 py-2">Testimonials</span>
                <h2 class="fw-bold text-primary">What People Say</h2>
                <p class="text-muted">Real experiences from real people across Kenya</p>
            </div>
        </div>

        <?php
            $reviews = [
                [
                    'name' => 'James Mwangi',
                    'role' => 'HR Director, KCB Bank',
                    'review' =>
                        'Washingtone brought an incredible energy to our annual staff gala. The entire evening flowed flawlessly - he kept everyone engaged and the night was truly memorable.',
                    'initial' => 'J',
                    'color' => 'bg-primary',
                ],
                [
                    'name' => 'Grace Wanjiku',
                    'role' => 'CEO, Quest Holdings',
                    'review' =>
                        'We hired Washingtone for our team building retreat and the transformation we saw in our team was remarkable. His facilitation style is engaging, fun and deeply purposeful.',
                    'initial' => 'G',
                    'color' => 'bg-success',
                ],
                [
                    'name' => 'Peter Oloo',
                    'role' => 'Events Coordinator, Kenya Utalii College',
                    'review' =>
                        'Professional from start to finish. Washingtone understood our brand, our audience and delivered a performance that exceeded every expectation. We will definitely book him again.',
                    'initial' => 'P',
                    'color' => 'bg-warning',
                ],
                [
                    'name' => 'Mercy Achieng',
                    'role' => 'Bride, Nairobi',
                    'review' =>
                        'Our wedding was absolutely perfect. Washingtone kept the energy alive all day, handled our guests beautifully and made sure every moment felt special. Thank you!',
                    'initial' => 'M',
                    'color' => 'bg-danger',
                ],
                [
                    'name' => 'David Kimani',
                    'role' => 'Principal, Rock Solid Academy',
                    'review' =>
                        'The motivational talk Washingtone gave our students was life-changing. Several students came to me afterwards saying they finally knew what they wanted to do with their lives.',
                    'initial' => 'D',
                    'color' => 'bg-info',
                ],
                [
                    'name' => 'Sarah Njeri',
                    'role' => 'Operations Manager, Stima Sacco',
                    'review' =>
                        'Realign Your Compass arrived and I read it in two days. It asks the right questions and gives you the tools to answer them honestly. Every person needs this book.',
                    'initial' => 'S',
                    'color' => 'bg-primary',
                ],
                [
                    'name' => 'Brian Otieno',
                    'role' => 'Team Leader, Izwe Africa',
                    'review' =>
                        'After our team building session with Washingtone, the difference in how our team communicates and collaborates has been night and day. Highly recommended.',
                    'initial' => 'B',
                    'color' => 'bg-success',
                ],
                [
                    'name' => 'Angela Mutua',
                    'role' => 'Director, Batanique Naturelle',
                    'review' =>
                        'Washingtone MCed our product launch and completely owned the stage. He understood our brand perfectly and created an atmosphere that our guests are still talking about.',
                    'initial' => 'A',
                    'color' => 'bg-danger',
                ],
            ];
            // Duplicate reviews so the marquee loops seamlessly
            $loopedReviews = array_merge($reviews, $reviews);
        ?>

        
        <div class="position-relative" style="overflow:hidden;">

            
            <div class="position-absolute top-0 start-0 h-100 z-1"
                style="width:80px; background:linear-gradient(to right, #fff, transparent); pointer-events:none;"></div>
            <div class="position-absolute top-0 end-0 h-100 z-1"
                style="width:80px; background:linear-gradient(to left, #fff, transparent); pointer-events:none;"></div>

            <div class="reviews-marquee d-flex gap-4 py-2" id="reviewsTrack"
                style="width:max-content; animation: reviewsScroll 40s linear infinite;">
                <?php $__currentLoopData = $loopedReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card border-0 shadow-sm flex-shrink-0" style="width:290px; border-radius:16px;">
                        <div class="card-body p-4">
                            
                            <div class="mb-2">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            
                            <p class="text-muted small mb-3" style="line-height:1.6;">
                                "<?php echo e($review['review']); ?>"
                            </p>
                            
                            <div class="d-flex align-items-center gap-3">
                                <div class="<?php echo e($review['color']); ?> text-white rounded-circle d-flex align-items-center justify-content-center fw-bold flex-shrink-0"
                                    style="width:40px; height:40px; font-size:.95rem;">
                                    <?php echo e($review['initial']); ?>

                                </div>
                                <div>
                                    <div class="fw-semibold small"><?php echo e($review['name']); ?></div>
                                    <div class="text-muted" style="font-size:.75rem;"><?php echo e($review['role']); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div class="text-center mt-5">
            <p class="text-muted mb-3">Had a great experience with Washingtone? We'd love to hear from you.</p>
            <a href="<?php echo e(route('contact.index')); ?>" class="btn btn-primary px-5 rounded-pill fw-semibold">
                <i class="fas fa-pen me-2"></i>Submit Your Review
            </a>
        </div>
    </section>

    <?php $__env->startSection('styles'); ?>
        <?php echo \Illuminate\View\Factory::parentPlaceholder('styles'); ?>
        <style>
            @keyframes reviewsScroll {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }

            #reviewsTrack:hover {
                animation-play-state: paused;
            }
        </style>
    <?php $__env->stopSection(); ?>

    
    <?php if($blogs->count()): ?>
        <section class="py-5 bg-white overflow-hidden" data-aos="fade-up">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-primary text-white mb-2 px-3 py-2">Insights</span>
                    <h2 class="fw-bold text-primary">Latest from the Blog</h2>
                </div>
                <div class="row g-4">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                            <a href="<?php echo e(route('blog.show', $blog->slug)); ?>" class="text-decoration-none text-dark">
                                <div class="card border-0 shadow-sm h-100">
                                    <?php if($blog->featured_image): ?>
                                        <img src="<?php echo e(asset('uploads/blogs/' . $blog->featured_image)); ?>"
                                            class="card-img-top" style="height:200px; object-fit:cover;">
                                    <?php else: ?>
                                        <div class="card-img-top bg-primary d-flex align-items-center justify-content-center"
                                            style="height:200px;">
                                            <i class="fas fa-pen-nib fa-3x text-warning"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body d-flex flex-column">
                                        <?php if($blog->category): ?>
                                            <span
                                                class="badge bg-primary text-white mb-2 align-self-start"><?php echo e($blog->category->name); ?></span>
                                        <?php endif; ?>
                                        <h6 class="fw-bold mb-2"><?php echo e($blog->title); ?></h6>
                                        <p class="small text-muted mb-3"><?php echo e(Str::limit(strip_tags($blog->content), 100)); ?>

                                        </p>
                                        <div class="mt-auto">
                                            <span class="btn btn-sm btn-outline-primary rounded-pill">Read More →</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-outline-primary px-5 rounded-pill">View All
                        Posts</a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/pages/home.blade.php ENDPATH**/ ?>