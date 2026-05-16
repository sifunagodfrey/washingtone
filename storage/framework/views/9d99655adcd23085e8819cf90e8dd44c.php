<nav class="navbar navbar-light position-sticky top-0" style="background-color: #f2f2f2; z-index: 1030;">

    <div class="container-fluid position-relative overflow-visible">

        
        <a href="<?php echo e(route('home')); ?>" target="_blank" class="navbar-brand d-flex align-items-center">

            <img src="<?php echo e(asset('images/neptunes-movers-and-relocators-logo.png')); ?>" height="35" alt="Elite Hub">

        </a>


        
        <div class="dropdown">

            <a class="text-dark dropdown-toggle text-decoration-none" href="#" role="button"
                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">

                <?php echo e(auth()->user()->name ?? 'Admin'); ?>


            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="max-width: 200px; overflow-wrap: break-word;">

                
                <li>
                    <a class="dropdown-item text-wrap" href="#">
                        My Account
                    </a>
                </li>

                
                <li>
                    <a class="dropdown-item text-wrap" href="<?php echo e(route('admin.settings.index')); ?>">
                        Settings
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                
                <li>
                    <a class="dropdown-item text-wrap" href="<?php echo e(route('home')); ?>" target="_blank">
                        View Website
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                
                <li>

                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>

                        <button type="submit" class="dropdown-item text-wrap">
                            Logout
                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>
<?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/partials/navbar.blade.php ENDPATH**/ ?>