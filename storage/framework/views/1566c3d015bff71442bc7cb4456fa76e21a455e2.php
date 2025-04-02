<?php echo e(Form::open(['url' => 'invoice', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('invoice_id', __('Invoice Number'), ['class' => 'form-label'])); ?>

            <span class="text-danger">*</span>
            <div class="input-group">
                <span class="input-group-text ">
                    <?php echo e(invoicePrefix()); ?>

                </span>
                <?php echo e(Form::text('invoice_id', $invoiceNumber, ['class' => 'form-control', 'placeholder' => __('Enter Invoice Number')])); ?>

            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('invoice_date', __('Invoice Date'), ['class' => 'form-label'])); ?> <span
                class="text-danger">*</span>
            <?php echo e(Form::date('invoice_date', null, ['class' => 'form-control', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('client', __('Client'), ['class' => 'form-label'])); ?> <span class="text-danger">*</span>
            <?php echo Form::select('client', $clients, null, ['class' => 'form-control hidesearch', 'required' => 'required']); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('workorder', __('Work Order'), ['class' => 'form-label'])); ?> <span
                class="text-danger">*</span>
            <div class="workorder_div">
                <select class="form-control workorder" id="workorder" name="workorder">
                    <option value=""><?php echo e(__('Select Workorder')); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('total', __('Total Amount'), ['class' => 'form-label'])); ?> <span
                class="text-danger">*</span>
            <?php echo e(Form::number('total', null, ['class' => 'form-control', 'placeholder' => __('Enter total amount'), 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('discount', __('Discount'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('discount', null, ['class' => 'form-control', 'placeholder' => __('Enter discount')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('due_date', __('Due Date'), ['class' => 'form-label'])); ?> <span
                class="text-danger">*</span>
            <?php echo e(Form::date('due_date', null, ['class' => 'form-control', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?> <span class="text-danger">*</span>
            <?php echo Form::select('status', $status, null, ['class' => 'form-control hidesearch', 'required' => 'required']); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <?php echo e(Form::submit(__('Create'), ['class' => 'btn btn-secondary ml-10'])); ?>

</div>
<?php echo e(Form::close()); ?>

<script>
    // Document ready function
    $(document).ready(function() {
        // Initialize select2
        $(".hidesearch").each(function() {
            var basic_select = new Choices(this, {
                searchEnabled: false,
                removeItemButton: true,
            });
        });

        // Event handler for client change
        $(document).on('change','#client', function() {
            var client = $(this).val();
            var url = '<?php echo e(route('client.workorder')); ?>';
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    client: client,
                },
                type: 'GET',
                success: function(data) {
                    console.log(data);

                    $('.workorder').empty().append(
                        '<option value=""><?php echo e(__('Select Workorder')); ?></option>');
                    $.each(data, function(key, value) {
                        $('.workorder').append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                },
            });
        });

        // Event delegation for workorder change
        $(document).on('change', '.workorder', function() {
            var workorder = $(this).val();
            var url = '<?php echo e(route('workorder.details')); ?>';
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    workorder: workorder,
                },
                type: 'GET',
                success: function(data) {
                    $('#total').val(data);
                },
            });
        });
    });
</script>
<?php /**PATH /home/carecifn/public_html/preprod/resources/views/invoice/create.blade.php ENDPATH**/ ?>