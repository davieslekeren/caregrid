<div class="modal-body wrapper">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="detail-group">
                <b><?php echo e(__('Request Detail')); ?></b>
                <p class="mb-20"><?php echo e($wORequest->request_detail); ?> </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Client')); ?></b>
                <p class="mb-20"><?php echo e(!empty($wORequest->clients)?$wORequest->clients->name:'-'); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Asset')); ?></b>
                <p class="mb-20"><?php echo e(!empty($wORequest->assets)?$wORequest->assets->name:'-'); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Due Date')); ?></b>
                <p class="mb-20"><?php echo e(dateFormat($wORequest->due_date)); ?>  </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Priority')); ?></b>
                <p class="mb-20">
                    <?php if($wORequest->priority=='low'): ?>
                        <span
                            class="badge text-bg-primary"><?php echo e(\App\Models\WORequest::$priority[$wORequest->priority]); ?></span>
                    <?php elseif($wORequest->priority=='medium'): ?>
                        <span
                            class="badge text-bg-info"><?php echo e(\App\Models\WORequest::$priority[$wORequest->priority]); ?></span>
                    <?php elseif($wORequest->priority=='high'): ?>
                        <span
                            class="badge text-bg-warning"><?php echo e(\App\Models\WORequest::$priority[$wORequest->priority]); ?></span>
                    <?php elseif($wORequest->priority=='critical'): ?>
                        <span
                            class="badge text-bg-danger"><?php echo e(\App\Models\WORequest::$priority[$wORequest->priority]); ?></span>
                    <?php endif; ?>
                </p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Status')); ?></b>
                <p class="mb-20">
                    <?php if($wORequest->status=='pending'): ?>
                        <span
                            class="badge text-bg-warning"><?php echo e(\App\Models\WORequest::$status[$wORequest->status]); ?></span>
                    <?php elseif($wORequest->status=='in_progress'): ?>
                        <span
                            class="badge text-bg-primary"><?php echo e(\App\Models\WORequest::$status[$wORequest->status]); ?></span>
                    <?php elseif($wORequest->status=='completed'): ?>
                        <span
                            class="badge text-bg-success"><?php echo e(\App\Models\WORequest::$status[$wORequest->status]); ?></span>
                    <?php elseif($wORequest->status=='cancel'): ?>
                        <span
                            class="badge text-bg-danger"><?php echo e(\App\Models\WORequest::$status[$wORequest->status]); ?></span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Assign')); ?></b>
                <p class="mb-20"> <?php echo e(!empty($wORequest->assigned)?$wORequest->assigned->name:'-'); ?></p>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="detail-group">
                <b><?php echo e(__('Notes')); ?></b>
                <p class="mb-20"><?php echo e(!empty($wORequest->notes)?$wORequest->notes:"-"); ?></p>
            </div>
        </div>
        <hr>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Preferred Date')); ?></b>
                <p class="mb-20"> <?php echo e(dateFormat($wORequest->preferred_date)); ?></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="detail-group">
                <b><?php echo e(__('Preferred Time')); ?></b>
                <p class="mb-20"> <?php echo e($wORequest->preferred_time); ?></p>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="detail-group">
                <b><?php echo e(__('Preference Note')); ?></b>
                <p class="mb-20"><?php echo e(!empty($wORequest->preferred_note)?$wORequest->preferred_note:"-"); ?></p>
            </div>
        </div>
    </div>

</div>

<?php /**PATH /home/carecifn/public_html/preprod/resources/views/wo_request/show.blade.php ENDPATH**/ ?>