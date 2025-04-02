<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Workorder')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('workorder.index')); ?>"><?php echo e(__('Workorder')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(workOrderPrefix() . $workorder->wo_id); ?></a>
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
            var printContents = document.getElementById('invoice-print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            $('.invoice-action').addClass('d-none');
            window.print();
            $('.invoice-action').removeClass('d-none');
            document.body.innerHTML = originalContents;
        });

        $(document).on('click', '.workorderStatusChange', function() {
            var workorderStatus = this.value;
            var workorderUrl = $(this).data('url');
            $.ajax({
                url: workorderUrl + '?status=' + workorderStatus,
                type: 'GET',
                cache: false,
                success: function(data) {
                    location.reload();
                },
            });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs profile-tabs border-bottom mb-3 d-print-none" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                role="tab" aria-selected="true">
                                <?php echo e(__('Services and Parts')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                                aria-selected="true">
                                <?php echo e(__('Service Tasks')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab"
                                aria-selected="true">
                                <?php echo e(__('Service Appointment')); ?>

                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                            <div class="card border">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5 class="mb-0"><?php echo e(__('Services and Parts')); ?></h5>
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <a href="javascript:void(0);" class="avtar avtar-s btn-link-secondary print"
                                                data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Download')); ?>">
                                                <i class="ph-duotone ph-printer f-22"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="invoice-print">


                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12 ">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-sm-6 ">
                                                        <div
                                                            class="d-flex align-items-center mb-2 navbar-brand img-fluid invoice-logo">
                                                            <img src="<?php echo e(asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png')); ?>"
                                                                class="img-fluid brand-logo" alt="images" />
                                                        </div>
                                                        <p class="mb-0"><?php echo e(workOrderPrefix() . $workorder->wo_id); ?></p>
                                                    </div>
                                                    <div class="col-sm-6 text-sm-end">

                                                        <h6>
                                                            <?php echo e(__('Assign To')); ?> :
                                                            <span
                                                                class="text-muted f-w-400"><?php echo e(!empty($workorder->assigned) ? $workorder->assigned->name : '-'); ?>

                                                            </span>
                                                        </h6>
                                                        <h6>
                                                            <?php echo e(__('Asset')); ?> :
                                                            <span
                                                                class="text-muted f-w-400"><?php echo e(!empty($workorder->assets) ? $workorder->assets->name : '-'); ?></span>
                                                        </h6>
                                                        <h6>
                                                            <?php echo e(__('Type')); ?> :
                                                            <span
                                                                class="text-muted f-w-400"><?php echo e(!empty($workorder->types) ? $workorder->types->type : '-'); ?></span>
                                                        </h6>
                                                        <h6>
                                                            <?php echo e(__('Due Date')); ?> :
                                                            <span
                                                                class="text-muted f-w-400"><?php echo e(dateFormat($workorder->due_date)); ?></span>
                                                        </h6>
                                                        <h6>
                                                            <?php echo e(__('Status')); ?> :
                                                            <span class="text-muted f-w-400">
                                                                <?php if($workorder->status == 'pending'): ?>
                                                                    <span
                                                                        class="badge text-bg-warning"><?php echo e(\App\Models\Estimation::$status[$workorder->status]); ?></span>
                                                                <?php elseif($workorder->status == 'on_hold'): ?>
                                                                    <span
                                                                        class="badge text-bg-primary"><?php echo e(\App\Models\Estimation::$status[$workorder->status]); ?></span>
                                                                <?php elseif($workorder->status == 'approved' || $workorder->status == 'completed'): ?>
                                                                    <span
                                                                        class="badge text-bg-success"><?php echo e(\App\Models\Estimation::$status[$workorder->status]); ?></span>
                                                                <?php else: ?>
                                                                    <span
                                                                        class="badge text-bg-danger"><?php echo e(\App\Models\Estimation::$status[$workorder->status]); ?></span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </h6>
                                                        <h6>
                                                            <?php echo e(__('Priority')); ?> :
                                                            <span class="text-muted f-w-400">
                                                                <?php if($workorder->priority == 'low'): ?>
                                                                    <span
                                                                        class="badge text-bg-primary"><?php echo e(\App\Models\WORequest::$priority[$workorder->priority]); ?></span>
                                                                <?php elseif($workorder->priority == 'medium'): ?>
                                                                    <span
                                                                        class="badge text-bg-info"><?php echo e(\App\Models\WORequest::$priority[$workorder->priority]); ?></span>
                                                                <?php elseif($workorder->priority == 'high'): ?>
                                                                    <span
                                                                        class="badge text-bg-warning"><?php echo e(\App\Models\WORequest::$priority[$workorder->priority]); ?></span>
                                                                <?php elseif($workorder->priority == 'critical'): ?>
                                                                    <span
                                                                        class="badge text-bg-danger"><?php echo e(\App\Models\WORequest::$priority[$workorder->priority]); ?></span>
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
                                            <div
                                                class="col-sm-4 col-md <?php echo e(!empty($workorder->clients->clients->billing_address) ? '4' : '6'); ?>">
                                                <div class="border rounded p-3">
                                                    <h6 class="mb-0"><?php echo e(__('To')); ?> :</h6>
                                                    <h5><?php echo e(!empty($invoice) && !empty($invoice->Customer) ? $invoice->Customer->name : ''); ?>

                                                    </h5>
                                                    <p class="mb-0">
                                                        <?php echo e(!empty($workorder->clients) ? $workorder->clients->name : ''); ?>

                                                        (<?php echo e(!empty($workorder->clients) && !empty($workorder->clients->clients) ? $workorder->clients->clients->company : ''); ?>)
                                                    </p>

                                                    <p class="mb-0">
                                                        <?php echo e(!empty($workorder->clients) ? $workorder->clients->phone_number : ''); ?>

                                                    </p>

                                                    <p class="mb-0">
                                                    <h6 class="mt-10 text-primary"><?php echo e(__('Service Address')); ?>:</h6>

                                                    <?php echo e(!empty($workorder->clients) && !empty($workorder->clients->clients) ? $workorder->clients->clients->service_address : ''); ?>

                                                    <?php if(
                                                        !empty($workorder->clients) &&
                                                            !empty($workorder->clients->clients) &&
                                                            !empty($workorder->clients->clients->service_city)): ?>
                                                        <br> <?php echo e($workorder->clients->clients->service_city); ?>

                                                        , <?php echo e($workorder->clients->clients->service_state); ?>

                                                        , <?php echo e($workorder->clients->clients->service_country); ?>,
                                                        <?php echo e($workorder->clients->clients->service_zip_code); ?>

                                                    <?php endif; ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <?php if(!empty($workorder->clients->clients->billing_address)): ?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="border rounded p-3">
                                                        <h6 class="mt-10 text-primary"><?php echo e(__('Billing Address')); ?>:</h6>

                                                        <?php echo e(!empty($workorder->clients) && !empty($workorder->clients->clients) ? $workorder->clients->clients->billing_address : ''); ?>

                                                        <?php if(
                                                            !empty($workorder->clients) &&
                                                                !empty($workorder->clients->clients) &&
                                                                !empty($workorder->clients->clients->billing_city)): ?>
                                                            <br> <?php echo e($workorder->clients->clients->billing_city); ?>

                                                            , <?php echo e($workorder->clients->clients->billing_state); ?>

                                                            , <?php echo e($workorder->clients->clients->billing_country); ?>,
                                                            <?php echo e($workorder->clients->clients->billing_zip_code); ?>

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
                                                                    <td><?php echo e(!empty($service->description) ? $service->description : '-'); ?>

                                                                    </td>
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



                                            <div class="col-12 mt-5">
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

                                                                        <?php echo e(!empty($part->serviceParts) ? $part->serviceParts->unit : ''); ?>

                                                                    </td>
                                                                    <td><?php echo e(!empty($part->description) ? $part->description : '-'); ?>

                                                                    </td>
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
                                                                            <td class="pe-0 pt-0">

                                                                                <h4 class="text-primary m-r-10 ">
                                                                                    <?php echo e(__('Grand Total')); ?> :</h4>
                                                                            </td>
                                                                            <td class="ps-0 pt-0">

                                                                                <h4 class="text-primary">
                                                                                    <?php echo e(priceFormat($workorder->getWorkorderTotalAmount())); ?>

                                                                                </h4>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-dark">
                                                        <?php if(!empty($workorder->notes)): ?>
                                                            <?php echo e(__('Notes')); ?> : <p><?php echo e($workorder->notes); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if(\Auth::user()->type == 'owner'): ?>
                                                        <div class="row mb-2">
                                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-md-3 col-xxl-2">
                                                                    <div class="card border p-3">
                                                                        <div class="form-check">
                                                                            <input
                                                                                class="form-check-input estimationStatusChange"
                                                                                type="radio"
                                                                                value="<?php echo e($k); ?>"
                                                                                <?php echo e($workorder->status == $k ? 'checked' : ''); ?>

                                                                                id="<?php echo e($val); ?>"
                                                                                data-url="<?php echo e(route('estimation.status', $workorder->id)); ?>"
                                                                                name="status"></span>


                                                                            <label class="form-check-label d-block"
                                                                                for="<?php echo e($val); ?>">
                                                                                <span
                                                                                    class="h5 mb-0 d-block mt-1"><?php echo e($val); ?></span>

                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>



                        <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <div class="card border">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <h5 class="mb-0"><?php echo e(__('Service Task List')); ?></h5>
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <?php if(Gate::check('create workorder service task')): ?>
                                                <a class="btn btn-secondary btn-sm customModal mt-1" href="#"
                                                    data-url="<?php echo e(route('workorder.service.task.create', $workorder->id)); ?>"
                                                    data-size="md" data-title="<?php echo e(__('Create Service Task')); ?>">
                                                    <i class="ti ti-circle-plus align-text-bottom"></i>
                                                    <?php echo e(__('Create Task')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="dt-responsive table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('Service')); ?></th>
                                                    <th><?php echo e(__('Service Task')); ?></th>
                                                    <th><?php echo e(__('Task Duration')); ?></th>
                                                    <th><?php echo e(__('Description')); ?></th>
                                                    <th><?php echo e(__('Status')); ?></th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $workorder->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(!empty($task->services) ? $task->services->title : '-'); ?>

                                                        </td>
                                                        <td><?php echo e($task->service_task); ?></td>
                                                        <td><?php echo e($task->duration); ?></td>
                                                        <td><?php echo e($task->description); ?></td>
                                                        <td>
                                                            <?php if($task->status == 'pending'): ?>
                                                                <span
                                                                    class="badge text-bg-warning"><?php echo e(\App\Models\WOServiceTask::$status[$task->status]); ?></span>
                                                            <?php elseif($task->status == 'in_progress'): ?>
                                                                <span
                                                                    class="badge text-bg-primary"><?php echo e(\App\Models\WOServiceTask::$status[$task->status]); ?></span>
                                                            <?php elseif($task->status == 'on_hold'): ?>
                                                                <span
                                                                    class="badge text-bg-danger"><?php echo e(\App\Models\WOServiceTask::$status[$task->status]); ?></span>
                                                            <?php elseif($task->status == 'completed'): ?>
                                                                <span
                                                                    class="badge text-bg-success"><?php echo e(\App\Models\WOServiceTask::$status[$task->status]); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <div class="cart-action">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['workorder.service.task.destroy', $workorder->id, $task->id]]); ?>


                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit workorder service task')): ?>
                                                                    <a class="avtar avtar-xs btn-link-secondary text-secondary customModal"
                                                                        data-bs-toggle="tooltip" data-size="md"
                                                                        data-bs-original-title="<?php echo e(__('Edit')); ?>"
                                                                        href="#"
                                                                        data-url="<?php echo e(route('workorder.service.task.edit', [$workorder->id, $task->id])); ?>"
                                                                        data-title="<?php echo e(__('Edit Task')); ?>"> <i
                                                                            data-feather="edit"></i></a>
                                                                <?php endif; ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete workorder service task')): ?>
                                                                    <a class=" avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="<?php echo e(__('Detete')); ?>"
                                                                        href="#"> <i data-feather="trash-2"></i></a>
                                                                <?php endif; ?>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                            <div class="card border">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <h5 class="mb-0"><?php echo e(__('Service Appointment List')); ?></h5>
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <?php if(Gate::check('create service appointment')): ?>
                                                <a class="btn btn-secondary btn-sm me-2 customModal " href="#"
                                                    data-url="<?php echo e(route('workorder.service.appointment', $workorder->id)); ?>"
                                                    data-size="md" data-title="<?php echo e(__('Service Appointment')); ?>">
                                                    <?php echo e(__('Service Appointment')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="dt-responsive table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('Start Date')); ?></th>
                                                    <th><?php echo e(__('Start Time')); ?></th>
                                                    <th><?php echo e(__('End Date')); ?></th>
                                                    <th><?php echo e(__('End Time')); ?></th>
                                                    <th><?php echo e(__('Status')); ?></th>
                                                    <th><?php echo e(__('Description')); ?></th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $appointment=$workorder->appointments; ?>
                                                <?php if(!empty($appointment)): ?>
                                                    <tr>
                                                        <td><?php echo e(dateFormat($appointment->start_date)); ?></td>
                                                        <td><?php echo e(timeFormat($appointment->start_time)); ?></td>
                                                        <td><?php echo e(dateFormat($appointment->end_date)); ?></td>
                                                        <td><?php echo e(timeFormat($appointment->end_time)); ?></td>

                                                        <td>
                                                            <?php if(in_array($appointment->status, ['pending', 'on_hold'])): ?>
                                                                <span
                                                                    class="badge text-bg-warning"><?php echo e(\App\Models\WOServiceAppointment::$status[$appointment->status]); ?></span>
                                                            <?php elseif(in_array($appointment->status, ['schedule', 'reschedule'])): ?>
                                                                <span
                                                                    class="badge text-bg-primary"><?php echo e(\App\Models\WOServiceAppointment::$status[$appointment->status]); ?></span>
                                                            <?php elseif($appointment->status == 'dispatched'): ?>
                                                                <span
                                                                    class="badge text-bg-info"><?php echo e(\App\Models\WOServiceAppointment::$status[$appointment->status]); ?></span>
                                                            <?php elseif($appointment->status == 'completed'): ?>
                                                                <span
                                                                    class="badge text-bg-success"><?php echo e(\App\Models\WOServiceAppointment::$status[$appointment->status]); ?></span>
                                                            <?php else: ?>
                                                                <span
                                                                    class="badge text-bg-danger"><?php echo e(\App\Models\WOServiceAppointment::$status[$appointment->status]); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e(!empty($appointment->notes) ? $appointment->notes : '-'); ?>

                                                        </td>
                                                        <td>
                                                            <div class="cart-action">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['workorder.service.appointment.destroy', $workorder->id]]); ?>

                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete service appointment')): ?>
                                                                    <a class=" avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="<?php echo e(__('Detete')); ?>"
                                                                        href="#"> <i data-feather="trash-2"></i></a>
                                                                <?php endif; ?>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/carecifn/public_html/preprod/resources/views/workorder/show.blade.php ENDPATH**/ ?>