<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item" aria-current="page"><?php echo e(__('Dashboard')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>

<script>
    var options = {
        chart: {
            type: 'area',
            height: 450,
            toolbar: {
                show: false
            }
        },
        colors: ['#2ca58d'],
        dataLabels: {
            enabled: false
        },
        legend: {
            show: true,
            position: 'top'
        },
        markers: {
            size: 1,
            colors: ['#fff'],
            strokeColors: ['#2ca58d'],
            strokeWidth: 1,
            shape: 'circle',
            hover: {
                size: 4
            }
        },
        stroke: {
            width: 2,
            curve: 'smooth'
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                type: 'vertical',
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0
            }
        },
        grid: {
            show: false
        },
        series: [{
            name: "<?php echo e(__('Income')); ?>",
            data: <?php echo json_encode(@$result['incomeByMonth']['income']); ?>

        }],
        xaxis: {
            categories: <?php echo json_encode(@$result['incomeByMonth']['label']); ?>,
            tooltip: {
                enabled: false
            },
            labels: {
                hideOverlappingLabels: true
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector('#incomeExpenseByMonth'), options);
    chart.render();
</script>




<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-secondary">
                                <i class="ti ti-users f-24"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Total Client')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"><?php echo e($result['totalClient']); ?></h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-warning">
                                <i class="ti ti-package f-24"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Total WO Request')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"><?php echo e($result['totalWORequest']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-primary">
                                <i class="ti ti-history f-24"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Total Workorder')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"><?php echo e($result['totalWorkorder']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-danger">
                                <i class="ti ti-credit-card f-24"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Total Invoice')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"><?php echo e($result['totalInvoice']); ?>

                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <h5 class="mb-1"><?php echo e(__('Analysis Report')); ?></h5>
                            <p class="text-muted mb-2"><?php echo e(__('Income Overview')); ?></p>
                        </div>

                    </div>
                    <div id="incomeExpenseByMonth"></div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/carecifn/public_html/preprod/resources/views/dashboard/index.blade.php ENDPATH**/ ?>