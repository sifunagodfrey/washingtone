<?php $__env->startSection('title', 'Login | Neptunes Movers'); ?>

<?php $__env->startSection('content'); ?>

    <section class="py-5 bg-dark">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-5">

                    <div class="card bg-black text-white shadow-sm">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="fw-bold text-white">Welcome Back</h4>

                                <p class="text-light small">
                                    Login to access your dashboard and live bootcamps.
                                </p>
                            </div>

                            <?php if(session('status')): ?>

                                <div class="alert alert-success">
                                    <?php echo e(session('status')); ?>

                                </div>

                            <?php endif; ?>

                            <form method="POST" action="<?php echo e(route('login.attempt')); ?>">

                                <?php echo csrf_field(); ?>

                                <div class="mb-3">

                                    <label class="form-label text-light">Email</label>

                                    <input type="email" name="email"
                                        class="form-control bg-dark text-white border-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        required>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label text-light">Password</label>

                                    <input type="password" name="password"
                                        class="form-control bg-dark text-white border-0 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        required>

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>

                                <button class="btn btn-primary w-100">
                                    Login
                                </button>

                            </form>

                            <div class="text-center mt-3">

                                <a href="<?php echo e(route('password.request')); ?>" class="small text-light text-decoration-none">
                                    Forgot Password?
                                </a>

                            </div>

                            <div class="text-center mt-2">

                                <a href="<?php echo e(route('register')); ?>" class="small text-light text-decoration-none">
                                    Register
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/auth/login.blade.php ENDPATH**/ ?>