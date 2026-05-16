<?php $__env->startSection('title', 'Dashboard | Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <h4 class="fw-bold text-primary mb-0">Dashboard</h4>
    <small class="text-muted">Washingtone Oruko Portfolio — Admin Overview</small>
</div>


<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="<?php echo e(route('admin.services.index')); ?>" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-primary rounded p-3"><i class="fas fa-briefcase text-white fa-lg"></i></div>
                    <div><p class="text-muted small mb-0">Services</p><h4 class="fw-bold mb-0 text-primary"><?php echo e($servicesCount); ?></h4></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning rounded p-3"><i class="fas fa-shopping-bag text-dark fa-lg"></i></div>
                    <div>
                        <p class="text-muted small mb-0">Orders</p>
                        <h4 class="fw-bold mb-0 text-primary"><?php echo e($ordersCount); ?>

                        <?php if($pendingOrders > 0): ?><span class="badge bg-warning text-dark ms-1" style="font-size:.7rem;"><?php echo e($pendingOrders); ?> new</span><?php endif; ?>
                        </h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="<?php echo e(route('admin.contact-messages.index')); ?>" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-danger rounded p-3"><i class="fas fa-envelope text-white fa-lg"></i></div>
                    <div>
                        <p class="text-muted small mb-0">Messages</p>
                        <h4 class="fw-bold mb-0 text-primary"><?php echo e($unreadMessages); ?>

                        <?php if($unreadMessages > 0): ?><span class="badge bg-danger ms-1" style="font-size:.7rem;">unread</span><?php endif; ?>
                        </h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="<?php echo e(route('admin.blogs.index')); ?>" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success rounded p-3"><i class="fas fa-pen-nib text-white fa-lg"></i></div>
                    <div><p class="text-muted small mb-0">Blogs</p><h4 class="fw-bold mb-0 text-primary"><?php echo e($blogsCount); ?></h4></div>
                </div>
            </a>
        </div>
    </div>
</div>


<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="<?php echo e(route('admin.gallery.index')); ?>" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-info rounded p-3"><i class="fas fa-images text-white fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Gallery</p><h4 class="fw-bold mb-0 text-primary"><?php echo e($galleryCount); ?></h4></div>
            </div></a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="<?php echo e(route('admin.videos.index')); ?>" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger rounded p-3"><i class="fab fa-youtube text-white fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Videos</p><h4 class="fw-bold mb-0 text-primary"><?php echo e($videosCount); ?></h4></div>
            </div></a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="<?php echo e(route('admin.store.index')); ?>" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-primary rounded p-3"><i class="fas fa-book text-white fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Products</p><h4 class="fw-bold mb-0 text-primary">Store</h4></div>
            </div></a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="<?php echo e(route('admin.rate-card.index')); ?>" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-warning rounded p-3"><i class="fas fa-tags text-dark fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Rate Card</p><h4 class="fw-bold mb-0 text-primary">Packages</h4></div>
            </div></a>
        </div>
    </div>
</div>


<div class="row g-3">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3 d-flex justify-content-between align-items-center">
                <span><i class="fas fa-shopping-bag text-primary me-2"></i>Recent Orders</span>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle small">
                    <thead class="table-light"><tr><th>Order #</th><th>Customer</th><th>Amount</th><th>Status</th></tr></thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="text-primary fw-semibold"><?php echo e($order->order_number); ?></a></td>
                            <td><?php echo e($order->customer_name); ?><br><small class="text-muted"><?php echo e($order->payment_method); ?></small></td>
                            <td>KES <?php echo e(number_format($order->total_amount)); ?></td>
                            <td><span class="badge bg-<?php echo e($order->status_badge); ?>"><?php echo e(ucfirst($order->status)); ?></span></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="4" class="text-center py-3 text-muted">No orders yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3 d-flex justify-content-between align-items-center">
                <span><i class="fas fa-envelope text-danger me-2"></i>Unread Messages</span>
                <a href="<?php echo e(route('admin.contact-messages.index')); ?>" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
            </div>
            <div class="list-group list-group-flush">
                <?php $__empty_1 = true; $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('admin.contact-messages.show', $msg->id)); ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <strong class="small"><?php echo e($msg->name); ?></strong>
                        <small class="text-muted"><?php echo e($msg->created_at->diffForHumans()); ?></small>
                    </div>
                    <p class="small text-muted mb-0"><?php echo e(Str::limit($msg->message, 60)); ?></p>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="list-group-item text-center text-muted py-3">No unread messages.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white fw-bold py-3"><i class="fas fa-bolt text-warning me-2"></i>Quick Actions</div>
    <div class="card-body">
        <div class="row g-2">
            <?php $__currentLoopData = [
                ['route' => 'admin.services.create',      'label' => '+ Add Service',    'color' => 'primary'],
                ['route' => 'admin.gallery.create',       'label' => '+ Upload Photo',   'color' => 'info'],
                ['route' => 'admin.videos.create',        'label' => '+ Add Video',      'color' => 'danger'],
                ['route' => 'admin.blogs.create',         'label' => '+ Write Blog',     'color' => 'success'],
                ['route' => 'admin.rate-card.create',     'label' => '+ Add Package',    'color' => 'warning'],
                ['route' => 'admin.store.create',         'label' => '+ Add Product',    'color' => 'primary'],
                ['route' => 'admin.page-content.index',   'label' => 'Edit Pages',       'color' => 'secondary'],
                ['route' => 'admin.settings.index',       'label' => 'Settings',         'color' => 'secondary'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-md-3">
                <a href="<?php echo e(route($action['route'])); ?>" class="btn btn-outline-<?php echo e($action['color']); ?> w-100 btn-sm rounded-pill">
                    <?php echo e($action['label']); ?>

                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>