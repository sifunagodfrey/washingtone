<?php $__env->startSection('title','Gallery | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-primary mb-0">Gallery</h4>
        <nav><ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>" class="text-primary">Dashboard</a></li>
            
            <li class="breadcrumb-item active">Gallery</li>
        </ol></nav>
    </div>
    <a href="<?php echo e(route('admin.gallery.create')); ?>" class="btn btn-primary btn-sm px-4 rounded-pill">+ Upload Image</a>
</div>
<?php if(session('success')): ?><div class="alert alert-success alert-dismissible fade show"><i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<?php if(session('error')): ?><div class="alert alert-danger"><?php echo e(session('error')); ?></div><?php endif; ?>
<div class="row g-3">
<?php $__empty_1 = true; $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="col-6 col-md-3 col-lg-2">
    <div class="card border-0 shadow-sm">
        <img src="<?php echo e(asset('uploads/gallery/' . $img->image)); ?>" class="card-img-top" style="height:130px;object-fit:cover;">
        <div class="card-body p-2 text-center">
            <small class="d-block text-muted text-truncate"><?php echo e($img->title ?? 'Untitled'); ?></small>
            <small class="badge bg-<?php echo e($img->status ? 'success' : 'secondary'); ?>"><?php echo e($img->status ? 'Visible' : 'Hidden'); ?></small>
            <div class="d-flex gap-1 mt-2 justify-content-center">
                <a href="<?php echo e(route('admin.gallery.edit', $img->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?php echo e(route('admin.gallery.destroy', $img->id)); ?>" method="POST" onsubmit="return confirm('Delete?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm">Del</button></form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="col-12 text-center py-5 text-muted"><i class="fas fa-images fa-3x mb-2 d-block"></i>No images yet.</div>
<?php endif; ?>
</div>
<div class="mt-4"><?php echo e($images->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/gallery/index.blade.php ENDPATH**/ ?>