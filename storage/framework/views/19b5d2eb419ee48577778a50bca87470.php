<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel | Washingtone Oruko'); ?></title>
    <link rel="icon" href="<?php echo e(asset('images/washingtone-oruko-icon.png')); ?>">
    <link href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <style>
        body { background-color: #f4f6fb; }
        .admin-sidebar { background-color: #1a1a2e; min-height: 100vh; }
        .admin-content { background-color: #f4f6fb; min-height: 100vh; }
        .sidebar-link { color: #a0aec0; padding: .55rem .85rem; border-radius: 8px; display:flex; align-items:center; gap:.6rem; text-decoration:none; font-size:.88rem; transition:.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,.1); color: #fff; }
        .sidebar-link.active { background: var(--bs-primary); color: #fff !important; }
        .sidebar-section { font-size:.7rem; text-transform:uppercase; letter-spacing:.08em; color:#718096; padding:.4rem .85rem; margin-top:.8rem; }
        .admin-top-nav { background:#fff; border-bottom:1px solid #e2e8f0; position:sticky; top:0; z-index:1020; }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

<?php echo $__env->make('admin.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container-fluid p-0">
    <div class="row g-0" style="min-height:100vh;">
        
        <div class="col-md-2 admin-sidebar d-none d-md-block">
            <?php echo $__env->make('admin.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        
        <div class="col-12 col-md-10 admin-content p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>