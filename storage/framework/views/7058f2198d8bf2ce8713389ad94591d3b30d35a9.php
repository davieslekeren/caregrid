<?php
    $settings = settings();
?>
<?php $__env->startSection('tab-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="auth-header">
                            <h2 class="text-secondary"><b><?php echo e(__('Welcome to ')); ?><?php echo e(env('APP_NAME')); ?>!</b></h2>
                            <h4 class="mx-2"><b><?php echo e(__('Enter your 2FA Verification Code (OTP)')); ?></b></h4>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::open(['route' => 'otp.check', 'method' => 'post', 'id' => 'loginForm', 'class' => 'login-form'])); ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger mb-0" role="alert"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="alert alert-success mb-0" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row text-center">
                    <input type="number" class="form-control w-100 mx-2 mt-3 text-center" name="otp" min="0" max="999999" />
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-seconadry p-2"><?php echo e(__('Continue')); ?></button>
                </div>
                <?php echo e(Form::close()); ?>


            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content1'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/carecifn/public_html/preprod/resources/views/auth/otp.blade.php ENDPATH**/ ?>