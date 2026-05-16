
<?php
    $settings = \App\Models\Setting::first();
    $wa = preg_replace('/[^0-9]/', '', $settings->whatsapp_number ?? '254700000000');
?>
<section class="py-5 bg-primary overflow-hidden" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h2 class="fw-bold text-white mb-2">Ready to Work with Washingtone?</h2>
                <p class="text-white mb-0">
                    Whether it's your corporate event, team building, or a copy of <em>Realign Your Compass</em> let's
                    make it happen.
                </p>
            </div>
            <div class="col-lg-4 d-flex flex-wrap gap-3 justify-content-lg-end">
                <a href="<?php echo e(route('contact.index')); ?>" class="btn btn-warning btn-lg px-4 rounded-pill fw-semibold">
                    <i class="fas fa-envelope me-2"></i>Get In Touch
                </a>
                <a href="https://wa.me/<?php echo e($wa); ?>?text=Hi%20Washingtone%2C%20I%27d%20like%20to%20book%20you%20for%20an%20event."
                    target="_blank" class="btn btn-success btn-lg px-4 rounded-pill fw-semibold">
                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/partials/cta.blade.php ENDPATH**/ ?>