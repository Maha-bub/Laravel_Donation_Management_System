<?php $__env->startSection('content'); ?>
    <!-- Hero Section Start -->
    <div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Donation Now</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Donation Now
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Donation Section Start -->
    

    <!-- Donation-Details Section Start -->
    

    <!-- Feature Section Start -->
    

    <!-- Pricing Section Start -->
    

    <!-- Cta-bg-section-4 Start -->
    
    <section class="py-5 bg-light">
        <div class="container">

            <div class="card border-0 shadow-lg overflow-hidden rounded-4">

                <div class="row g-0">

                    <!-- ===========================
                                LEFT PAYMENT SIDEBAR
                            ============================ -->

                    <div class="col-lg-4 bg-success text-white">

                        <div class="p-5 h-100 d-flex flex-column">

                            <h2 class="fw-bold mb-2">
                                Accepted Payments
                            </h2>

                            <p class="text-white-50 mb-4">
                                All transactions are encrypted &
                                secure.
                            </p>

                            <!-- Secure Notice -->

                            <div
                                class="alert alert-success border border-light-subtle bg-white bg-opacity-10 text-white rounded-3">

                                <div class="d-flex align-items-center">

                                    <i class="fas fa-shield-alt fs-4 me-3"></i>

                                    <div>

                                        <strong>
                                            Secure Gateway
                                        </strong>

                                        <div class="small">
                                            You will be redirected to a secure payment gateway.
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <h6 class="text-uppercase mt-4 mb-3 text-warning">
                                Payment Methods
                            </h6>

                            <!-- Payment -->

                            <div class="list-group list-group-flush">

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 mb-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-mobile-alt fs-4 me-3"></i>

                                            <span>
                                                bKash (Online)
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 mb-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-wallet fs-4 me-3"></i>

                                            <span>
                                                Nagad / Rocket
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 mb-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-credit-card fs-4 me-3"></i>

                                            <span>
                                                Visa / MasterCard
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-university fs-4 me-3"></i>

                                            <span>
                                                Bank Transfer
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                            </div>

                            <div class="mt-auto">

                                <div class="card bg-warning bg-opacity-10 border-warning mt-5">

                                    <div class="card-body">

                                        <small class="text-warning fw-bold">
                                            Emergency Contact
                                        </small>

                                        <h4 class="fw-bold text-white mb-0">
                                            +8801792861249
                                        </h4>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- ===========================
                                RIGHT FORM
                            ============================ -->

                    <div class="col-lg-8 bg-white">

                        <div class="p-5">

                            <h2 class="fw-bold">
                                Complete Your Donation
                            </h2>

                            <p class="text-muted mb-4">
                                Fill in your details to proceed securely.
                            </p>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($e); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(route('donation.store')); ?>" method="POST" id="donate-form">

                                <?php echo csrf_field(); ?>

                                <div class="row g-4">

                                    <!-- Project -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Select Project
                                        </label>

                                        <select class="form-select <?php $__errorArgs = ['campaign_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="campaign_id" required>

                                            <option value="" disabled <?php echo e(old('campaign_id', $selectedCampaignId) ? '' : 'selected'); ?>>
                                                Choose Project
                                            </option>

                                            <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($campaign->id); ?>"
                                                    <?php echo e((string) old('campaign_id', $selectedCampaignId) === (string) $campaign->id ? 'selected' : ''); ?>>
                                                    <?php echo e($campaign->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <option value="" disabled>No active campaigns available</option>
                                            <?php endif; ?>

                                        </select>
                                        <?php $__errorArgs = ['campaign_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <!-- Intention -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Donation Intention
                                        </label>

                                        <select class="form-select">

                                            <option selected>
                                                Choose Intention
                                            </option>

                                            <option>
                                                Zakat
                                            </option>

                                            <option>
                                                Sadaqah
                                            </option>

                                            <option>
                                                General Donation
                                            </option>

                                        </select>

                                    </div>

                                    <!-- Name -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Your Name
                                        </label>

                                        <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('name')); ?>" placeholder="Enter Full Name" required>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <!-- Mobile -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Mobile Number
                                        </label>

                                        <input type="text" name="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('phone')); ?>" placeholder="01XXXXXXXXX">
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <!-- City -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            City
                                        </label>

                                        <input type="text" name="city" class="form-control"
                                            value="<?php echo e(old('city')); ?>" placeholder="Enter Your City">

                                    </div>

                                    <!-- Address -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Address
                                        </label>

                                        <input type="text" name="address" class="form-control"
                                            value="<?php echo e(old('address')); ?>" placeholder="Full Address">

                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Email Address
                                        </label>
                                        <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('email')); ?>" placeholder="example@email.com" required>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Anonymous Donation -->
                                    <div class="col-md-6 d-flex align-items-end">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_anonymous"
                                                value="1" id="anonymous">
                                            <label class="form-check-label" for="anonymous">
                                                Donate Anonymously
                                            </label>
                                        </div>
                                    </div>

                                    <!-- ===========================
            DONATION AMOUNT
    =========================== -->

                                    <div class="col-12">

                                        <label class="form-label fw-bold fs-5">
                                            Select Donation Amount
                                        </label>

                                        <div class="d-flex flex-wrap gap-3">

                                            <input type="radio" class="btn-check" name="amount" id="amount1"
                                                value="200" checked>

                                            <label class="btn btn-outline-success px-4" for="amount1">
                                                ৳200
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount2"
                                                value="500">

                                            <label class="btn btn-outline-success px-4" for="amount2">
                                                ৳500
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount3"
                                                value="1000">

                                            <label class="btn btn-outline-success px-4" for="amount3">
                                                ৳1000
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount4"
                                                value="2000">

                                            <label class="btn btn-outline-success px-4" for="amount4">
                                                ৳2000
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount5"
                                                value="5000">

                                            <label class="btn btn-outline-success px-4" for="amount5">
                                                ৳5000
                                            </label>

                                        </div>

                                        <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger mt-2 small"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <div class="col-12">

                                        <label class="form-label fw-semibold">
                                            Or Enter Custom Amount
                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text">
                                                ৳
                                            </span>

                                            <input type="number" name="custom_amount" min="1" class="form-control"
                                                placeholder="Enter Amount">

                                        </div>

                                    </div>

                                    <!-- ===========================
          PAYMENT METHOD
    =========================== -->

                                    <div class="col-12">

                                        <label class="form-label fw-bold fs-5">
                                            Payment Method
                                        </label>

                                        <div class="row g-3">

                                            <div class="col-md-4">

                                                <input class="btn-check" type="radio" name="payment_method" id="bkash"
                                                    value="bKash" checked>

                                                <label class="btn btn-outline-success w-100 py-3" for="bkash">

                                                    <i class="fas fa-mobile-alt d-block fs-3 mb-2"></i>

                                                    bKash

                                                </label>

                                            </div>

                                            <div class="col-md-4">

                                                <input class="btn-check" type="radio" name="payment_method" id="nagad"
                                                    value="Nagad">

                                                <label class="btn btn-outline-success w-100 py-3" for="nagad">

                                                    <i class="fas fa-wallet d-block fs-3 mb-2"></i>

                                                    Nagad

                                                </label>

                                            </div>

                                            <div class="col-md-4">

                                                <input class="btn-check" type="radio" name="payment_method" id="card"
                                                    value="Visa/Master">

                                                <label class="btn btn-outline-success w-100 py-3" for="card">

                                                    <i class="far fa-credit-card d-block fs-3 mb-2"></i>

                                                    Visa / Master

                                                </label>

                                            </div>

                                        </div>

                                        <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger mt-2 small"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <!-- Message -->

                                    <div class="col-12">

                                        <label class="form-label">
                                            Message (Optional)
                                        </label>

                                        <textarea rows="4" class="form-control" placeholder="Write your message..."></textarea>

                                    </div>

                                    <!-- Terms -->

                                    <div class="col-12">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" id="agree">

                                            <label class="form-check-label" for="agree">

                                                I agree to the Terms &
                                                Conditions and Privacy Policy.

                                            </label>

                                        </div>

                                    </div>

                                    <!-- Donate Button -->

                                    <div class="col-12">

                                        <button class="btn btn-success btn-lg w-100 py-3">

                                            <i class="fas fa-heart me-2"></i>

                                            Donate Securely

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Donation_Management_System\resources\views/frontend/pages/donation.blade.php ENDPATH**/ ?>