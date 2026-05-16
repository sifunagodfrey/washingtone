
<footer class="position-relative text-white border-top border-light overflow-hidden" data-aos="fade-up" data-aos-duration="1000">

    
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <img src="<?php echo e(asset('images/people-loading-track.jpg')); ?>" alt="Neptune Movers Footer Background"
            class="w-100 h-100 object-fit-cover opacity-25">
    </div>

    
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>

    
    <div class="position-relative">

        <div class="container py-5">

            <div class="row g-4">

                <?php
                    $settings = \App\Models\Setting::first();
                ?>

                
                <div class="col-lg-3 col-md-6">

                    <img src="<?php echo e(asset('images/neptunes-movers-and-relocators-logo.png')); ?>" height="40"
                        alt="Neptune’s Movers & Relocators" class="bg-white p-1 rounded">

                    <p class="mt-3 text-white-50 small">
                        Neptune’s Movers & Relocators is a trusted moving company specializing in
                        residential, office, and inter-county relocations across Kenya.
                        We deliver safe, efficient, and stress-free moving experiences built on care and
                        professionalism.
                    </p>

                </div>

                
                <div class="col-lg-3 col-md-6">

                    <h6 class="fw-bold mb-3">Top Links</h6>

                    <ul class="list-unstyled">

                        <li class="mb-2">
                            <a href="<?php echo e(route('home')); ?>" class="text-decoration-none text-white">Home</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('about')); ?>" class="text-decoration-none text-white">About Us</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('services.index')); ?>" class="text-decoration-none text-white">Services</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('gallery')); ?>" class="text-decoration-none text-white">Gallery</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('contact')); ?>" class="text-decoration-none text-white">Contact</a>
                        </li>

                    </ul>

                </div>

                
                <div class="col-lg-3 col-md-6">

                    <h6 class="fw-bold mb-3">Company</h6>

                    <ul class="list-unstyled">

                        <li class="mb-2">
                            <a href="<?php echo e(route('guide')); ?>" class="text-white text-decoration-none">Moving Guide</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('testimonials')); ?>"
                                class="text-white text-decoration-none">Testimonials</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('blog.index')); ?>" class="text-white text-decoration-none">Blog</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('privacy')); ?>" class="text-white text-decoration-none">Privacy Policy</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('terms')); ?>" class="text-white text-decoration-none">Terms &
                                Conditions</a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('faq')); ?>" class="text-white text-decoration-none">FAQ</a>
                        </li>

                    </ul>

                </div>

                
                <div class="col-lg-3 col-md-6">

                    <h6 class="fw-bold mb-3">Contact Us</h6>

                    <p class="small mb-2">
                        <i class="fa fa-map-marker-alt me-2 fa-lg"></i>
                        Office 307, Applewood Plaza, Ngong Road, Kilimani, Nairobi
                    </p>

                    <p class="small mb-2">
                        <i class="fa fa-phone me-2 fa-lg"></i>
                        0702433233
                    </p>

                    <p class="small mb-3">
                        <i class="fab fa-whatsapp me-2 fa-lg"></i>
                        <a href="https://wa.me/254702433233" class="text-white text-decoration-none">
                            Chat on WhatsApp
                        </a>
                    </p>

                    
                    <div class="d-flex gap-3 mt-3">
                        <a href="https://www.facebook.com/profile.php?id=61570674410356" class="text-white"
                            target="_blank">
                            <i class="fab fa-facebook fa-xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/neptunes-movers-and-relocators" class="text-white"
                            target="_blank">
                            <i class="fab fa-linkedin fa-xl"></i>
                        </a>
                        <a href="https://www.tiktok.com/@neptunes_movers" class="text-white" target="_blank">
                            <i class="fab fa-tiktok fa-xl"></i>
                        </a>
                        <a href="https://x.com/NeptunesMovers" class="text-white" target="_blank">
                            <i class="fab fa-twitter fa-xl"></i>
                        </a>
                    </div>

                </div>

            </div>

            <hr class="border-light mt-4">

            <div class="text-center small text-white-50">
                © <?php echo e(date('Y')); ?> Neptune’s Movers & Relocators. All rights reserved.
            </div>

        </div>

    </div>

</footer>
<?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>