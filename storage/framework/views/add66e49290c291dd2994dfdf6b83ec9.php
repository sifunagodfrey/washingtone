<?php $__env->startSection('title', 'Settings | Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <h4 class="fw-bold text-primary mb-0">Settings</h4>
    <p class="text-muted small">Manage site-wide configuration for washingtoneoruko.com</p>
</div>

<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show">
    <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<div class="row g-3">

    
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold bg-white py-3"><i class="fas fa-globe text-primary me-2"></i>Site Identity</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Site Name</label>
                        <input type="text" name="site_name" class="form-control" value="<?php echo e(old('site_name', $settings->site_name)); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Site Email</label>
                        <input type="email" name="site_email" class="form-control" value="<?php echo e(old('site_email', $settings->site_email)); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control" value="<?php echo e(old('meta_description', $settings->meta_description)); ?>" placeholder="SEO site description">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Logo <small class="text-muted">(PNG/JPG)</small></label>
                        <?php if($settings->logo): ?><img src="<?php echo e(asset('uploads/settings/' . $settings->logo)); ?>" height="40" class="d-block mb-2"><?php endif; ?>
                        <input type="file" name="logo" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Favicon <small class="text-muted">(ICO/PNG)</small></label>
                        <?php if($settings->favicon): ?><img src="<?php echo e(asset('uploads/settings/' . $settings->favicon)); ?>" height="32" class="d-block mb-2"><?php endif; ?>
                        <input type="file" name="favicon" class="form-control" accept="image/*,.ico">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold bg-white py-3"><i class="fas fa-home text-primary me-2"></i>Home Hero Section</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Hero Title</label>
                        <input type="text" name="hero_title" class="form-control" value="<?php echo e(old('hero_title', $settings->hero_title)); ?>" placeholder="e.g. Washingtone Oruko">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Hero Image</label>
                        <?php if($settings->hero_image): ?><img src="<?php echo e(asset('uploads/settings/' . $settings->hero_image)); ?>" height="50" class="d-block mb-2 rounded"><?php endif; ?>
                        <input type="file" name="hero_image" class="form-control" accept="image/*">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Hero Subtitle</label>
                        <input type="text" name="hero_subtitle" class="form-control" value="<?php echo e(old('hero_subtitle', $settings->hero_subtitle)); ?>" placeholder="e.g. Corporate MC · Life Coach · Author">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">About Short Bio</label>
                        <textarea name="about_short" class="form-control" rows="3" placeholder="Short bio shown on the home page"><?php echo e(old('about_short', $settings->about_short)); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold bg-white py-3"><i class="fas fa-phone text-primary me-2"></i>Contact Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Support Phone</label>
                        <input type="text" name="support_phone" class="form-control" value="<?php echo e(old('support_phone', $settings->support_phone)); ?>" placeholder="+254 7xx xxx xxx">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">WhatsApp Number</label>
                        <input type="text" name="whatsapp_number" class="form-control" value="<?php echo e(old('whatsapp_number', $settings->whatsapp_number)); ?>" placeholder="+254 7xx xxx xxx">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Alternative Phone</label>
                        <input type="text" name="alternative_phone" class="form-control" value="<?php echo e(old('alternative_phone', $settings->alternative_phone)); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Support Email</label>
                        <input type="email" name="support_email" class="form-control" value="<?php echo e(old('support_email', $settings->support_email)); ?>">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Business Location</label>
                        <input type="text" name="business_location" class="form-control" value="<?php echo e(old('business_location', $settings->business_location)); ?>" placeholder="e.g. Nairobi, Kenya">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold bg-white py-3"><i class="fas fa-mobile-alt text-success me-2"></i>M-Pesa & Store Payments</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">M-Pesa Paybill / Till No.</label>
                        <input type="text" name="mpesa_paybill" class="form-control" value="<?php echo e(old('mpesa_paybill', $settings->mpesa_paybill)); ?>" placeholder="e.g. 522533">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">M-Pesa Account Name</label>
                        <input type="text" name="mpesa_account_name" class="form-control" value="<?php echo e(old('mpesa_account_name', $settings->mpesa_account_name)); ?>" placeholder="e.g. Washingtone Oruko">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">WhatsApp for Orders</label>
                        <input type="text" name="whatsapp_order_number" class="form-control" value="<?php echo e(old('whatsapp_order_number', $settings->whatsapp_order_number)); ?>" placeholder="+254 7xx xxx xxx">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold bg-white py-3"><i class="fas fa-share-alt text-primary me-2"></i>Social Media</div>
            <div class="card-body">
                <div class="row g-3">
                    <?php $__currentLoopData = [
                        ['facebook','Facebook URL','fab fa-facebook text-primary'],
                        ['instagram','Instagram URL','fab fa-instagram text-danger'],
                        ['youtube','YouTube Channel URL','fab fa-youtube text-danger'],
                        ['tiktok','TikTok URL','fab fa-tiktok text-dark'],
                        ['twitter','Twitter / X URL','fab fa-x-twitter text-dark'],
                        ['linkedin','LinkedIn URL','fab fa-linkedin text-primary'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$field, $label, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="<?php echo e($icon); ?> me-1"></i><?php echo e($label); ?></label>
                        <input type="url" name="<?php echo e($field); ?>" class="form-control" value="<?php echo e(old($field, $settings->$field)); ?>" placeholder="https://...">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-semibold">
            <i class="fas fa-save me-2"></i>Save Settings
        </button>
    </div>

</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>