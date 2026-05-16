<?php $__env->startSection('title','Rate Card | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Rate Card Packages</h4>
    <a href="<?php echo e(route('admin.rate-card.create')); ?>" class="btn btn-primary btn-sm px-4 rounded-pill">+ Add Package</a>
</div>
<?php if(session('success')): ?><div class="alert alert-success"><?php echo e(session('success')); ?></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th>#</th><th>Category</th><th>Package</th><th>Price</th><th>Per</th><th>Featured</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><?php echo e($pkg->id); ?></td>
        <td><span class="badge bg-light text-dark"><?php echo e($pkg->category); ?></span></td>
        <td><strong><?php echo e($pkg->title); ?></strong></td>
        <td class="fw-bold text-primary">KES <?php echo e(number_format($pkg->price)); ?></td>
        <td class="text-muted"><?php echo e($pkg->price_suffix ?? '—'); ?></td>
        <td><?php if($pkg->is_featured): ?><span class="badge bg-warning text-dark">⭐ Featured</span><?php else: ?><span class="text-muted">—</span><?php endif; ?></td>
        <td><span class="badge bg-<?php echo e($pkg->status ? 'success' : 'secondary'); ?>"><?php echo e($pkg->status ? 'Active' : 'Hidden'); ?></span></td>
        <td class="d-flex gap-2">
            <a href="<?php echo e(route('admin.rate-card.edit', $pkg->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
            <form action="<?php echo e(route('admin.rate-card.destroy', $pkg->id)); ?>" method="POST" onsubmit="return confirm('Delete?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger btn-sm">Del</button></form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr><td colspan="8" class="text-center py-4 text-muted">No packages yet.</td></tr>
    <?php endif; ?>
    </tbody>
</table></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/rate-card/index.blade.php ENDPATH**/ ?>