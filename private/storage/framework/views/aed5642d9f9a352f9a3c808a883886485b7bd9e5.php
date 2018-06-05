<?php $__env->startSection('pageTitle', 'Users'); ?>
<?php $__env->startSection('content'); ?>
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>Thông tin thành viên</h1>
                        <?php echo e(Breadcrumbs::render('users-show', $data)); ?>


                    </header>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card card-transparent">
                    <div class="card-body wrapper">
                        <div class="row">
                            <div class="col-md-12 col-lg-3">
                                <div class="card type--profile">
                                    <header class="card-heading">
                                        <?php if($data->avatar): ?>
                                            <img src="<?php echo e(url($data->avatar)); ?>" alt="" class="img-circle">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('assets/img/profiles/user.png')); ?>" alt="" class="img-circle">
                                        <?php endif; ?>
                                        <ul class="card-actions icons right-top">
                                            <li class="dropdown">
                                                <a href="javascript:void(0)" data-toggle="dropdown">
                                                    <i class="zmdi zmdi-more-vert"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right btn-primary">
                                                    <li>
                                                        <a href="<?php echo e(route("users.edit", ['id' => $data->id])); ?>">Edit Profile</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="card-body">
                                        <h3 class="name"><?php echo e($data->name); ?></h3>
                                        <?php if($data->group): ?>
                                            <span class="title"><?php echo e($data->group->name); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-8">
                                <div class="card">
                                    <header class="card-heading p-0">
                                        <div class="tabpanel m-b-30">
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="active" role="presentation" class=""><a href="#profile-about" data-toggle="tab" aria-expanded="false">Thông tin liên hệ<div class="ripple-container"></div></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fadeIn active" id="profile-about">
                                                    <div class="card card-transparent">
                                                        <div class="card-body p-t-0">
                                                            <div class="p-l-30">
                                                                <dl class="dl-horizontal">
                                                                    <dt>Địa chỉ</dt>
                                                                    <dd><?php echo e($data->address); ?></dd>
                                                                </dl>
                                                                <dl class="dl-horizontal">
                                                                    <dt>Số điện thoại</dt>
                                                                    <dd><?php echo e($data->phone_number); ?></dd>
                                                                </dl>
                                                                <dl class="dl-horizontal">
                                                                    <dt>Email</dt>
                                                                    <dd><?php echo e($data->email); ?></dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>