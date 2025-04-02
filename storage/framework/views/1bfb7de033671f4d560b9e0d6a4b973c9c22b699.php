<?php echo e(Form::open(array('url'=>'services-parts','method'=>'post'))); ?>

<div class="modal-body wrapper">
    <div class="row">
        <div class="form-group col-md-12">
            <div class="form-check custom-chek form-check-inline">
                <input class="form-check-input type" type="radio" value="service" id="service" name="type" checked>
                <label class="form-check-label" for="service"><?php echo e(__('Service')); ?> </label>
            </div>
            <div class="form-check custom-chek form-check-inline">
                <input class="form-check-input type" type="radio" value="part" id="part" name="type">
                <label class="form-check-label" for="part"><?php echo e(__('Part')); ?> </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('title',__('Title'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter title'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('sku',__('SKU'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('sku',null,array('class'=>'form-control','placeholder'=>__('Enter sku'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('price',__('Price'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('price',null,array('class'=>'form-control','placeholder'=>__('Enter price'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('unit',__('Unit'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('unit',null,array('class'=>'form-control','placeholder'=>__('Enter unit')))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('description',__('Description'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('description',null,array('class'=>'form-control','placeholder'=>__('Enter description')))); ?>

        </div>
    </div>
    <div class="service_tasks">
        <div class="row">
            <div class="col-sm-12">
                <a href="#" class="btn btn-secondary btn-xs service_task_clone float-end"><i class="ti ti-plus"></i></a>
            </div>
        </div>
        <div class="row service_task">
            <div class="form-group col-md-4">
                <?php echo e(Form::label('task',__('Service Task Title'),array('class'=>'form-label'))); ?>

                <?php echo e(Form::text('task[]',null,array('class'=>'form-control','placeholder'=>__('service task title')))); ?>

            </div>
            <div class="form-group col-md-3">
                <?php echo e(Form::label('duration',__('Duration'),array('class'=>'form-label'))); ?>

                <?php echo e(Form::text('duration[]',null,array('class'=>'form-control','placeholder'=>__('like 1 Hour 20 Min')))); ?>

            </div>
            <div class="form-group col-md-4">
                <?php echo e(Form::label('task_description',__('Description'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
                <?php echo e(Form::text('task_description[]',null,array('class'=>'form-control','placeholder'=>__('description')))); ?>

            </div>
            <div class="col-auto">
                <a href="#" class="f-20 text-danger service_task_remove "> <i class="ti ti-trash"></i></a>
            </div>
        </div>
        <div class="service_task_results"></div>
    </div>
</div>
<div class="modal-footer">
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-secondary ml-10'))); ?>

</div>
<?php echo e(Form::close()); ?>

<script>
    $('.type').on('click', function () {
        var type = $(this).val();
        if (type == 'service') {
            $('.service_tasks').removeClass('d-none');
        } else {
            $('.service_tasks').addClass('d-none');
        }
    });

    $('.wrapper').on('click', '.service_task_remove', function () {
        $('.service_task_remove').closest('.wrapper').find('.service_task').not(':first').last().remove();
    });
    $('.wrapper').on('click', '.service_task_clone', function () {
        $('.service_task_clone').closest('.wrapper').find('.service_task').first().clone().appendTo('.service_task_results');
    });
</script>
<?php /**PATH /home/carecifn/public_html/preprod/resources/views/service_part/create.blade.php ENDPATH**/ ?>