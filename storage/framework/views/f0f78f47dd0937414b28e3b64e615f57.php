<?php $__env->startSection('title','Store | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Store / My Book</h4>
    <a href="<?php echo e(route('admin.store.create')); ?>" class="btn btn-primary btn-sm px-4 rounded-pill">+ Add Product</a>
</div>
<?php if(session('success')): ?><div class="alert alert-success"><?php echo e(session('success')); ?></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th>Image</th><th>Title</th><th>Price</th><th>Featured</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><?php if($product->image): ?><img src="<?php echo e(asset('uploads/store/' . $product->image)); ?>" width="60" height="40" style="object-fit:cover;border-radius:5px;"><?php else: ?><span class="text-muted">—</span><?php endif; ?></td>
        <td><strong><?php echo e($product->title); ?></strong><br><small class="text-muted"><?php echo e(Str::limit($product->short_description, 50)); ?></small></td>
        <td class="fw-bold text-primary"><?php echo e($product->formatted_price); ?></td>
        <td><?php if($product->is_featured): ?><span class="badge bg-warning text-dark">⭐ Yes</span><?php else: ?><span class="text-muted">—</span><?php endif; ?></td>
        <td><span class="badge bg-<?php echo e($product->status === 'active' ? 'success' : 'secondary'); ?>"><?php echo e(ucfirst($product->status)); ?></span></td>
        <td class="d-flex gap-2">
            <a href="<?php echo e(route('admin.store.edit', $product->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
            <form action="<?php echo e(route('admin.store.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('Delete?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger btn-sm">Del</button></form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr><td colspan="6" class="text-center py-4 text-muted">No products yet.</td></tr>
    <?php endif; ?>
    </tbody>
</table></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/store/index.blade.php ENDPATH**/ ?>