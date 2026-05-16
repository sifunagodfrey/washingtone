<?php $__env->startSection('title', 'My Services | Washingtone Oruko'); ?>
<?php $__env->startSection('meta_description', 'Explore all services offered by Washingtone Oruko — Corporate MC, Team Building, Life Coaching, Theatre and more.'); ?>
<?php $__env->startSection('content'); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100"><img src="<?php echo e(asset('images/washintone-in-conference-presenting-gift.jpg')); ?>" class="w-100 h-100 object-fit-cover opacity-20" alt=""></div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">My Services</h1>
        <p class="text-white-75">Professional services delivered with passion and excellence</p>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">Services</li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e(($loop->index % 6) * 100); ?>">
                <a href="<?php echo e(route('services.show', $service->slug)); ?>" class="text-decoration-none text-dark h-100">
                    <div class="card border-0 shadow-sm h-100" style="transition:.3s;">
                        <?php if($service->image): ?>
                        <img src="<?php echo e(asset('uploads/services/' . $service->image)); ?>" class="card-img-top" style="height:220px;object-fit:cover;">
                        <?php else: ?>
                        <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height:220px;">
                            <i class="<?php echo e($service->icon ?? 'fas fa-star'); ?> fa-4x text-warning"></i>
                        </div>
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold mb-2"><?php echo e($service->title); ?></h5>
                            <p class="text-muted small mb-3"><?php echo e(Str::limit(strip_tags($service->short_description ?? $service->description), 110)); ?></p>
                            <div class="mt-auto">
                                <span class="btn btn-sm btn-outline-primary rounded-pill">Learn More →</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5 text-muted"><i class="fas fa-briefcase fa-3x mb-3 d-block"></i><h5>Services coming soon.</h5></div>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-5"><?php echo e($services->links()); ?></div>
    </div>
</section>
<?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/services/index.blade.php ENDPATH**/ ?>