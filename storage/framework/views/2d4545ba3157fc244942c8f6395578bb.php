<?php $__env->startSection('title', '404 — Page Not Found | Washingtone Oruko'); ?>
<?php $__env->startSection('content'); ?>
<section class="min-vh-100 d-flex align-items-center justify-content-center bg-light text-center py-5" data-aos="fade-up">
    <div>
        <div class="display-1 fw-bold text-primary">404</div>
        <h2 class="fw-bold mb-3">Page Not Found</h2>
        <p class="text-muted mb-4">The page you're looking for doesn't exist or has been moved.</p>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-primary px-5 rounded-pill">
            <i class="fas fa-home me-2"></i>Back to Home
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/errors/404.blade.php ENDPATH**/ ?>