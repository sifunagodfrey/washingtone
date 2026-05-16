<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-primary mb-0">Receipts</h2>
                <small class="text-muted">Manage payment receipts</small>
            </div>
            <a href="<?php echo e(route('admin.receipts.create')); ?>" class="btn btn-primary">
                + Create Receipt
            </a>
        </div>

        
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Receipt No.</th>
                                <th>Client</th>
                                <th>Invoice</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Paid At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($receipt->id); ?></td>
                                    <td><?php echo e($receipt->receipt_number); ?></td>
                                    <td>
                                        <?php echo e($receipt->client->first_name ?? '-'); ?>

                                        <?php echo e($receipt->client->last_name ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php if($receipt->invoice): ?>
                                            <a href="<?php echo e(route('admin.invoices.show', $receipt->invoice->id)); ?>">
                                                <?php echo e($receipt->invoice->invoice_number); ?>

                                            </a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>KES <?php echo e(number_format($receipt->amount_paid, 2)); ?></td>
                                    <td><?php echo e(ucfirst($receipt->payment_method ?? '-')); ?></td>
                                    <td>
                                        <?php echo e($receipt->paid_at ? \Carbon\Carbon::parse($receipt->paid_at)->format('d M Y, h:i A') : '-'); ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.receipts.show', $receipt->id)); ?>"
                                            class="btn btn-sm btn-outline-secondary">View</a>

                                        <a href="<?php echo e(route('admin.receipts.edit', $receipt->id)); ?>"
                                            class="btn btn-sm btn-outline-primary">Edit</a>

                                        <form action="<?php echo e(route('admin.receipts.destroy', $receipt->id)); ?>"
                                            method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Delete this receipt?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        No receipts found
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Showing <?php echo e($receipts->firstItem() ?? 0); ?> to <?php echo e($receipts->lastItem() ?? 0); ?>

                        of <?php echo e($receipts->total()); ?> results
                    </small>
                    <div class="d-flex gap-2">
                        <?php if($receipts->onFirstPage()): ?>
                            <button class="btn btn-sm btn-outline-secondary" disabled>← Prev</button>
                        <?php else: ?>
                            <a href="<?php echo e($receipts->previousPageUrl()); ?>" class="btn btn-sm btn-outline-primary">← Prev</a>
                        <?php endif; ?>

                        <?php if($receipts->hasMorePages()): ?>
                            <a href="<?php echo e($receipts->nextPageUrl()); ?>" class="btn btn-sm btn-outline-primary">Next →</a>
                        <?php else: ?>
                            <button class="btn btn-sm btn-outline-secondary" disabled>Next →</button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/documents/receipts/index.blade.php ENDPATH**/ ?>