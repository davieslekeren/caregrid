<?php $__env->startSection('page-title'); ?>
    <?php echo e(clientPrefix()); ?><?php echo e(!empty($client->clients)?$client->clients->client_id:''); ?> <?php echo e(__('Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('client.index')); ?>"><?php echo e(__('Client')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">
                <?php echo e(clientPrefix()); ?><?php echo e(!empty($client->clients)?$client->clients->client_id:''); ?> <?php echo e(__('Details')); ?>

            </a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>  <?php echo e(clientPrefix()); ?><?php echo e(!empty($client->clients)?$client->clients->client_id:''); ?> <?php echo e(__('Details')); ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Name')); ?></b>
                                <p class="mb-20"><?php echo e($client->name); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Email')); ?></b>
                                <p class="mb-20"><?php echo e($client->email); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Phone Number')); ?></b>
                                <p class="mb-20"><?php echo e($client->phone_number); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Company')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->company:'-'); ?> </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 mb-20">
                        <h4> <b><?php echo e(__('Service Address')); ?></b></h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Country')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->service_country:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('State')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->service_state:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('City')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->service_city:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Zip Code')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->service_zip_code:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Address')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->service_address:'-'); ?> </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class=" col-md-12 mb-20">
                        <h4> <b><?php echo e(__('Billing Address')); ?></b></h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Billing Country')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->billing_country:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Billing State')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->billing_state:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Billing City')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->billing_city:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Billing Zip Code')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->billing_zip_code:'-'); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="detail-group">
                                <b><?php echo e(__('Billing Address')); ?></b>
                                <p class="mb-20"><?php echo e(!empty($client->clients)?$client->clients->billing_address:'-'); ?> </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/carecifn/public_html/preprod/resources/views/client/show.blade.php ENDPATH**/ ?>