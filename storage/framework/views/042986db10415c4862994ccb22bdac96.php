<?php $__env->startSection('title','Upload Image | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-primary mb-0">Upload Gallery Image</h4>
        <nav><ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>" class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.gallery.index')); ?>" class="text-primary">Gallery</a></li>
            <li class="breadcrumb-item active">Upload Gallery Image</li>
        </ol></nav>
    </div>
    
</div>
<?php if(session('success')): ?><div class="alert alert-success alert-dismissible fade show"><i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<?php if(session('error')): ?><div class="alert alert-danger"><?php echo e(session('error')); ?></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
<form action="<?php echo e(route('admin.gallery.store')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?>
    <div class="row g-3">
        <div class="col-md-12"><label class="form-label fw-semibold">Image * <small class="text-muted">(JPG, PNG, WEBP — max 4MB)</small></label>
            <input type="file" name="image" class="form-control" required accept="image/*"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Title</label><input type="text" name="title" class="form-control" placeholder="Optional title" value="<?php echo e(old('title')); ?>"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Category</label>
            <input type="text" name="category" class="form-control" placeholder="e.g. Corporate Events, Weddings" value="<?php echo e(old('category')); ?>"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Sort Order</label><input type="number" name="sort_order" class="form-control" value="0"></div>
        <div class="col-md-6 d-flex align-items-end"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="status" id="status" checked><label class="form-check-label" for="status">Visible on Gallery</label></div></div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Upload</button>
            <a href="<?php echo e(route('admin.gallery.index')); ?>" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/gallery/create.blade.php ENDPATH**/ ?>