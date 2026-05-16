
<?php $settings = \App\Models\Setting::first(); ?>
<div class="bg-gradient-primary text-white py-2 border-bottom" data-aos="fade-down" data-aos-duration="800">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center small gap-3">

            
            <div class="d-flex align-items-center gap-3">
                <span class="d-none d-md-inline">
                    <i class="fas fa-envelope me-1"></i>
                    <?php echo e($settings->site_email ?? 'info@washingtoneoruko.com'); ?>

                </span>
                <span>
                    <i class="fas fa-phone me-1"></i>
                    <?php echo e($settings->support_phone ?? '+254 700 000 000'); ?>

                </span>
            </div>

            
            <div class="d-flex align-items-center gap-3">
                <?php if($settings->facebook ?? null): ?>
                    <a href="<?php echo e($settings->facebook); ?>" class="text-white" target="_blank" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                <?php endif; ?>
                <?php if($settings->instagram ?? null): ?>
                    <a href="<?php echo e($settings->instagram); ?>" class="text-white" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                <?php endif; ?>
                <?php if($settings->youtube ?? null): ?>
                    <a href="<?php echo e($settings->youtube); ?>" class="text-white" target="_blank" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                <?php endif; ?>
                <?php if($settings->tiktok ?? null): ?>
                    <a href="<?php echo e($settings->tiktok); ?>" class="text-white" target="_blank" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                <?php endif; ?>
                <?php if($settings->twitter ?? null): ?>
                    <a href="<?php echo e($settings->twitter); ?>" class="text-white" target="_blank" title="X / Twitter">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>