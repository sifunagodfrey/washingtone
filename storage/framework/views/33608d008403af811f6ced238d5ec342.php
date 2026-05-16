<?php $__env->startSection('title','Edit Product | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Edit: <?php echo e($product->title); ?></h4>
    <a href="<?php echo e(route('admin.store.index')); ?>" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
<?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<?php if($product->image): ?><div class="mb-3"><img src="<?php echo e(asset('uploads/store/' . $product->image)); ?>" height="100" class="img-thumbnail rounded" alt=""></div><?php endif; ?>
<form action="<?php echo e(route('admin.store.update', $product->id)); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="row g-3">
        <div class="col-md-8"><label class="form-label fw-semibold">Product Title *</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $product->title)); ?>" required></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug', $product->slug)); ?>"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Price (KES) *</label>
            <input type="number" name="price" class="form-control" value="<?php echo e(old('price', $product->price)); ?>" required step="0.01"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Replace Image <small class="text-muted">(optional)</small></label>
            <input type="file" name="image" class="form-control" accept="image/*"></div>
        <div class="col-12"><label class="form-label fw-semibold">Short Description</label>
            <input type="text" name="short_description" class="form-control" value="<?php echo e(old('short_description', $product->short_description)); ?>"></div>
        <div class="col-12"><label class="form-label fw-semibold">Full Description</label>
            <textarea name="description" class="form-control" rows="8"><?php echo e(old('description', $product->description)); ?></textarea></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Stock Quantity</label>
            <input type="number" name="stock_quantity" class="form-control" value="<?php echo e(old('stock_quantity', $product->stock_quantity)); ?>" min="0"></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select">
                <?php $__currentLoopData = ['active','inactive','out_of_stock']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($s); ?>" <?php echo e($product->status == $s ? 'selected' : ''); ?>><?php echo e(ucfirst(str_replace('_',' ',$s))); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-4 d-flex align-items-end pb-1">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" <?php echo e($product->is_featured ? 'checked' : ''); ?>>
            <label class="form-check-label fw-semibold" for="is_featured">⭐ Featured Product</label></div>
        </div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Save Changes</button>
            <a href="<?php echo e(route('admin.store.index')); ?>" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/store/edit.blade.php ENDPATH**/ ?>