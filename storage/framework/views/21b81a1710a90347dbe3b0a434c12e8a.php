<?php $__env->startSection('title','Edit Service | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Edit: <?php echo e($service->title); ?></h4>
    <a href="<?php echo e(route('admin.services.index')); ?>" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
<?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<?php if($service->image): ?>
    <div class="mb-3"><img src="<?php echo e(asset('uploads/services/' . $service->image)); ?>" height="100" class="img-thumbnail rounded"></div>
<?php endif; ?>
<form action="<?php echo e(route('admin.services.update', $service->id)); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="row g-3">
        <div class="col-md-8"><label class="form-label fw-semibold">Service Title *</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $service->title)); ?>" required></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug', $service->slug)); ?>"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Icon (Font Awesome)</label>
            <div class="input-group">
                <span class="input-group-text"><i id="iconPreview" class="<?php echo e(old('icon', $service->icon)); ?>"></i></span>
                <input type="text" name="icon" id="iconInput" class="form-control" value="<?php echo e(old('icon', $service->icon)); ?>"
                    oninput="document.getElementById('iconPreview').className=this.value">
            </div></div>
        <div class="col-md-3"><label class="form-label fw-semibold">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?php echo e(old('sort_order', $service->sort_order)); ?>"></div>
        <div class="col-md-3 d-flex align-items-end pb-1">
            <div class="form-check">
                <input type="hidden" name="status" value="0">
                <input class="form-check-input" type="checkbox" name="status" value="1" id="status"
                    <?php echo e(old('status', $service->status) ? 'checked' : ''); ?>>
                <label class="form-check-label fw-semibold" for="status">Active</label>
            </div>
        </div>
        <div class="col-12"><label class="form-label fw-semibold">Short Description</label>
            <input type="text" name="short_description" class="form-control" value="<?php echo e(old('short_description', $service->short_description)); ?>"></div>
        <div class="col-12"><label class="form-label fw-semibold">Full Description</label>
            <textarea name="description" class="form-control" rows="6"><?php echo e(old('description', $service->description)); ?></textarea></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Replace Image <small class="text-muted">(optional)</small></label>
            <input type="file" name="image" class="form-control" accept="image/*"></div>
        <div class="col-12">
            <label class="form-label fw-semibold">What's Included (Features)</label>
            <div id="featuresContainer">
                <?php $__currentLoopData = old('features', $service->features ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-group mb-2 feature-row">
                    <input type="text" name="features[]" class="form-control" value="<?php echo e($feat); ?>">
                    <button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill mt-1" onclick="addFeature()">
                <i class="fas fa-plus me-1"></i>Add Feature
            </button>
        </div>
        <div class="col-12 d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Save Changes</button>
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/services/edit.blade.php ENDPATH**/ ?>