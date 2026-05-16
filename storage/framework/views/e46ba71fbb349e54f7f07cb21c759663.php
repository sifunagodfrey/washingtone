<?php $__env->startSection('title', $service->title . ' | Washingtone Oruko'); ?>
<?php $__env->startSection('meta_description', $service->short_description ?? strip_tags(Str::limit($service->description, 160))); ?>
<?php $__env->startSection('content'); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-90"></div>
    <div class="container position-relative text-center py-3">
        <h1 class="fw-bold mb-1"><?php echo e($service->title); ?></h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('services.index')); ?>" class="text-warning">Services</a></li>
            <li class="breadcrumb-item active text-white"><?php echo e($service->title); ?></li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5" data-aos="fade-right">
                <?php if($service->image): ?>
                <img src="<?php echo e(asset('uploads/services/' . $service->image)); ?>" class="img-fluid rounded shadow w-100" style="max-height:420px;object-fit:cover;" alt="<?php echo e($service->title); ?>">
                <?php else: ?>
                <div class="bg-primary rounded d-flex align-items-center justify-content-center shadow" style="height:320px;">
                    <i class="<?php echo e($service->icon ?? 'fas fa-star'); ?> fa-6x text-warning"></i>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <span class="badge bg-primary text-white mb-3 px-3 py-2">Service</span>
                <h2 class="fw-bold text-primary mb-3"><?php echo e($service->title); ?></h2>
                <?php if($service->short_description): ?><p class="lead text-muted mb-4"><?php echo e($service->short_description); ?></p><?php endif; ?>
                <div class="text-muted mb-4"><?php echo $service->description; ?></div>
                <?php if($service->features): ?>
                <h5 class="fw-bold text-primary mt-4 mb-3">What's Included</h5>
                <ul class="list-unstyled">
                    <?php $__currentLoopData = $service->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="d-flex align-items-center gap-2 mb-2"><i class="fas fa-check-circle text-success"></i><span><?php echo e($feature); ?></span></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
                <div class="d-flex gap-3 mt-4">
                    <a href="<?php echo e(route('contact.index')); ?>" class="btn btn-primary px-4 rounded-pill fw-semibold">Book This Service</a>
                    <a href="<?php echo e(route('rate-card')); ?>" class="btn btn-outline-warning px-4 rounded-pill">View Rate Card</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/services/show.blade.php ENDPATH**/ ?>