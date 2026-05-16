<?php $__env->startSection('title','Videos | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-primary mb-0">Videos</h4>
        <nav><ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>" class="text-primary">Dashboard</a></li>
            
            <li class="breadcrumb-item active">Videos</li>
        </ol></nav>
    </div>
    <a href="<?php echo e(route('admin.videos.create')); ?>" class="btn btn-primary btn-sm px-4 rounded-pill">+ Add Video</a>
</div>
<?php if(session('success')): ?><div class="alert alert-success alert-dismissible fade show"><i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<?php if(session('error')): ?><div class="alert alert-danger"><?php echo e(session('error')); ?></div><?php endif; ?>
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th>Thumbnail</th><th>Title</th><th>YouTube ID</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><img src="<?php echo e($video->thumbnail_url); ?>" width="100" height="60" style="object-fit:cover;border-radius:6px;" alt=""></td>
        <td><strong><?php echo e($video->title); ?></strong></td>
        <td><a href="<?php echo e($video->youtube_url); ?>" target="_blank" class="text-primary small"><?php echo e($video->youtube_id); ?></a></td>
        <td><span class="badge bg-<?php echo e($video->status ? 'success' : 'secondary'); ?>"><?php echo e($video->status ? 'Active' : 'Hidden'); ?></span></td>
        <td class="d-flex gap-2">
            <a href="<?php echo e(route('admin.videos.edit', $video->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
            <form action="<?php echo e(route('admin.videos.destroy', $video->id)); ?>" method="POST" onsubmit="return confirm('Delete?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger btn-sm">Delete</button></form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr><td colspan="5" class="text-center py-4 text-muted">No videos yet.</td></tr>
    <?php endif; ?>
    </tbody>
</table></div></div>
<div class="mt-3"><?php echo e($videos->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/videos/index.blade.php ENDPATH**/ ?>