<?php $__env->startSection('title', 'Request a Quote'); ?>

<?php $__env->startSection('content'); ?>

    <section class="py-4 py-lg-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-12 col-lg-9">

                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success mb-4">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="card border-0 shadow-sm">

                        <div class="card-body p-3 p-md-4 p-lg-5">

                            
                            <div class="d-flex justify-content-between mb-4 flex-wrap gap-2" id="quoteSteps">

                                <button type="button" class="btn step-btn active" data-step="1">
                                    <span class="step-circle bg-primary text-white">1</span>
                                    <span class="d-none d-sm-inline text-primary">Contact</span>
                                </button>

                                <button type="button" class="btn step-btn" data-step="2">
                                    <span class="step-circle bg-secondary text-white">2</span>
                                    <span class="d-none d-sm-inline text-secondary">Move</span>
                                </button>

                                <button type="button" class="btn step-btn" data-step="3">
                                    <span class="step-circle bg-secondary text-white">3</span>
                                    <span class="d-none d-sm-inline text-secondary">Details</span>
                                </button>

                                <button type="button" class="btn step-btn" data-step="4">
                                    <span class="step-circle bg-secondary text-white">4</span>
                                    <span class="d-none d-sm-inline text-secondary">Submit</span>
                                </button>

                            </div>

                            
                            <form method="POST" action="<?php echo e(route('frontend.quotations.store')); ?>" id="quoteForm">
                                <?php echo csrf_field(); ?>

                                
                                <input type="hidden" name="submit_type" id="submit_type" value="email">

                                
                                <div class="quote-step" id="qstep-1">
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" name="first_name" class="form-control shadow-sm" id="first_name">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control shadow-sm">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Phone *</label>
                                            <div class="input-group shadow-sm">
                                                <span class="input-group-text">+254</span>
                                                <input type="text" name="phone_number" class="form-control" id="phone_number">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control shadow-sm">
                                        </div>

                                    </div>
                                </div>

                                
                                <div class="quote-step d-none" id="qstep-2">
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label">Move Type *</label>
                                            <select name="move_type" class="form-select shadow-sm" id="move_type">
                                                <option value="">Select</option>
                                                <option>House Move</option>
                                                <option>Office Relocation</option>
                                                <option>Apartment Move</option>
                                                <option>Storage Move</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Urgency *</label>
                                            <select name="urgency" class="form-select shadow-sm" id="urgency">
                                                <option value="">Select</option>
                                                <option>Flexible</option>
                                                <option>Within 7 days</option>
                                                <option>Within 24–48 hours</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                
                                <div class="quote-step d-none" id="qstep-3">
                                    <div class="row g-3">

                                        <div class="col-12">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control shadow-sm" rows="4"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Pickup *</label>
                                            <input type="text" name="pickup_location" class="form-control shadow-sm" id="pickup">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Destination *</label>
                                            <input type="text" name="dropoff_location" class="form-control shadow-sm" id="dropoff">
                                        </div>

                                    </div>
                                </div>

                                
                                <div class="quote-step d-none" id="qstep-4">

                                    <div class="alert alert-light border">
                                        Confirm your details and choose how to submit your request.
                                    </div>

                                    <div class="d-grid gap-2">

                                        
                                        <button type="submit" class="btn btn-primary btn-lg"
                                            onclick="document.getElementById('submit_type').value='email'">
                                            Submit to Email
                                        </button>

                                        
                                        <button type="button" class="btn btn-success btn-lg" id="whatsappBtn">
                                            Submit on WhatsApp
                                        </button>

                                    </div>

                                </div>

                                
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary" id="qprevBtn">Previous</button>
                                    <button type="button" class="btn btn-primary" id="qnextBtn">Next</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <style>
        .step-btn { background: none; border: none; display: flex; align-items: center; gap: 8px; }
        .step-circle { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; }
        .step-btn.active .step-circle { background: var(--bs-primary); }
        .step-btn.completed .step-circle { background: var(--bs-secondary); }
        .form-control, .form-select { border-radius: 10px; padding: 10px 12px; }
    </style>

<script>
    let current = 1;
    const total = 4;

    function validateStep(step) {
        if (step === 1) {
            if (!first_name.value || !phone_number.value) {
                alert("Please fill required contact details");
                return false;
            }
        }
        if (step === 2) {
            if (!move_type.value || !urgency.value) {
                alert("Please select move type and urgency");
                return false;
            }
        }
        if (step === 3) {
            if (!pickup.value || !dropoff.value) {
                alert("Please fill pickup and destination");
                return false;
            }
        }
        return true;
    }

    function update(step) {
        document.querySelectorAll('.quote-step').forEach(e => e.classList.add('d-none'));
        document.getElementById('qstep-' + step).classList.remove('d-none');
        document.querySelectorAll('#quoteSteps .step-btn').forEach((btn, i) => {
            btn.classList.remove('active', 'completed');
            if (i + 1 < step) btn.classList.add('completed');
            if (i + 1 === step) btn.classList.add('active');
        });
        document.getElementById('qprevBtn').style.visibility = step === 1 ? 'hidden' : 'visible';
        document.getElementById('qnextBtn').style.display = step === total ? 'none' : 'inline-block';
    }

    document.getElementById('qnextBtn').addEventListener('click', () => {
        if (!validateStep(current)) return;
        if (current < total) { current++; update(current); }
    });

    document.getElementById('qprevBtn').addEventListener('click', () => {
        if (current > 1) { current--; update(current); }
    });

    document.querySelectorAll('#quoteSteps .step-btn').forEach((btn) => {
        btn.addEventListener('click', () => {
            let target = parseInt(btn.dataset.step);
            if (target > current && !validateStep(current)) return;
            current = target;
            update(current);
        });
    });

    update(current);

    // -------------------
    // WHATSAPP — submit form via fetch, save to DB, then open WhatsApp
    // -------------------
    document.getElementById('whatsappBtn').addEventListener('click', () => {

    // Set BEFORE building formData so it's included
    document.getElementById('submit_type').value = 'whatsapp';

    const form     = document.getElementById('quoteForm');
    const formData = new FormData(form);

    // Confirm it's in the payload
    console.log('submit_type:', formData.get('submit_type'));

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
        body: formData,
    })
    .then(res => {
        return res.text().then(text => {
            try {
                return JSON.parse(text);
            } catch (e) {
                throw new Error('Not JSON: ' + text.substring(0, 200));
            }
        });
    })
    .then(data => {
        if (data.whatsapp && data.url) {
            window.open(data.url, '_blank');
        }
    })
    .catch(err => {
        console.error('Submission error:', err.message);
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/frontend/quotations/create.blade.php ENDPATH**/ ?>