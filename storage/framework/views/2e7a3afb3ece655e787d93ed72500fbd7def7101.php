<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Work Order')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.repeater.min.js')); ?>"></script>
    <script>
        var estimationSelector = "body";
        if ($(estimationSelector + " .repeater").length) {
            var $rowDragAndDrop = $("body .repeater tbody").sortable({
                handle: '.sort-handler'
            });
            var $estimationRepeater = $(estimationSelector + ' .repeater').repeater({
                initEmpty: true,
                defaultValues: {
                    'status': 1
                },
                show: function () {
                    $(".hidesearch").each(function() {
                        var basic_select = new Choices(this, {
                            searchEnabled: false,
                            removeItemButton: true,
                        });
                    });
                    $(this).slideDown();
                },
                hide: function (deleteEstimation) {
                    if (confirm('Are you sure you want to delete this record?')) {
                        $(this).slideUp(deleteEstimation);
                        $(this).remove();
                    }
                },
                ready: function (setIndexes) {
                    $rowDragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: false
            });

        }
    </script>
    <script>
        $(document).on('change', '.service_part_id', function () {
            var currentElement = $(this).closest('tr');
            var service_part_id = $(this).val();
            var url = '<?php echo e(route("workorder.service.part")); ?>';
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: service_part_id,
                },
                contentType: false,
                type: 'GET',
                success: function (data) {
                    currentElement.find('.quantity').val(1);
                    currentElement.find('.amount').val(data.price);
                    currentElement.find('.unit').val(data.unit);
                    currentElement.find('.description').val(data.description);
                },
            });
        });

    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('workorder.index')); ?>"><?php echo e(__('Work Order')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Create')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <?php echo e(Form::open(array('url'=>'workorder','method'=>'post'))); ?>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="info-group row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('wo_id',__('Workorder Number'),array('class'=>'form-label'))); ?>

                                <span class="text-danger">*</span>
                                <div class="input-group">
                                        <span class="input-group-text ">
                                          <?php echo e(workOrderPrefix()); ?>

                                        </span>
                                    <?php echo e(Form::text('wo_id',$workOrderNumber,array('class'=>'form-control','placeholder'=>__('Enter Workorder Number')))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <?php echo e(Form::label('wo_detail',__('WO Detail'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
                            <?php echo e(Form::textarea('wo_detail',old('wo_detail'),array('class'=>'form-control','rows'=>1,'required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <?php echo e(Form::label('type', __('Type'),['class'=>'form-label'])); ?> <span class="text-danger">*</span>
                            <?php echo Form::select('type', $woTypes, old('type'),array('class' => 'form-control hidesearch','required'=>'required')); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('client', __('Client'),['class'=>'form-label'])); ?> <span class="text-danger">*</span>
                            <?php echo Form::select('client', $clients, old('client'),array('class' => 'form-control hidesearch','required'=>'required')); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('asset', __('Asset'),['class'=>'form-label'])); ?> <span class="text-danger">*</span>
                            <?php echo Form::select('asset', $assets, old('asset'),array('class' => 'form-control hidesearch','required'=>'required')); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('due_date',__('Due Date'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
                            <?php echo e(Form::date('due_date',old('due_date'),array('class'=>'form-control','required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('priority', __('Priority'),['class'=>'form-label'])); ?> <span class="text-danger">*</span>
                            <?php echo Form::select('priority', $priority, old('priority'),array('class' => 'form-control hidesearch','required'=>'required')); ?>

                        </div>

                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('assign', __('Assign'),['class'=>'form-label'])); ?> <span class="text-danger">*</span>
                            <?php echo Form::select('assign', $users, old('assign'),array('class' => 'form-control hidesearch')); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('notes',__('Notes'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::textarea('notes',old('notes'),array('class'=>'form-control','rows'=>1))); ?>

                        </div>
                        <hr>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('preferred_date',__('Preferred Date'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::date('preferred_date',old('preferred_date'),array('class'=>'form-control'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('preferred_time', __('Preferred Time'),['class'=>'form-label'])); ?>

                            <?php echo Form::select('preferred_time', $time, old('preferred_time'),array('class' => 'form-control hidesearch')); ?>

                        </div>
                        <div class="form-group  col-md-6">
                            <?php echo e(Form::label('preferred_note',__('Preference Note'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::textarea('preferred_note',old('preferred_note'),array('class'=>'form-control','rows'=>1))); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="col-lg-12 col-md-12">
                <div class="card repeater services">
                    <div class="card-header">
                        <div class="row align-items-center g-2">
                            <div class="col">
                                <h5><?php echo e(__('Services')); ?></h5>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-secondary btn-sm" href="#" data-repeater-create=""> <i
                                        class="ti ti-circle-plus align-text-bottom"></i><?php echo e(__('Add Service')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="display dataTable cell-border" data-repeater-list="services">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Service')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Unit')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody data-repeater-item>
                            <tr>
                                <td width="30%">
                                    <?php echo e(Form::select('service_part_id',$services,null,array('class'=>'form-control hidesearch service_part_id'))); ?>

                                </td>
                                <td>
                                    <?php echo e(Form::number('quantity',null,array('class'=>'form-control quantity'))); ?>

                                </td>
                                <td>
                                    <?php echo Form::text('unit', null, array('class'=>'form-control unit', 'readonly')); ?>

                                    
                                </td>
                                <td>
                                    <?php echo e(Form::number('amount',null,array('class'=>'form-control amount'))); ?>

                                </td>
                                <td>
                                    <?php echo e(Form::textarea('description',null,array('class'=>'form-control description','rows'=>1))); ?>

                                </td>
                                <td>
                                    <a class="text-danger" data-repeater-delete href="#"> <i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="card repeater parts">
                    <div class="card-header">
                        <div class="row align-items-center g-2">
                            <div class="col">
                                <h5><?php echo e(__('Parts')); ?></h5>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-secondary btn-sm" href="#" data-repeater-create=""> <i
                                        class="ti ti-circle-plus align-text-bottom"></i><?php echo e(__('Add Part')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="display dataTable cell-border" data-repeater-list="parts">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Part')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Unit')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody data-repeater-item>
                            <tr>
                                <td width="30%">
                                    <?php echo e(Form::select('service_part_id',$parts,null,array('class'=>'form-control hidesearch service_part_id'))); ?>

                                </td>
                                <td>
                                    <?php echo e(Form::number('quantity',null,array('class'=>'form-control quantity'))); ?>

                                </td>
                                <td>
                                    
                                    <?php echo Form::text('unit', null, array('class'=>'form-control unit', 'readonly')); ?>

                                </td>
                                <td>
                                    <?php echo e(Form::number('amount',null,array('class'=>'form-control amount'))); ?>

                                </td>
                                <td>
                                    <?php echo e(Form::textarea('description',null,array('class'=>'form-control description','rows'=>1))); ?>

                                </td>
                                <td>
                                    <a class="text-danger" data-repeater-delete href="#"> <i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class=" text-end mb-3  ">
                    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-secondary btn-rounded'))); ?>

                </div>
            </div>
        </div>

        <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/carecifn/public_html/preprod/resources/views/workorder/create.blade.php ENDPATH**/ ?>