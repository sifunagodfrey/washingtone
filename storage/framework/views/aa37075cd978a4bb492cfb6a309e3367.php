

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-primary mb-0"><?php echo e($receipt->receipt_number); ?></h2>
                <small class="text-muted">Receipt Details</small>
            </div>
            <div class="d-flex gap-2">
                <a href="<?php echo e(route('admin.receipts.download', $receipt->id)); ?>" class="btn btn-success">
                    ⬇ Download PDF
                </a>
                <a href="<?php echo e(route('admin.receipts.edit', $receipt->id)); ?>" class="btn btn-primary no-print">Edit</a>
                <a href="<?php echo e(route('admin.receipts.index')); ?>" class="btn btn-outline-secondary no-print">Back to Receipts</a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <h6 class="fw-bold text-primary mb-4">Receipt Details</h6>

                <div class="row g-3">

                    <div class="col-md-6">
                        <p class="text-muted small mb-1">Receipt Number</p>
                        <p class="fw-semibold mb-0"><?php echo e($receipt->receipt_number); ?></p>
                    </div>

                    <div class="col-md-6">
                        <p class="text-muted small mb-1">Client</p>
                        <p class="fw-semibold mb-0">
                            <?php if($receipt->client): ?>
                                <a href="<?php echo e(route('admin.clients.show', $receipt->client->id)); ?>">
                                    <?php echo e($receipt->client->first_name); ?> <?php echo e($receipt->client->last_name); ?>

                                </a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <p class="text-muted small mb-1">Invoice</p>
                        <p class="fw-semibold mb-0">
                            <?php if($receipt->invoice): ?>
                                <a href="<?php echo e(route('admin.invoices.show', $receipt->invoice->id)); ?>">
                                    <?php echo e($receipt->invoice->invoice_number); ?>

                                </a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <p class="text-muted small mb-1">Amount Paid</p>
                        <p class="fw-bold text-primary mb-0">
                            KES <?php echo e(number_format($receipt->amount_paid, 2)); ?>

                        </p>
                    </div>

                    <div class="col-md-6">
                        <p class="text-muted small mb-1">Payment Method</p>
                        <p class="fw-semibold mb-0"><?php echo e(ucfirst($receipt->payment_method ?? '-')); ?></p>
                    </div>

                    <div class="col-md-6">
                        <p class="text-muted small mb-1">Paid At</p>
                        <p class="fw-semibold mb-0">
                            <?php echo e($receipt->paid_at ? \Carbon\Carbon::parse($receipt->paid_at)->format('d M Y, h:i A') : '-'); ?>

                        </p>
                    </div>

                    <div class="col-md-6">
                        <p class="text-muted small mb-1">Created</p>
                        <p class="fw-semibold mb-0">
                            <?php echo e(\Carbon\Carbon::parse($receipt->created_at)->format('d M Y')); ?>

                        </p>
                    </div>

                </div>

            </div>
        </div>

        
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-danger mb-1">Delete Receipt</h6>
                    <small class="text-muted">This action is permanent and cannot be undone.</small>
                </div>
                <form action="<?php echo e(route('admin.receipts.destroy', $receipt->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this receipt?')">
                        Delete Receipt
                    </button>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/documents/receipts/show.blade.php ENDPATH**/ ?>