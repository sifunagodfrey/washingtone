<nav class="admin-top-nav px-4 py-2 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-outline-secondary d-md-none" onclick="document.querySelector('.admin-sidebar').classList.toggle('d-block')">
            <i class="fas fa-bars"></i>
        </button>
        <span class="text-muted small">Welcome back, <strong><?php echo e(auth()->user()->first_name ?? 'Admin'); ?></strong></span>
    </div>
    <div class="dropdown">
        <a class="d-flex align-items-center gap-2 text-decoration-none text-dark" href="#" data-bs-toggle="dropdown">
            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px;height:36px;font-size:.85rem;">
                <?php echo e(strtoupper(substr(auth()->user()->first_name ?? 'A', 0, 1))); ?>

            </div>
            <span class="d-none d-md-inline small fw-semibold"><?php echo e(auth()->user()->name ?? 'Admin'); ?></span>
            <i class="fas fa-chevron-down small text-muted"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
            <li><a class="dropdown-item" href="<?php echo e(route('admin.settings.index')); ?>"><i class="fas fa-cog me-2 text-primary"></i>Settings</a></li>
            <li><a class="dropdown-item" href="<?php echo e(route('home')); ?>" target="_blank"><i class="fas fa-external-link-alt me-2 text-primary"></i>View Website</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?>
                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/partials/navbar.blade.php ENDPATH**/ ?>