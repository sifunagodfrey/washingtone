<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        
        <div class="mb-4">
            <h2 class="fw-bold text-primary">Admin Dashboard</h2>
            <p class="text-muted mb-0">Quick access to system modules and overview</p>
        </div>

        
        <div class="row g-3 mb-4">

            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <a href="<?php echo e(route('admin.services.index')); ?>" class="text-decoration-none">
                        <div class="card-body">
                            <h6 class="text-muted">Services</h6>
                            <h3 class="fw-bold text-primary mb-0"><?php echo e($servicesCount ?? 0); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <a href="<?php echo e(route('admin.blogs.index')); ?>" class="text-decoration-none">
                        <div class="card-body">
                            <h6 class="text-muted">Blogs</h6>
                            <h3 class="fw-bold text-primary mb-0"><?php echo e($blogsCount ?? 0); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <a href="<?php echo e(route('admin.bookings.index')); ?>" class="text-decoration-none">
                        <div class="card-body">
                            <h6 class="text-muted">Bookings</h6>
                            <h3 class="fw-bold text-primary mb-0"><?php echo e($bookingsCount ?? 0); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="text-decoration-none">
                        <div class="card-body">
                            <h6 class="text-muted">Users</h6>
                            <h3 class="fw-bold text-primary mb-0"><?php echo e($usersCount ?? 0); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <h5 class="fw-bold mb-3">Quick Shortcuts</h5>

                <div class="row g-3">

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-white h-100 hover-shadow">
                                <h6 class="fw-bold text-primary mb-1">Users</h6>
                                <small class="text-muted">Manage system users</small>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.services.index')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-white h-100">
                                <h6 class="fw-bold text-primary mb-1">Services</h6>
                                <small class="text-muted">Manage service listings</small>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.blogs.index')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-white h-100">
                                <h6 class="fw-bold text-primary mb-1">Blogs</h6>
                                <small class="text-muted">Articles & posts</small>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.blog-categories.index')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-white h-100">
                                <h6 class="fw-bold text-primary mb-1">Blog Categories</h6>
                                <small class="text-muted">Organize blog content</small>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.bookings.index')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-white h-100">
                                <h6 class="fw-bold text-primary mb-1">Bookings</h6>
                                <small class="text-muted">Manage bookings</small>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.quotations.index')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-white h-100">
                                <h6 class="fw-bold text-primary mb-1">Quotations</h6>
                                <small class="text-muted">Price requests</small>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.services.create')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-light h-100">
                                <h6 class="fw-bold text-success mb-1">+ Add Service</h6>
                                <small class="text-muted">Create new service</small>
                            </div>
                        </a>
                    </div>

                    
                    <div class="col-md-3">
                        <a href="<?php echo e(route('admin.blogs.create')); ?>" class="text-decoration-none">
                            <div class="p-3 border rounded bg-light h-100">
                                <h6 class="fw-bold text-success mb-1">+ Add Blog</h6>
                                <small class="text-muted">Write new article</small>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    
    <style>
        .hover-shadow {
            transition: 0.2s ease-in-out;
        }

        .hover-shadow:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>