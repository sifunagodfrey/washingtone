<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Neptune Movers</title>

    <link rel="icon" href="<?php echo e(asset('images/neptunes-movers-and-relocators-icon.png')); ?>">

    <link href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">

    <style>
        body {
            background-color: #f2f2f2;
        }

        .admin-wrapper {
            min-height: 100vh;
        }

        .admin-sidebar {
            background-color: #f2f2f2;
            min-height: 100vh;
        }

        .admin-content {
            background-color: #ffffff;
            min-height: 100vh;
        }
    </style>

</head>

<body>

    <?php echo $__env->make('admin.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="container-fluid admin-wrapper">

        <div class="row g-0">

            
            <div class="col-md-2 admin-sidebar">

                <?php echo $__env->make('admin.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            </div>

            
            <div class="col-md-10 admin-content p-4">

                <?php echo $__env->yieldContent('content'); ?>

            </div>

        </div>

    </div>

    <?php echo $__env->make('admin.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="<?php echo e(asset('bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>