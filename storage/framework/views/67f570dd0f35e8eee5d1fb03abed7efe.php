<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-primary mb-0">Invoices</h2>
                <small class="text-muted">Manage invoices</small>
            </div>

            <a href="<?php echo e(route('admin.invoices.create')); ?>" class="btn btn-primary">
                + Create Invoice
            </a>
        </div>

        
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice No.</th>
                                <th>Client</th>
                                <th>Subtotal</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($invoice->id); ?></td>
                                    <td><?php echo e($invoice->invoice_number); ?></td>
                                    <td><?php echo e($invoice->client->first_name ?? '-'); ?> <?php echo e($invoice->client->last_name ?? ''); ?></td>
                                    <td>KES <?php echo e(number_format($invoice->subtotal, 2)); ?></td>
                                    <td>KES <?php echo e(number_format($invoice->tax, 2)); ?></td>
                                    <td>KES <?php echo e(number_format($invoice->total, 2)); ?></td>
                                    <td>
                                        <?php
                                            $statusColors = [
                                                'pending'   => 'warning',
                                                'paid'      => 'success',
                                                'cancelled' => 'danger',
                                            ];
                                            $color = $statusColors[$invoice->status] ?? 'secondary';
                                        ?>
                                        <span class="badge bg-<?php echo e($color); ?>">
                                            <?php echo e(ucfirst($invoice->status)); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($invoice->due_date ? \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') : '-'); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.invoices.show', $invoice->id)); ?>"
                                            class="btn btn-sm btn-outline-secondary">View</a>

                                        <a href="<?php echo e(route('admin.invoices.edit', $invoice->id)); ?>"
                                            class="btn btn-sm btn-outline-primary">Edit</a>

                                        <form action="<?php echo e(route('admin.invoices.destroy', $invoice->id)); ?>"
                                            method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Delete this invoice?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">
                                        No invoices found
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <?php echo e($invoices->links()); ?>

                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/documents/invoices/index.blade.php ENDPATH**/ ?>