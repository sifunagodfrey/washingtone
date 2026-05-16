<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4" style="background-color:#f8f9fa; min-height:100vh;">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0">Blogs</h2>
                <small class="text-muted">Manage all published and draft articles</small>
            </div>

            <a href="<?php echo e(route('admin.blogs.create')); ?>" class="btn btn-primary">
                + Add Blog
            </a>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success shadow-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-end" style="width: 220px;">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    
                                    <td class="text-muted">
                                        <?php echo e($blog->id); ?>

                                    </td>

                                    
                                    <td>
                                        <?php if($blog->featured_image): ?>
                                            <img src="<?php echo e(url('public/uploads/blogs/' . $blog->featured_image)); ?>"
                                                width="70" height="45" class="rounded" style="object-fit:cover;">
                                        <?php else: ?>
                                            <span class="text-muted small">No Image</span>
                                        <?php endif; ?>
                                    </td>

                                    
                                    <td>
                                        <div class="fw-semibold">
                                            <?php echo e($blog->title); ?>

                                        </div>

                                        <div class="text-muted small">
                                            <?php echo e(\Illuminate\Support\Str::limit(strip_tags($blog->content), 70)); ?>

                                        </div>
                                    </td>

                                    
                                    <td>
                                        <span class="text-dark">
                                            <?php echo e($blog->category->name ?? '-'); ?>

                                        </span>
                                    </td>

                                    
                                    <td>
                                        <span
                                            class="badge bg-<?php echo e($blog->status === 'published' ? 'success' : 'secondary'); ?>">
                                            <?php echo e(ucfirst($blog->status)); ?>

                                        </span>
                                    </td>

                                    
                                    <td class="text-end">

                                        <div class="btn-group" role="group">

                                            <a href="<?php echo e(route('admin.blogs.show', $blog->id)); ?>"
                                                class="btn btn-sm btn-outline-info">
                                                View
                                            </a>

                                            <a href="<?php echo e(route('admin.blogs.edit', $blog->id)); ?>"
                                                class="btn btn-sm btn-outline-warning">
                                                Edit
                                            </a>

                                            <form method="POST" action="<?php echo e(route('admin.blogs.destroy', $blog->id)); ?>"
                                                onsubmit="return confirm('Delete this blog?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>

                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        No blogs found
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/blogs/index.blade.php ENDPATH**/ ?>