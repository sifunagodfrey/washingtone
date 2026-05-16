<?php $__env->startSection('title', 'Gallery | Washingtone Oruko'); ?>
<?php $__env->startSection('meta_description', 'Photo gallery of Washingtone Oruko — Corporate MC, Team Building, Dance and more.'); ?>

<?php $__env->startSection('content'); ?>
    <section class="py-5 bg-primary text-white position-relative overflow-hidden" data-aos="fade-down">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="<?php echo e(asset('images/washingtone-happy-team-building-2.jpg')); ?>"
                class="w-100 h-100 object-fit-cover opacity-20" alt="">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-80"></div>
        <div class="container position-relative text-center py-4">
            <h1 class="fw-bold display-5 mb-2">Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-warning">Home</a></li>
                    <li class="breadcrumb-item active text-white">Gallery</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">

            
            <?php if($categories->count()): ?>
                <div class="d-flex flex-wrap gap-2 justify-content-center mb-4" data-aos="fade-up">
                    <button class="btn btn-primary rounded-pill px-4 filter-btn active" data-filter="all">All</button>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="btn btn-outline-primary rounded-pill px-4 filter-btn"
                            data-filter="<?php echo e(Str::slug($cat)); ?>"><?php echo e($cat); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            
            <div class="row g-3" id="galleryGrid">
                <?php $__empty_1 = true; $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-6 col-md-4 col-lg-3 gallery-item" data-category="<?php echo e(Str::slug($img->category)); ?>"
                        data-aos="zoom-in" data-aos-delay="<?php echo e(($loop->index % 8) * 50); ?>">

                        <a href="#" data-bs-toggle="modal" data-bs-target="#imgModal<?php echo e($img->id); ?>">
                            <div class="position-relative overflow-hidden rounded shadow-sm gallery-thumb">
                                <img src="<?php echo e(asset('uploads/gallery/' . $img->image)); ?>" class="img-fluid w-100"
                                    style="height:200px; object-fit:cover;" alt="<?php echo e($img->title); ?>">
                                <div
                                    class="position-absolute top-0 start-0 w-100 h-100 bg-dark gallery-overlay
                                    d-flex align-items-center justify-content-center">
                                    <i class="fas fa-expand-alt text-white fa-2x"></i>
                                </div>
                            </div>
                        </a>

                        <?php if($img->title): ?>
                            <p class="small text-muted mt-1 mb-0 text-center"><?php echo e($img->title); ?></p>
                        <?php endif; ?>

                        
                        <div class="modal fade" id="imgModal<?php echo e($img->id); ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0" style="background:rgba(0,0,0,.85);">
                                    <div class="modal-header border-0 pb-0">
                                        <button type="button" class="btn-close btn-close-white ms-auto"
                                            data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center px-3 pb-3">
                                        <img src="<?php echo e(asset('uploads/gallery/' . $img->image)); ?>" class="img-fluid rounded"
                                            style="max-height:75vh; object-fit:contain;" alt="<?php echo e($img->title); ?>">
                                        <?php if($img->title): ?>
                                            <p class="text-white mt-3 mb-0 fw-semibold"><?php echo e($img->title); ?></p>
                                        <?php endif; ?>
                                        <?php if($img->category): ?>
                                            <span class="badge bg-primary mt-1"><?php echo e($img->category); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fas fa-images fa-3x mb-3 d-block"></i>
                        <h5>Gallery images coming soon.</h5>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="mt-5">
                <?php echo e($images->links('frontend.partials.pagination')); ?>

            </div>

        </div>
    </section>

    <?php echo $__env->make('frontend.partials.cta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .gallery-thumb {
            cursor: pointer;
        }

        .gallery-thumb .gallery-overlay {
            opacity: 0;
            transition: opacity .25s ease;
        }

        .gallery-thumb:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-thumb img {
            transition: transform .3s ease;
        }

        .gallery-thumb:hover img {
            transform: scale(1.05);
        }

        .filter-btn.active {
            background-color: var(--bs-primary) !important;
            color: #fff !important;
            border-color: var(--bs-primary) !important;
        }

        .filter-btn:not(.active):hover {
            background-color: var(--bs-primary);
            color: #fff;
        }

        /* Clean pagination — kill any stray large icon sizing */
        .pagination .page-link {
            font-size: .875rem;
            padding: .4rem .75rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active', 'btn-primary');
                    b.classList.add('btn-outline-primary');
                });
                this.classList.add('active', 'btn-primary');
                this.classList.remove('btn-outline-primary');

                const filter = this.dataset.filter;
                document.querySelectorAll('.gallery-item').forEach(item => {
                    item.style.display =
                        (filter === 'all' || item.dataset.category === filter) ? '' : 'none';
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/frontend/pages/gallery.blade.php ENDPATH**/ ?>