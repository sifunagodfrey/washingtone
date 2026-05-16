<?php $__env->startSection('title', $blog->title . ' | Washingtone Oruko Blog'); ?>
<?php $__env->startSection('meta_description', Str::limit(strip_tags($blog->content), 160)); ?>
<?php $__env->startSection('content'); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-90"></div>
    <div class="container position-relative py-3">
        <?php if($blog->category): ?><span class="badge bg-warning text-dark mb-2"><?php echo e($blog->category->name); ?></span><?php endif; ?>
        <h1 class="fw-bold mb-2 col-lg-9"><?php echo e($blog->title); ?></h1>
        <small class="text-white-75"><i class="fas fa-calendar me-2"></i><?php echo e($blog->published_at?->format('F j, Y')); ?></small>
        <nav aria-label="breadcrumb" class="mt-2"><ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('blog.index')); ?>" class="text-warning">Blog</a></li>
            <li class="breadcrumb-item active text-white"><?php echo e(Str::limit($blog->title, 40)); ?></li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if($blog->featured_image): ?>
                <img src="<?php echo e(asset('uploads/blogs/' . $blog->featured_image)); ?>" class="img-fluid rounded shadow w-100 mb-4" style="max-height:420px;object-fit:cover;" alt="<?php echo e($blog->title); ?>">
                <?php endif; ?>
                <div class="card border-0 shadow-sm p-4 p-lg-5">
                    <div class="blog-content text-muted lh-lg"><?php echo $blog->content; ?></div>
                </div>
                <div class="mt-4 d-flex gap-3">
                    <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-outline-primary rounded-pill px-4"><i class="fas fa-arrow-left me-2"></i>All Posts</a>
                    <?php $wa = preg_replace('/[^0-9]/', '', optional(\App\Models\Setting::first())->whatsapp_number ?? '254700000000'); ?>
                    <a href="https://wa.me/<?php echo e($wa); ?>?text=Hi%20Washingtone%2C%20I%20just%20read%20your%20article%20%22<?php echo e(urlencode($blog->title)); ?>%22" target="_blank" class="btn btn-success rounded-pill px-4"><i class="fab fa-whatsapp me-2"></i>Share on WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style>.blog-content h1,.blog-content h2,.blog-content h3{color:var(--bs-primary);font-weight:700;}.blog-content p{margin-bottom:1.2rem;}.blog-content ul,.blog-content ol{padding-left:1.5rem;margin-bottom:1.2rem;}</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/blog/show.blade.php ENDPATH**/ ?>