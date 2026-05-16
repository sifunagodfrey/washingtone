
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top" data-aos="fade-down" data-aos-duration="1000">

    <div class="container position-relative">

        
        <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('images/neptunes-movers-and-relocators-logo.png')); ?>" height="45" alt="Neptune's Movers">
        </a>

        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-primary <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"
                        href="<?php echo e(route('home')); ?>">
                        Home
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-primary <?php echo e(request()->routeIs('services*') ? 'active' : ''); ?>"
                        href="<?php echo e(route('services.index')); ?>">
                        Our Services
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-primary <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>"
                        href="<?php echo e(route('about')); ?>">
                        About Us
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-primary <?php echo e(request()->routeIs('faq*') ? 'active' : ''); ?>"
                        href="<?php echo e(route('faq')); ?>">
                        FAQs
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-primary <?php echo e(request()->routeIs('gallery') ? 'active' : ''); ?>"
                        href="<?php echo e(route('gallery')); ?>">
                        Gallery
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-primary <?php echo e(request()->routeIs('blog*') ? 'active' : ''); ?>"
                        href="<?php echo e(route('blog.index')); ?>">
                        Blog
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-primary <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>"
                        href="<?php echo e(route('contact')); ?>">
                        Contact Us
                    </a>
                </li>

                
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a class="btn btn-primary px-4 rounded-pill" href="<?php echo e(route('frontend.quotations.create')); ?>">
                        Request a Quote
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>
<?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/frontend/partials/navbar.blade.php ENDPATH**/ ?>