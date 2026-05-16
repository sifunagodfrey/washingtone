<?php $__env->startSection('title','Edit Package | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold text-primary mb-0">Edit Package</h4>
    <a href="<?php echo e(route('admin.rate-card.index')); ?>" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
<?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form action="<?php echo e(route('admin.rate-card.update', $package->id)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label fw-semibold">Category *</label>
            <input type="text" name="category" class="form-control" value="<?php echo e(old('category', $package->category)); ?>" list="cats" required>
            <datalist id="cats"><option value="MC Services"><option value="Team Building"><option value="Dance Classes"><option value="Coaching"></datalist></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Title *</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $package->title)); ?>" required placeholder="Package name"></div>
        <div class="col-md-5"><label class="form-label fw-semibold">Price (KES) *</label>
            <input type="number" name="price" class="form-control" value="<?php echo e(old('price', $package->price)); ?>" required step="0.01" min="0"></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Price Suffix</label>
            <input type="text" name="price_suffix" class="form-control" value="<?php echo e(old('price_suffix', $package->price_suffix)); ?>" placeholder="e.g. per person"></div>
        <div class="col-md-3"><label class="form-label fw-semibold">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?php echo e(old('sort_order', $package->sort_order)); ?>"></div>
        <div class="col-12"><label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="2" placeholder="Short package description"><?php echo e(old('description', $package->description)); ?></textarea></div>
        <div class="col-12">
            <label class="form-label fw-semibold">Package Features <small class="text-muted">(one per line)</small></label>
            <div id="featuresContainer">
                <?php $__currentLoopData = old('features', $package->features ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-group mb-2 feature-row">
                    <input type="text" name="features[]" class="form-control" value="<?php echo e($feat); ?>" placeholder="e.g. Full event coordination">
                    <button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(!old('features', $package->features ?? []) || count(old('features', $package->features ?? [])) == 0): ?>
                <div class="input-group mb-2 feature-row">
                    <input type="text" name="features[]" class="form-control" placeholder="e.g. Full event coordination">
                    <button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button>
                </div>
                <?php endif; ?>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" onclick="addFeature()"><i class="fas fa-plus me-1"></i>Add Feature</button>
        </div>
        <div class="col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" <?php echo e($package->is_featured ? 'checked' : ''); ?>><label class="form-check-label" for="is_featured">⭐ Featured Package</label></div></div>
        <div class="col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="status" id="status" <?php echo e($package->status ? 'checked' : ''); ?>><label class="form-check-label" for="status">Active (visible)</label></div></div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Edit Package</button>
            <a href="<?php echo e(route('admin.rate-card.index')); ?>" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
function addFeature() {
    const c = document.getElementById('featuresContainer');
    c.insertAdjacentHTML('beforeend',`<div class="input-group mb-2 feature-row"><input type="text" name="features[]" class="form-control" placeholder="Feature..."><button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button></div>`);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/rate-card/edit.blade.php ENDPATH**/ ?>