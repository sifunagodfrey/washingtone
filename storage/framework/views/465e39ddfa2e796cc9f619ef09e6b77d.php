<?php $__env->startSection('title', 'Videos | Washingtone Oruko'); ?>
<?php $__env->startSection('meta_description', 'Watch Washingtone Oruko in action — MC, team building, motivational talks and more on YouTube.'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <img src="<?php echo e(asset('images/washingtone-oruko-on-stage-singing-3-main.jpg')); ?>" class="w-100 h-100 object-fit-cover opacity-20" alt="">
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">Videos</h1>
        <p class="text-white-75 mb-0">Watch Washingtone in action</p>
        <nav aria-label="breadcrumb" class="mt-2"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">Videos</li>
        </ol></nav>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e(($loop->index % 6) * 100); ?>">
                <div class="card border-0 shadow-sm h-100">
                    <div class="ratio ratio-16x9">
                        <iframe src="<?php echo e($video->embed_url); ?>" title="<?php echo e($video->title); ?>"
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen class="rounded-top"></iframe>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold mb-1"><?php echo e($video->title); ?></h6>
                        <?php if($video->description): ?>
                        <p class="small text-muted mb-0"><?php echo e($video->description); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5 text-muted">
                <i class="fab fa-youtube fa-4x mb-3 d-block text-danger"></i>
                <h5>Videos coming soon!</h5>
                <p>Subscribe to Washingtone's YouTube channel for the latest content.</p>
                <a href="https://youtube.com/@washythemotivator4900" target="_blank" class="btn btn-danger rounded-pill px-4">
                    <i class="fab fa-youtube me-2"></i>Subscribe on YouTube
                </a>
            </div>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-5"><?php echo e($videos->links()); ?></div>

        
        <div class="text-center mt-5 py-4 bg-white rounded shadow-sm" data-aos="fade-up">
            <i class="fab fa-youtube fa-3x text-danger mb-3 d-block"></i>
            <h4 class="fw-bold">Watch More on YouTube</h4>
            <p class="text-muted">Subscribe to Washingtone's channel for motivational talks, event highlights and more.</p>
            <a href="https://youtube.com/@washythemotivator4900" target="_blank" class="btn btn-danger btn-lg px-5 rounded-pill">
                <i class="fab fa-youtube me-2"></i>Visit Channel
            </a>
        </div>
    </div>
</section>

<?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/pages/videos.blade.php ENDPATH**/ ?>