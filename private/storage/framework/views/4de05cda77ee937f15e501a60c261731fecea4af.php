<?php $__env->startSection('pageTitle', 'Vietnet24h'); ?>
<?php $__env->startSection('content'); ?>
<div id="header_wrapper" class="header-sm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <header id="header">
                    <h1>Dashboards</h1>
                </header>
            </div>
            <div class="clear-both"></div>
        </div>
    </div>
</div>
<?php if(session("status")): ?>
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-danger">
                        <?php echo e(session("status")); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(session("success")): ?>
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success">
                        <?php echo e(session("success")); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>