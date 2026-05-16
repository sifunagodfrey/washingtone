<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4" style="background-color:#f8f9fa; min-height:100vh;">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0">Edit Blog</h2>
                <small class="text-muted">Update blog details</small>
            </div>

            <a href="<?php echo e(route('admin.blogs.index')); ?>" class="btn btn-light border">
                Back
            </a>
        </div>

        <form method="POST" action="<?php echo e(route('admin.blogs.update', $blog->id)); ?>" enctype="multipart/form-data"
            id="blogForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="row g-4">

                
                <div class="col-lg-8">

                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" value="<?php echo e($blog->title); ?>"
                                class="form-control form-control-lg" required>
                        </div>
                    </div>

                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Category</label>

                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>"
                                        <?php echo e($blog->category_id == $cat->id ? 'selected' : ''); ?>>
                                        <?php echo e($cat->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">

                            <label class="form-label fw-semibold">Content</label>

                            
                            <div id="editor" style="height: 350px; background:#fff;"></div>

                            
                            <input type="hidden" name="content" id="content">

                        </div>
                    </div>

                </div>

                
                <div class="col-lg-4">

                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                            <label class="form-label fw-semibold">Featured Image</label>

                            <input type="file" name="featured_image" class="form-control mb-3">

                            <?php if($blog->featured_image): ?>
                                <img src="<?php echo e(url('public/uploads/blogs/' . $blog->featured_image)); ?>"
                                    class="img-fluid rounded" style="max-height:200px; object-fit:cover;">
                            <?php else: ?>
                                <div class="border rounded bg-light text-center p-4">
                                    <small class="text-muted">No image uploaded</small>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    
                    <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-body">

                            <h6 class="fw-bold mb-3">Publish</h6>

                            <div class="mb-3">
                                <label class="form-label">Status</label>

                                <select name="status" class="form-select">
                                    <option value="draft" <?php echo e($blog->status == 'draft' ? 'selected' : ''); ?>>
                                        Draft
                                    </option>
                                    <option value="published" <?php echo e($blog->status == 'published' ? 'selected' : ''); ?>>
                                        Published
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Update Blog
                            </button>

                            <div class="text-muted small mt-3">
                                Changes will update existing blog content immediately.
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>

    
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        // -------------------
        // Initialize editor
        // -------------------
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        // -------------------
        // Load existing content
        // -------------------
        quill.root.innerHTML = `<?php echo $blog->content; ?>`;

        // -------------------
        // Submit content
        // -------------------
        document.getElementById('blogForm').addEventListener('submit', function() {
            document.getElementById('content').value = quill.root.innerHTML;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\washingtone\resources\views/admin/blogs/edit.blade.php ENDPATH**/ ?>