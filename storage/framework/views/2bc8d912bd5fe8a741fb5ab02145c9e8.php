

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        
        <div class="mb-4">
            <h2 class="fw-bold text-primary">Edit Receipt <?php echo e($receipt->receipt_number); ?></h2>
            <small class="text-muted">Update receipt details</small>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="<?php echo e(route('admin.receipts.update', $receipt->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <?php
                        // -------------------
                        // PRE-DETERMINE IF CLIENT IS LOCKED
                        // Locked if the receipt already has an invoice with a client
                        // -------------------
                        $isClientLocked = $receipt->invoice_id && $receipt->client_id;
                    ?>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Receipt Number</label>
                            <input type="text" class="form-control"
                                value="<?php echo e($receipt->receipt_number); ?>" readonly>
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label">Invoice <span class="text-muted fw-normal">(optional)</span></label>
                            <select name="invoice_id" id="invoice_id" class="form-select">
                                <option value="">— No Invoice —</option>
                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($invoice->id); ?>"
                                        <?php echo e($receipt->invoice_id == $invoice->id ? 'selected' : ''); ?>>
                                        <?php echo e($invoice->invoice_number); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label">
                                Client
                                <span id="clientLockedBadge"
                                    class="badge bg-secondary ms-1 <?php echo e($isClientLocked ? '' : 'd-none'); ?>">
                                    Auto-filled
                                </span>
                            </label>
                            <input type="hidden" name="client_id" id="client_id_hidden"
                                value="<?php echo e($receipt->client_id); ?>">
                            <select id="client_id_select" class="form-select"
                                <?php echo e($isClientLocked ? 'disabled' : ''); ?>>
                                <option value="">Select Client</option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($client->id); ?>"
                                        <?php echo e($receipt->client_id == $client->id ? 'selected' : ''); ?>>
                                        <?php echo e($client->first_name); ?> <?php echo e($client->last_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Amount Paid (KES)</label>
                            <input type="number" step="0.01" name="amount_paid"
                                class="form-control" value="<?php echo e($receipt->amount_paid); ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Payment Method</label>
                            <select name="payment_method" class="form-select">
                                <option value="">Select Method</option>
                                <option value="cash"          <?php echo e($receipt->payment_method == 'cash'          ? 'selected' : ''); ?>>Cash</option>
                                <option value="mpesa"         <?php echo e($receipt->payment_method == 'mpesa'         ? 'selected' : ''); ?>>M-Pesa</option>
                                <option value="bank_transfer" <?php echo e($receipt->payment_method == 'bank_transfer' ? 'selected' : ''); ?>>Bank Transfer</option>
                                <option value="cheque"        <?php echo e($receipt->payment_method == 'cheque'        ? 'selected' : ''); ?>>Cheque</option>
                                <option value="card"          <?php echo e($receipt->payment_method == 'card'          ? 'selected' : ''); ?>>Card</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Paid At</label>
                            <input type="datetime-local" name="paid_at" class="form-control"
                                value="<?php echo e($receipt->paid_at ? \Carbon\Carbon::parse($receipt->paid_at)->format('Y-m-d\TH:i') : ''); ?>">
                        </div>

                    </div>

                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="<?php echo e(route('admin.receipts.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                        <button class="btn btn-primary">Update Receipt</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        const invoiceSelect     = document.getElementById('invoice_id');
        const clientHidden      = document.getElementById('client_id_hidden');
        const clientSelect      = document.getElementById('client_id_select');
        const clientLockedBadge = document.getElementById('clientLockedBadge');
        const byInvoiceBase     = "<?php echo e(url(config('admin.prefix', 'admin') . '/receipts/by-invoice')); ?>";

        invoiceSelect.addEventListener('change', function () {
            const invoiceId = this.value;

            // -------------------
            // RESET IF NO INVOICE SELECTED
            // -------------------
            if (!invoiceId) {
                clientHidden.value    = '';
                clientSelect.value    = '';
                clientSelect.disabled = false;
                clientLockedBadge.classList.add('d-none');
                return;
            }

            // -------------------
            // FETCH CLIENT FROM INVOICE
            // -------------------
            fetch(`${byInvoiceBase}/${invoiceId}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.client) {
                    // -------------------
                    // AUTO-FILL AND LOCK CLIENT
                    // -------------------
                    clientHidden.value    = data.client.id;
                    clientSelect.value    = data.client.id;
                    clientSelect.disabled = true;
                    clientLockedBadge.classList.remove('d-none');
                } else {
                    clientHidden.value    = '';
                    clientSelect.value    = '';
                    clientSelect.disabled = false;
                    clientLockedBadge.classList.add('d-none');
                }
            })
            .catch(() => {
                clientSelect.disabled = false;
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/admin/documents/receipts/edit.blade.php ENDPATH**/ ?>