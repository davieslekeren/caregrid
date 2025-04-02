<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Invoice')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('invoice.index')); ?>"><?php echo e(__('Invoice')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(invoicePrefix() . $invoice->invoice_id); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php
    $admin_logo = getSettingsValByName('company_logo');
    $settings = settings();
?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '.print', function() {
            $('.action').addClass('d-none');
            var printContents = document.getElementById('invoice-print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            $('.action').removeClass('d-none');
        });
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row" id="invoice-print">
        <div class="col-sm-12">
            <div class="d-print-none card mb-3">
                <div class="card-body p-3">
                    <ul class="list-inline ms-auto mb-0 d-flex justify-content-end flex-wrap">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit invoice')): ?>
                            <li class="list-inline-item align-bottom me-2">
                                <a href="#" class="avtar avtar-s btn-link-secondary customModal" data-size="lg"
                                    href="#" data-url="<?php echo e(route('invoice.edit', $invoice->id)); ?>"
                                    data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Edit Invoice')); ?>">
                                    <i class="ph-duotone ph-note-pencil f-22"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="list-inline-item align-bottom me-2">
                            <a href="javascript:void(0);" class="avtar avtar-s btn-link-secondary print"
                                data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Download')); ?>">
                                <i class="ph-duotone ph-printer f-22"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>



            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 ">
                            <div class="row align-items-center g-3">
                                <div class="col-sm-6 ">
                                    <div class="d-flex align-items-center mb-2 navbar-brand img-fluid invoice-logo">
                                        <img src="<?php echo e(asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png')); ?>"
                                            class="img-fluid brand-logo" alt="images" />
                                    </div>
                                    <p class="mb-0"><?php echo e(invoicePrefix() . $invoice->invoice_id); ?></p>
                                </div>
                                <div class="col-sm-6 text-sm-end">

                                    <h6>
                                        <?php echo e(__('Work Order No')); ?> :
                                        <span class="text-muted f-w-400"><?php echo e(workOrderPrefix() . $workorder->wo_id); ?></span>
                                    </h6>
                                    <h6>
                                        <?php echo e(__('Invoice Date')); ?> :
                                        <span class="text-muted f-w-400"><?php echo e(dateFormat($invoice->invoice_date)); ?></span>
                                    </h6>
                                    <h6>
                                        <?php echo e(__('Due Date')); ?> :
                                        <span class="text-muted f-w-400"><?php echo e(dateFormat($invoice->due_date)); ?></span>
                                    </h6>
                                    <h6>
                                        <?php echo e(__('Status')); ?> :
                                        <span class="text-muted f-w-400">
                                            <?php if($invoice->status == 'paid'): ?>
                                                <span
                                                    class="badge text-bg-success"><?php echo e(\App\Models\Invoice::$status[$invoice->status]); ?></span>
                                            <?php else: ?>
                                                <span
                                                    class="badge text-bg-danger"><?php echo e(\App\Models\Invoice::$status[$invoice->status]); ?></span>
                                            <?php endif; ?>
                                        </span>
                                    </h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="border rounded p-3">
                                <h6 class="mb-0"><?php echo e(__('From')); ?> :</h6>
                                <h5><?php echo e($settings['company_name']); ?></h5>
                                <p class="mb-0"><?php echo e($settings['company_phone']); ?></p>
                                <p class="mb-0"><?php echo e($settings['company_email']); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md <?php echo e(!empty($invoice->clients->clients->billing_address) ? '4' : '6'); ?>">
                            <div class="border rounded p-3">
                                <h6 class="mb-0"><?php echo e(__('To')); ?> :</h6>
                                <h5><?php echo e(!empty($invoice) && !empty($invoice->Customer) ? $invoice->Customer->name : ''); ?>

                                </h5>
                                <p class="mb-0">
                                    <?php echo e(!empty($invoice->clients) ? $invoice->clients->name : ''); ?>

                                    (<?php echo e(!empty($invoice->clients) && !empty($invoice->clients->clients) ? $invoice->clients->clients->company : ''); ?>)
                                </p>

                                <p class="mb-0">
                                    <?php echo e(!empty($invoice->clients) ? $invoice->clients->phone_number : ''); ?>

                                </p>

                                <p class="mb-0">
                                <h6 class="mt-10 text-primary"><?php echo e(__('Service Address')); ?>:</h6>

                                <?php echo e(!empty($invoice->clients) && !empty($invoice->clients->clients) ? $invoice->clients->clients->service_address : ''); ?>

                                <?php if(!empty($invoice->clients) && !empty($invoice->clients->clients) && !empty($invoice->clients->clients->service_city)): ?>
                                    <br> <?php echo e($invoice->clients->clients->service_city); ?>

                                    , <?php echo e($invoice->clients->clients->service_state); ?>

                                    , <?php echo e($invoice->clients->clients->service_country); ?>,
                                    <?php echo e($invoice->clients->clients->service_zip_code); ?>

                                <?php endif; ?>
                                </p>
                            </div>
                        </div>

                        <?php if(!empty($invoice->clients->clients->billing_address)): ?>
                            <div class="col-sm-12 col-md-4">
                                <div class="border rounded p-3">
                                    <h6 class="mt-10 text-primary"><?php echo e(__('Billing Address')); ?>:</h6>

                                    <?php echo e(!empty($invoice->clients) && !empty($invoice->clients->clients) ? $invoice->clients->clients->billing_address : ''); ?>

                                    <?php if(!empty($invoice->clients) && !empty($invoice->clients->clients) && !empty($invoice->clients->clients->billing_city)): ?>
                                        <br> <?php echo e($invoice->clients->clients->billing_city); ?>

                                        , <?php echo e($invoice->clients->clients->billing_state); ?>

                                        , <?php echo e($invoice->clients->clients->billing_country); ?>,
                                        <?php echo e($invoice->clients->clients->billing_zip_code); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Service')); ?></th>
                                            <th><?php echo e(__('Quantity')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                            <th><?php echo e(__('Amount')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $workorder->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(!empty($service->serviceParts) ? $service->serviceParts->title : '-'); ?>

                                                </td>
                                                <td><?php echo e($service->quantity); ?>

                                                    <?php echo e(!empty($service->serviceParts) ? $service->serviceParts->unit : ''); ?>

                                                </td>
                                                <td><?php echo e(!empty($service->description) ? $service->description : '-'); ?></td>
                                                <td><?php echo e(priceFormat($service->amount)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-start">
                                <hr class="mb-2 mt-1 border-secondary border-opacity-50" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Part')); ?></th>
                                            <th><?php echo e(__('Quantity')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                            <th><?php echo e(__('Amount')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $workorder->parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e(!empty($part->serviceParts) ? $part->serviceParts->title : '-'); ?>

                                                </td>
                                                <td><?php echo e($part->quantity); ?>

                                                    <?php echo e(!empty($part->serviceParts) ? $part->serviceParts->unit : ''); ?></td>
                                                <td><?php echo e(!empty($part->description) ? $part->description : '-'); ?></td>
                                                <td><?php echo e(priceFormat($part->amount)); ?></td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-start">
                                <hr class="mb-2 mt-1 border-secondary border-opacity-50" />
                            </div>
                        </div>

                        <div class="card-body p-3">
                            <div class="rounded p-3 bg-light-secondary">
                                <div class="row justify-content-end">
                                    <div class="col-auto">
                                        <div class="table-responsive">
                                            <table class="table table-borderless text-end mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th><?php echo e(__('Sub Total')); ?> :</th>
                                                        <td><?php echo e(priceFormat($workorder->getWorkorderTotalAmount())); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(__('Discount')); ?> :</th>
                                                        <td><?php echo e(priceFormat($invoice->discount)); ?></td>
                                                    </tr>
                                                    <tr>

                                                        <td class="pe-0 pt-0">

                                                            <hr class="mb-3 mt-0" />
                                                            <h5 class="text-primary m-r-10 "><?php echo e(__('Grand Total')); ?> :</h5>
                                                        </td>
                                                        <td class="ps-0 pt-0">

                                                            <hr class="mb-3 mt-0" />
                                                            <h5 class="text-primary">
                                                                <?php echo e(priceFormat($invoice->total - $invoice->discount)); ?>

                                                            </h5>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-dark">
                                    <?php if(!empty($invoice->notes)): ?>
                                        <?php echo e(__('Notes')); ?> : <p><?php echo e($invoice->notes); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/carecifn/public_html/preprod/resources/views/invoice/show.blade.php ENDPATH**/ ?>