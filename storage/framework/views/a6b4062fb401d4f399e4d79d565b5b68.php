<div class="p-3 d-flex flex-column" style="background-color: #f2f2f2; min-height: 100vh;">

    
    <ul class="nav flex-column gap-1 grow">

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="fas fa-chart-line"></i>
                Dashboard
            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.moves.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.moves.index')); ?>">
                <i class="fas fa-truck"></i>
                Moves
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.routes.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.routes.index')); ?>">
                <i class="fas fa-route"></i>
                Routes
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.vehicles.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.vehicles.index')); ?>">
                <i class="fas fa-truck-moving"></i>
                Vehicles
            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.bookings.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.bookings.index')); ?>">
                <i class="fas fa-clipboard-list"></i>
                Bookings
            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex justify-content-between align-items-center text-dark hover-bg-light"
                data-bs-toggle="collapse" href="#documentsMenu">

                <span class="d-flex align-items-center gap-2">
                    <i class="fas fa-folder-open"></i>
                    Documents
                </span>

                <i class="fas fa-chevron-down small"></i>
            </a>

            <div class="collapse ps-3 mt-1" id="documentsMenu">
                <a class="nav-link text-secondary small py-1 hover-text-dark" href="<?php echo e(route('admin.invoices.index')); ?>">Invoices</a>
                <a class="nav-link text-secondary small py-1 hover-text-dark" href="<?php echo e(route('admin.quotations.index')); ?>">Quotations</a>                
                <a class="nav-link text-secondary small py-1 hover-text-dark" href="<?php echo e(route('admin.receipts.index')); ?>">Receipts</a>
            </div>
        </li>

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex justify-content-between align-items-center text-dark hover-bg-light"
                data-bs-toggle="collapse" href="#blogMenu">

                <span class="d-flex align-items-center gap-2">
                    <i class="fas fa-blog"></i>
                    Blog
                </span>

                <i class="fas fa-chevron-down small"></i>
            </a>

            <div class="collapse ps-3 mt-1" id="blogMenu">
                <a class="nav-link text-secondary small py-1 hover-text-dark" href="<?php echo e(route('admin.blogs.index')); ?>">
                    All Blogs
                </a>
                <a class="nav-link text-secondary small py-1 hover-text-dark" href="<?php echo e(route('admin.blogs.create')); ?>">
                    Add Blog
                </a>
                <a class="nav-link text-secondary small py-1 hover-text-dark"
                    href="<?php echo e(route('admin.blog-categories.index')); ?>">
                    Categories
                </a>
            </div>
        </li>

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.services.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.services.index')); ?>">
                <i class="fas fa-briefcase"></i>
                Services
            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.reports.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.reports.index')); ?>">
                <i class="fas fa-chart-bar"></i>
                Reports
            </a>
        </li>

        
        

        
        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.users.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.users.index')); ?>">
                <i class="fas fa-users"></i>
                Users
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.clients.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.clients.index')); ?>">
                <i class="fas fa-user-friends"></i>
                Clients
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.staff.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.staff.index')); ?>">
                <i class="fas fa-user-tie"></i>
                Staff
            </a>
        </li>

        
        <li class="nav-item mt-3">
            <a class="nav-link rounded px-2 py-2 d-flex align-items-center gap-2
                <?php echo e(request()->routeIs('admin.settings.*') ? 'bg-primary text-white fw-semibold' : 'text-dark hover-bg-light'); ?>"
                href="<?php echo e(route('admin.settings.index')); ?>">
                <i class="fas fa-cog"></i>
                Settings
            </a>
        </li>

    </ul>

    
    <div class="mt-auto pt-3 border-top">

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>

            <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-center gap-2">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>

        </form>

    </div>

</div>
<?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>