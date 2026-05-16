<?php $__env->startSection('title', 'Blog | Washingtone Oruko'); ?>
<?php $__env->startSection('meta_description', 'Insights on personal development, leadership, and event management from Washingtone Oruko.'); ?>
<?php $__env->startSection('content'); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-90"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">Blog</h1>
        <p class="text-white-75">Insights from Washingtone Oruko</p>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">Blog</li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e(($loop->index % 6) * 100); ?>">
                <a href="<?php echo e(route('blog.show', $blog->slug)); ?>" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm h-100">
                        <?php if($blog->featured_image): ?>
                        <img src="<?php echo e(asset('uploads/blogs/' . $blog->featured_image)); ?>" class="card-img-top" style="height:210px;object-fit:cover;">
                        <?php else: ?>
                        <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height:210px;"><i class="fas fa-pen-nib fa-3x text-warning"></i></div>
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <?php if($blog->category): ?><span class="badge bg-primary mb-2 align-self-start"><?php echo e($blog->category->name); ?></span><?php endif; ?>
                            <h6 class="fw-bold mb-2"><?php echo e($blog->title); ?></h6>
                            <p class="small text-muted mb-3"><?php echo e(Str::limit(strip_tags($blog->content), 100)); ?></p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="btn btn-sm btn-outline-primary rounded-pill">Read More →</span>
                                <small class="text-muted"><?php echo e($blog->published_at?->diffForHumans()); ?></small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5 text-muted"><i class="fas fa-pen-nib fa-3x mb-3 d-block"></i><h5>No blog posts yet.</h5></div>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-5"><?php echo e($blogs->links()); ?></div>
    </div>
</section>
<?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/blog/index.blade.php ENDPATH**/ ?>