<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title><?php echo $__env->yieldContent('title', 'Neptunes Movers & Relocators'); ?></title>

    
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Professional home, office, and inter-county moving services in Kenya. Safe, reliable, and stress-free relocation.'); ?>">

    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'moving company Kenya, house movers, office relocation, inter-county movers, packing services'); ?>">

    <link rel="canonical" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <meta property="og:type" content="website">

    <meta property="og:site_name" content="Neptunes Movers & Relocators">

    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', trim($__env->yieldContent('title', 'Neptunes Movers & Relocators'))); ?>">

    <meta property="og:description" content="<?php echo $__env->yieldContent('og_description', trim($__env->yieldContent('meta_description', 'Safe, professional and reliable moving services in Kenya.'))); ?>">

    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/person-pushing-luggage.jpg')); ?>">

    <meta property="og:url" content="<?php echo $__env->yieldContent('og_url', url()->current()); ?>">

    <meta property="og:locale" content="en_KE">

    
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter_title', trim($__env->yieldContent('title', 'Neptunes Movers & Relocators'))); ?>">

    <meta name="twitter:description" content="<?php echo $__env->yieldContent('twitter_description', trim($__env->yieldContent('meta_description', 'Safe and professional moving services for homes and businesses.'))); ?>">

    <meta name="twitter:image" content="<?php echo $__env->yieldContent('twitter_image', asset('images/person-pushing-luggage.jpg')); ?>">

    
    <link rel="icon" href="<?php echo e(asset('images/neptunes-movers-and-relocators-icon.png')); ?>">

    
    <link href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

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
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 80
        });
    </script>

    
    <?php echo $__env->make('frontend.partials.chat-widget', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>