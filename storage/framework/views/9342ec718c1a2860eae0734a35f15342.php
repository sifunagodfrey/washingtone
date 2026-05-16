<?php $__env->startSection('title', 'My Book | Washingtone Oruko — Realign Your Compass'); ?>
<?php $__env->startSection('meta_description', 'Order Realign Your Compass by Washingtone Oruko. Pay via M-Pesa or WhatsApp.'); ?>
<?php $__env->startSection('content'); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-90"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">My Book</h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">My Book</li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-6 col-lg-5" data-aos="fade-up">
                <div class="card border-0 shadow-lg h-100">
                    <?php if($product->image): ?>
                    <img src="<?php echo e(asset('uploads/store/' . $product->image)); ?>" class="card-img-top" style="height:320px;object-fit:cover;">
                    <?php else: ?>
                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height:320px;">
                        <i class="fas fa-book fa-6x text-warning"></i>
                    </div>
                    <?php endif; ?>
                    <div class="card-body p-4">
                        <?php if($product->is_featured): ?><span class="badge bg-warning text-dark mb-2">⭐ Featured Book</span><?php endif; ?>
                        <h4 class="fw-bold mb-2"><?php echo e($product->title); ?></h4>
                        <p class="text-muted mb-3"><?php echo e($product->short_description); ?></p>
                        <div class="fw-bold text-primary fs-4 mb-3"><?php echo e($product->formatted_price); ?></div>
                        <a href="<?php echo e(route('store.show', $product->slug)); ?>" class="btn btn-primary w-100 rounded-pill fw-semibold py-2">
                            <i class="fas fa-book-open me-2"></i>View & Order
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5 text-muted"><i class="fas fa-book fa-4x mb-3 d-block"></i><h5>Coming Soon</h5></div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/store/index.blade.php ENDPATH**/ ?>