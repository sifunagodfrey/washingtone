<?php $__env->startSection("title", $product->title . " | Washingtone Oruko"); ?>
<?php $__env->startSection("meta_description", $product->short_description); ?>
<?php $__env->startSection("content"); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-90"></div>
    <div class="container position-relative text-center py-3">
        <h1 class="fw-bold mb-1"><?php echo e($product->title); ?></h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route("home")); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route("store.index")); ?>" class="text-warning">My Book</a></li>
            <li class="breadcrumb-item active text-white"><?php echo e($product->title); ?></li>
        </ol></nav>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-4 text-center" data-aos="fade-right">
                <?php if($product->image): ?>
                <img src="<?php echo e(asset("uploads/store/" . $product->image)); ?>" class="img-fluid rounded shadow" style="max-height:400px;object-fit:cover;" alt="<?php echo e($product->title); ?>">
                <?php else: ?>
                <div class="bg-primary rounded d-flex align-items-center justify-content-center shadow" style="height:350px;">
                    <i class="fas fa-book fa-7x text-warning"></i>
                </div>
                <?php endif; ?>
                <div class="mt-3 fw-bold text-primary fs-3"><?php echo e($product->formatted_price); ?></div>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <h2 class="fw-bold text-primary mb-3"><?php echo e($product->title); ?></h2>
                <div class="text-muted mb-4"><?php echo $product->description ?? $product->short_description; ?></div>
                <?php $settings = \App\Models\Setting::first(); $wa = preg_replace("/[^0-9]/", "", $settings->whatsapp_order_number ?? $settings->whatsapp_number ?? "254700000000"); ?>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="card border-success border-2 h-100">
                            <div class="card-body text-center p-4">
                                <i class="fab fa-whatsapp fa-3x text-success mb-2 d-block"></i>
                                <h6 class="fw-bold">Order via WhatsApp</h6>
                                <p class="small text-muted mb-3">Message us and we confirm instantly.</p>
                                <a href="https://wa.me/<?php echo e($wa); ?>?text=Hi%20Washingtone%2C%20I%20want%20to%20order%20<?php echo e(urlencode($product->title)); ?>" target="_blank" class="btn btn-success rounded-pill px-4"><i class="fab fa-whatsapp me-2"></i>Order on WhatsApp</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-primary border-2 h-100">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-mobile-alt fa-3x text-primary mb-2 d-block"></i>
                                <h6 class="fw-bold">Pay via M-Pesa</h6>
                                <?php if($settings->mpesa_paybill): ?>
                                <p class="small text-muted mb-1">Paybill: <strong><?php echo e($settings->mpesa_paybill); ?></strong></p>
                                <?php endif; ?>
                                <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#mpesaModal"><i class="fas fa-mobile-alt me-2"></i>M-Pesa Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="mpesaModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
        <div class="modal-header bg-primary text-white"><h5 class="modal-title fw-bold">M-Pesa Order</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <?php if(session("success")): ?><div class="alert alert-success"><?php echo e(session("success")); ?></div><?php endif; ?>
            <?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
            <form action="<?php echo e(route("store.order", $product->slug)); ?>" method="POST"><?php echo csrf_field(); ?>
                <input type="hidden" name="payment_method" value="mpesa"><input type="hidden" name="quantity" value="1">
                <div class="mb-3"><label class="form-label fw-semibold">Full Name *</label><input type="text" name="customer_name" class="form-control" required placeholder="Full name"></div>
                <div class="mb-3"><label class="form-label fw-semibold">Phone *</label><input type="text" name="customer_phone" class="form-control" required placeholder="07xx xxx xxx"></div>
                <div class="mb-3"><label class="form-label fw-semibold">Email</label><input type="email" name="customer_email" class="form-control" placeholder="Optional"></div>
                <div class="mb-3"><label class="form-label fw-semibold">M-Pesa Code *</label><input type="text" name="mpesa_transaction_code" class="form-control" required placeholder="e.g. QH7XK3R9T1">
                <?php if($settings->mpesa_paybill): ?><small class="text-muted">Pay to Paybill <strong><?php echo e($settings->mpesa_paybill); ?></strong></small><?php endif; ?></div>
                <div class="mb-3"><label class="form-label fw-semibold">Notes</label><textarea name="customer_notes" class="form-control" rows="2" placeholder="Delivery address etc"></textarea></div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold"><i class="fas fa-check-circle me-2"></i>Submit Order</button>
            </form>
        </div>
    </div></div>
</div>
<?php echo $__env->make("frontend.partials.cta", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/store/show.blade.php ENDPATH**/ ?>