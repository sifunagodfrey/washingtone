<?php $__env->startSection('title','Add Service | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Add Service</h4>
    <a href="<?php echo e(route('admin.services.index')); ?>" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
<?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form action="<?php echo e(route('admin.services.store')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?>
    <div class="row g-3">
        <div class="col-md-8"><label class="form-label fw-semibold">Service Title *</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" required placeholder="e.g. Corporate MC Services"></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Slug <small class="text-muted">(auto)</small></label>
            <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug')); ?>" placeholder="corporate-mc-services"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Icon <small class="text-muted">(Font Awesome class)</small></label>
            <div class="input-group">
                <span class="input-group-text"><i id="iconPreview" class="fas fa-star"></i></span>
                <input type="text" name="icon" id="iconInput" class="form-control" value="<?php echo e(old('icon', 'fas fa-star')); ?>" placeholder="fas fa-microphone" oninput="document.getElementById('iconPreview').className=this.value">
            </div></div>
        <div class="col-md-3"><label class="form-label fw-semibold">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?php echo e(old('sort_order', 0)); ?>"></div>
        <div class="col-md-3 d-flex align-items-end pb-1">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="status" id="status" checked>
            <label class="form-check-label" for="status">Active</label></div>
        </div>
        <div class="col-12"><label class="form-label fw-semibold">Short Description <small class="text-muted">(shown on cards)</small></label>
            <input type="text" name="short_description" class="form-control" value="<?php echo e(old('short_description')); ?>" placeholder="Brief one-line description"></div>
        <div class="col-12"><label class="form-label fw-semibold">Full Description</label>
            <textarea name="description" class="form-control" rows="6" placeholder="Full service description (HTML allowed)"><?php echo e(old('description')); ?></textarea></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Service Image</label>
            <input type="file" name="image" class="form-control" accept="image/*"></div>
        <div class="col-12">
            <label class="form-label fw-semibold">What's Included (Features)</label>
            <div id="featuresContainer">
                <div class="input-group mb-2 feature-row">
                    <input type="text" name="features[]" class="form-control" placeholder="e.g. Full event coordination">
                    <button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill mt-1" onclick="addFeature()"><i class="fas fa-plus me-1"></i>Add Feature</button>
        </div>
        <div class="col-12 d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Add Service</button>
            <a href="<?php echo e(route('admin.services.index')); ?>" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form></div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
function addFeature() {
    document.getElementById('featuresContainer').insertAdjacentHTML('beforeend',
        `<div class="input-group mb-2 feature-row"><input type="text" name="features[]" class="form-control" placeholder="Feature..."><button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button></div>`
    );
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/services/create.blade.php ENDPATH**/ ?>