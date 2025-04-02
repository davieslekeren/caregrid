<div class="modal-body wrapper">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Name')); ?></b>
                <p class="mb-20"><?php echo e($asset->name); ?> </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Asset Number')); ?></b>
                <p class="mb-20"><?php echo e($asset->asset_number); ?> </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Part')); ?></b>
                <p class="mb-20"><?php echo e(!empty($asset->parts)?$asset->parts->title:'-'); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Parent Asset')); ?></b>
                <p class="mb-20"><?php echo e(!empty($asset->parents)?$asset->parents->name:'-'); ?> </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('GIAI')); ?></b>
                <p class="mb-20"><?php echo e($asset->giai); ?> </p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Order Date')); ?></b>
                <p class="mb-20"> <?php echo e(dateFormat($asset->order_date)); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Purchase Date')); ?></b>
                <p class="mb-20"> <?php echo e(dateFormat($asset->purchase_date)); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Installation Date')); ?></b>
                <p class="mb-20"> <?php echo e(dateFormat($asset->installation_date)); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Warranty Expiration')); ?></b>
                <p class="mb-20"> <?php echo e(!empty($asset->warranty_expiration)?dateFormat($asset->warranty_expiration) :'-'); ?></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Warranty Notes')); ?></b>
                <p class="mb-20"><?php echo e(!empty($asset->warranty_notes)?$asset->warranty_notes:"-"); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-12">
            <div class="detail-group">
                <b><?php echo e(__('Description')); ?></b>
                <p class="mb-20"><?php echo e(!empty($asset->description)?$asset->description:"-"); ?></p>
            </div>
        </div>
    </div>

</div>

<?php /**PATH /home/carecifn/public_html/preprod/resources/views/asset/show.blade.php ENDPATH**/ ?>