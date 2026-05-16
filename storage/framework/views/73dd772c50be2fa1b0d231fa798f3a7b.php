<?php $__env->startSection('title', 'Get In Touch | Washingtone Oruko'); ?>
<?php $__env->startSection('meta_description', 'Contact Washingtone Oruko to book MC services, team building, life coaching or to enquire about his book.'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <img src="<?php echo e(asset('images/oruko-consultation-with-foreigner-image.jpg')); ?>" class="w-100 h-100 object-fit-cover opacity-20" alt="">
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
    <div class="container position-relative text-center py-4">
        <h1 class="fw-bold display-5 mb-2">Get In Touch</h1>
        <p class="text-white-75 mb-0">Book Washingtone or send an enquiry</p>
        <nav aria-label="breadcrumb" class="mt-2"><ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">Get In Touch</li>
        </ol></nav>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-start">
            
            <div class="col-lg-7" data-aos="fade-right">
                <div class="card border-0 shadow p-4">
                    <h4 class="fw-bold text-primary mb-4">Send a Message</h4>
                    <?php if(session('success')): ?>
                    <div class="alert alert-success"><i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name *</label>
                                <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>" placeholder="Your full name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email Address *</label>
                                <input type="email" name="email" class="form-control" required value="<?php echo e(old('email')); ?>" placeholder="your@email.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>" placeholder="07xx xxx xxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Subject</label>
                                <select name="subject" class="form-select">
                                    <option value="">Select a subject</option>
                                    <option value="Corporate MC Booking">Corporate MC Booking</option>
                                    <option value="Wedding MC Booking">Wedding MC Booking</option>
                                    <option value="Team Building">Team Building</option>
                                    <option value="Life Coaching">Life Coaching</option>
                                    <option value="Book Order">Book Order — Realign Your Compass</option>
                                    <option value="Dance Classes">Dance Classes</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Message *</label>
                                <textarea name="message" class="form-control" rows="5" required placeholder="Tell Washingtone about your event or enquiry..."><?php echo e(old('message')); ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-semibold">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="col-lg-5" data-aos="fade-left">
                <h4 class="fw-bold text-primary mb-4">Contact Information</h4>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-primary rounded p-3"><i class="fas fa-phone text-white fa-lg"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Phone</h6>
                        <p class="text-muted mb-0"><?php echo e($settings->support_phone ?? '+254 700 000 000'); ?></p>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-success rounded p-3"><i class="fab fa-whatsapp text-white fa-lg"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">WhatsApp</h6>
                        <?php $wa = preg_replace('/[^0-9]/', '', $settings->whatsapp_number ?? '254700000000'); ?>
                        <a href="https://wa.me/<?php echo e($wa); ?>" target="_blank" class="text-success fw-semibold">Chat on WhatsApp</a>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-primary rounded p-3"><i class="fas fa-envelope text-white fa-lg"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Email</h6>
                        <p class="text-muted mb-0"><?php echo e($settings->site_email ?? 'info@washingtoneoruko.com'); ?></p>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-warning rounded p-3"><i class="fas fa-map-marker-alt text-dark fa-lg"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Location</h6>
                        <p class="text-muted mb-0"><?php echo e($settings->business_location ?? 'Nairobi, Kenya'); ?></p>
                    </div>
                </div>

                
                <h6 class="fw-bold text-primary mt-4 mb-3">Follow Washingtone</h6>
                <div class="d-flex flex-wrap gap-3">
                    <?php if($settings->facebook ?? null): ?>
                    <a href="<?php echo e($settings->facebook); ?>" target="_blank" class="btn btn-outline-primary rounded-pill btn-sm"><i class="fab fa-facebook me-1"></i>Facebook</a>
                    <?php endif; ?>
                    <?php if($settings->youtube ?? null): ?>
                    <a href="<?php echo e($settings->youtube); ?>" target="_blank" class="btn btn-outline-danger rounded-pill btn-sm"><i class="fab fa-youtube me-1"></i>YouTube</a>
                    <?php endif; ?>
                    <?php if($settings->tiktok ?? null): ?>
                    <a href="<?php echo e($settings->tiktok); ?>" target="_blank" class="btn btn-outline-dark rounded-pill btn-sm"><i class="fab fa-tiktok me-1"></i>TikTok</a>
                    <?php endif; ?>
                    <?php if($settings->twitter ?? null): ?>
                    <a href="<?php echo e($settings->twitter); ?>" target="_blank" class="btn btn-outline-dark rounded-pill btn-sm"><i class="fab fa-x-twitter me-1"></i>Twitter/X</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/pages/contact.blade.php ENDPATH**/ ?>