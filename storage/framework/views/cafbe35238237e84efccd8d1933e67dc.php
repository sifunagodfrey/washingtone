<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Washingtone Oruko — Corporate MC, Life Coach & Author'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Washingtone Oruko — Corporate MC, Life Coach, Author of Realign Your Compass, and Team Building Facilitator based in Nairobi, Kenya.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'corporate MC Kenya, life coach Nairobi, team building Kenya, motivational speaker, Washingtone Oruko'); ?>">
    <link rel="canonical" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Washingtone Oruko">
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'Washingtone Oruko — Corporate MC & Life Coach'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('og_description', 'Corporate MC, Life Coach, Author and Team Building Facilitator based in Nairobi, Kenya.'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/washingtone-oruko-on-stage-singing-3-main.jpg')); ?>">
    <meta property="og:url" content="<?php echo $__env->yieldContent('og_url', url()->current()); ?>">
    <meta property="og:locale" content="en_KE">

    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@odywuor">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter_title', 'Washingtone Oruko — Corporate MC & Life Coach'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('twitter_description', 'Corporate MC, Life Coach, Author and Team Building Facilitator based in Nairobi, Kenya.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('twitter_image', asset('images/washingtone-oruko-on-stage-singing-3-main.jpg')); ?>">

    
    <link rel="icon" href="<?php echo e(asset('images/washingtone-oruko-icon.png')); ?>">

    
    <link href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

    <?php echo $__env->make('frontend.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('frontend.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 80 });
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>