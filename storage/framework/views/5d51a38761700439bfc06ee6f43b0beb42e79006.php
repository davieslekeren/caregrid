<?php echo e(Form::model($user, array('route' => array('client.update', $user->id), 'method' => 'PUT'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('email',__('Email'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter email'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('phone_number',__('Phone Number'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('phone_number',null,array('class'=>'form-control','placeholder'=>__('Enter phone number'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('company',__('Company'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('company',!empty($user->clients)?$user->clients->company:'',array('class'=>'form-control','placeholder'=>__('Enter company')))); ?>

        </div>
    </div>
    <div class=" col-md-12 mb-20">
        <h5> <?php echo e(__('Service Address')); ?></h5>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('service_city',__('City'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('service_city',!empty($user->clients)?$user->clients->service_city:'',array('class'=>'form-control','placeholder'=>__('Enter service city'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('service_state',__('State'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('service_state',!empty($user->clients)?$user->clients->service_state:'',array('class'=>'form-control','placeholder'=>__('Enter service state'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('service_country',__('Country'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('service_country',!empty($user->clients)?$user->clients->service_country:'',array('class'=>'form-control','placeholder'=>__('Enter service country'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('service_zip_code',__('Zip Code'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::text('service_zip_code',!empty($user->clients)?$user->clients->service_zip_code:'',array('class'=>'form-control','placeholder'=>__('Enter service zip code'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('service_address',__('Address'),array('class'=>'form-label'))); ?> <span class="text-danger">*</span>
            <?php echo e(Form::textarea('service_address',!empty($user->clients)?$user->clients->service_address:'',array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter service address'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class=" col-md-12 mb-20">
        <h5> <?php echo e(__('Billing Address')); ?></h5>
    </div>
    <div class="row ">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('billing_city',__('City'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('billing_city',!empty($user->clients)?$user->clients->billing_city:'',array('class'=>'form-control','placeholder'=>__('Enter billing city')))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('billing_state',__('State'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('billing_state',!empty($user->clients)?$user->clients->billing_state:'',array('class'=>'form-control','placeholder'=>__('Enter billing state')))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('billing_country',__('Country'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('billing_country',!empty($user->clients)?$user->clients->billing_country:'',array('class'=>'form-control','placeholder'=>__('Enter billing country')))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('billing_zip_code',__('Zip Code'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('billing_zip_code',!empty($user->clients)?$user->clients->billing_zip_code:'',array('class'=>'form-control','placeholder'=>__('Enter billing zip code')))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('billing_address',__('Address'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::textarea('billing_address',!empty($user->clients)?$user->clients->billing_address:'',array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter billing address')))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-secondary ml-10'))); ?>

</div>
<?php echo e(Form::close()); ?>



<?php /**PATH /home/carecifn/public_html/preprod/resources/views/client/edit.blade.php ENDPATH**/ ?>