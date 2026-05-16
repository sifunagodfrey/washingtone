<div class="p-3 d-flex flex-column" style="min-height:100vh; background:#1a1a2e;">

    
    <div class="text-center py-3 mb-2 border-bottom border-secondary">
        <img src="<?php echo e(asset('images/washingtone-oruko-logo.png')); ?>" height="30" class="bg-white p-1 rounded"
            alt="Logo">
        <p class="text-white-50 small mt-2 mb-0">Admin Panel</p>
    </div>

    <ul class="nav flex-column gap-1 mt-3 flex-grow-1">

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="fas fa-chart-pie fa-fw"></i> Dashboard
            </a>
        </li>

        <div class="sidebar-section">Content</div>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.services.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.services.index')); ?>">
                <i class="fas fa-briefcase fa-fw"></i> Services
            </a>
        </li>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.rate-card.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.rate-card.index')); ?>">
                <i class="fas fa-tags fa-fw"></i> Rate Card
            </a>
        </li>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.gallery.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.gallery.index')); ?>">
                <i class="fas fa-images fa-fw"></i> Gallery
            </a>
        </li>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.videos.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.videos.index')); ?>">
                <i class="fab fa-youtube fa-fw"></i> Videos
            </a>
        </li>

        <div class="sidebar-section">Store & Orders</div>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.store.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.store.index')); ?>">
                <i class="fas fa-book fa-fw"></i> My Book / Store
            </a>
        </li>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.orders.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.orders.index')); ?>">
                <i class="fas fa-shopping-bag fa-fw"></i> Orders
                <?php $pending = \App\Models\Order::where('status','pending')->count(); ?>
                <?php if($pending > 0): ?>
                    <span class="badge bg-warning text-dark ms-auto"><?php echo e($pending); ?></span>
                <?php endif; ?>
            </a>
        </li>

        <div class="sidebar-section">Blog</div>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.blogs.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.blogs.index')); ?>">
                <i class="fas fa-pen-nib fa-fw"></i> Blog Posts
            </a>
        </li>

        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.blog-categories.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.blog-categories.index')); ?>">
                <i class="fas fa-folder fa-fw"></i> Blog Categories
            </a>
        </li>

        <div class="sidebar-section">Pages & Settings</div>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.page-content.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.page-content.index')); ?>">
                <i class="fas fa-file-alt fa-fw"></i> Page Content
            </a>
        </li>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.contact-messages.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.contact-messages.index')); ?>">
                <i class="fas fa-envelope fa-fw"></i> Messages
                <?php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); ?>
                <?php if($unread > 0): ?>
                    <span class="badge bg-danger ms-auto"><?php echo e($unread); ?></span>
                <?php endif; ?>
            </a>
        </li>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.users.index')); ?>">
                <i class="fas fa-users fa-fw"></i> Users
            </a>
        </li>

        
        <li>
            <a class="sidebar-link <?php echo e(request()->routeIs('admin.settings.*') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin.settings.index')); ?>">
                <i class="fas fa-cog fa-fw"></i> Settings
            </a>
        </li>

    </ul>

    
    <div class="pt-3 border-top border-secondary mt-3">
        <a href="<?php echo e(route('home')); ?>" target="_blank" class="sidebar-link mb-2">
            <i class="fas fa-external-link-alt fa-fw"></i> View Website
        </a>
        <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-outline-danger w-100 btn-sm rounded-pill">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </button>
        </form>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>