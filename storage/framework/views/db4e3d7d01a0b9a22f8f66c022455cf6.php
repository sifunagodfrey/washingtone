<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid py-3" style="background-color: #ffffff; min-height: 100vh;">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">
                Services
            </h2>

            <a href="<?php echo e(route('admin.services.create')); ?>" class="btn btn-primary">
                + Add Service
            </a>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <table class="table table-hover mb-0 align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>

                                
                                <td><?php echo e($service->id); ?></td>

                                
                                <td>
                                    <?php if($service->image): ?>
                                        <img src="<?php echo e(url('public/uploads/services/' . $service->image)); ?>" width="60"
                                            height="40" style="object-fit: cover; border-radius: 5px;">
                                    <?php else: ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <strong><?php echo e($service->title); ?></strong>
                                    <div class="small text-muted">
                                        <?php echo e(\Illuminate\Support\Str::limit($service->description, 60)); ?>

                                    </div>
                                </td>

                                
                                <td>
                                    <?php if($service->icon): ?>
                                        <i class="fas <?php echo e($service->icon); ?> fa-lg text-primary"></i>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <?php if($service->status): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Inactive</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td class="d-flex gap-2">

                                    <a href="<?php echo e(route('admin.services.edit', $service->id)); ?>"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('admin.services.destroy', $service->id)); ?>" method="POST"
                                        onsubmit="return confirm('Delete this service?')">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No services found
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/services/index.blade.php ENDPATH**/ ?>