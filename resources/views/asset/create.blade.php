{{Form::open(array('url'=>'asset','method'=>'post'))}}
<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            {{Form::label('name',__('Asset Name'),array('class'=>'form-label')) }} <span class="text-danger">*</span>
            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Asset Name'),'required'=>'required'))}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('asset_number',__('Asset Number'),array('class'=>'form-label'))}} <span class="text-danger">*</span>
            {{Form::text('asset_number',null,array('class'=>'form-control','placeholder'=>__('Enter Asset Number'),'required'=>'required'))}}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('part', __('Part/Place'),['class'=>'form-label']) }}</span>
            {!! Form::select('part', $parts, null,array('class' => 'form-control hidesearch')) !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('parent_asset', __('Parent Asset'),['class'=>'form-label']) }}
            {!! Form::select('parent_asset', $assets, null,array('class' => 'form-control hidesearch')) !!}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('giai',__('Global Individual Asset Identifier - GIAI'),array('class'=>'form-label')) }}</span>
            {{Form::text('giai',null,array('class'=>'form-control','placeholder'=>__('Enter GIAI')))}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('order_date',__('Order Date'),array('class'=>'form-label')) }} <span class="text-danger">*</span>
            {{Form::date('order_date',null,array('class'=>'form-control','placeholder'=>__('Enter Order Date'),'required'=>'required'))}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('purchase_date',__('Purchase Date'),array('class'=>'form-label')) }} <span class="text-danger">*</span>
            {{Form::date('purchase_date',null,array('class'=>'form-control','required'=>'required'))}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('installation_date',__('Installation Date'),array('class'=>'form-label')) }} <span class="text-danger">*</span>
            {{Form::date('installation_date',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('warranty_expiration',__('Warranty Expiration'),array('class'=>'form-label')) }}
            {{Form::date('warranty_expiration',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('warranty_notes',__('Warranty Notes'),array('class'=>'form-label')) }}
            {{Form::textarea('warranty_notes',null,array('class'=>'form-control','rows'=>1))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('description',__('Description'),array('class'=>'form-label')) }}
            {{Form::textarea('description',null,array('class'=>'form-control','rows'=>2))}}
        </div>
    </div>
</div>
<div class="modal-footer">
    {{Form::submit(__('Create'),array('class'=>'btn btn-secondary ml-10'))}}
</div>
{{Form::close()}}

