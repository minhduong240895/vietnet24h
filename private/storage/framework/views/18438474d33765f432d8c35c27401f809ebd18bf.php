<?php $__env->startSection('pageTitle', 'Chỉnh sửa bình luận'); ?>
<?php $__env->startSection('content'); ?>
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1><?php echo e(trans('Chỉnh sửa bình luận')); ?></h1>
                        <?php echo e(Breadcrumbs::render('comments-edit', $data)); ?>

                    </header>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <header class="card-heading ">
                            <h2 class="card-title"><?php echo e(trans('Bình luận')); ?></h2>
                        </header>
                        <div class="card-body">
                            <?php echo Form::open(['route' => ['comments.update', 'id' => $data->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal']); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('email', 'Email', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('email', $data->email,
                                            [   'placeholder' => trans('Ex: contact@company.com'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '10',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'email-error'
                                            ])); ?>

                                    <?php if($errors->has('email')): ?>
                                        <span id="email-error" class="help-block" style="display: inline;"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('', trans(''), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <img src="<?php echo e(url($data->avatar)); ?>" width="400" height="200" />
                                </div>
                            </div>
                            <div class="form-group is-fileinput<?php echo e($errors->has('avatar') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('avatar', trans('Avatar'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <?php echo e(Form::file('avatar',
                                            [
                                                'data-buttontext' => trans('Choose file'),
                                                'data-buttonname' => 'btn-outline btn-primary',
                                                'data-iconname' => 'ion-image mr-5',
                                                'data-rule-required' => 'true',
                                                'data-rule-accept' => 'image/*',
                                                'aria-required' => 'true',
                                                'class' => 'filestyle',
                                                'aria-describedby' => 'avatar-error'
                                            ])); ?>

                                        <div class="input-group">
                                            <?php echo e(Form::text('avatar', '',
                                                [
                                                    'placeholder' => trans('Choose file...'),
                                                    'readonly' => '',
                                                    'class' => 'form-control'
                                                ])); ?>

                                            <span class="input-group-btn input-group-sm">
                                                    <?php echo e(Form::button('<i class="zmdi zmdi-attachment-alt"></i>', ['type' => 'button', 'class' => 'btn btn-primary btn-fab btn-fab-sm'])); ?>

                                                </span>
                                        </div>
                                        <?php if($errors->has('avatar')): ?>
                                            <span id="avatar-error" class="help-block" style="display: inline;"><?php echo e($errors->first('avatar')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('name', trans('Name'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('name', $data->name,
                                            [   'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'name-error'
                                            ])); ?>

                                    <?php if($errors->has('name')): ?>
                                        <span id="name-error" class="help-block" style="display: inline;"><?php echo e($errors->first('name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('phone_number', trans('Phone Number'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('phone_number', $data->phone_number,
                                            [   'placeholder' => trans('Ex: 0983251253'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '10',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'phone_number-error'
                                            ])); ?>

                                    <?php if($errors->has('phone_number')): ?>
                                        <span id="phone_number-error" class="help-block" style="display: inline;"><?php echo e($errors->first('phone_number')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('change_password', 'Change Password', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <input type="checkbox" name="change_password" id="change_password"  >
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('password', 'Password', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="password" placeholder="<?php echo e(trans('Nhập mật khẩu')); ?>" disabled>
                                    <?php if($errors->has('email')): ?>
                                        <span id="password-error" class="help-block" style="display: inline;"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <input class="form-control" name="password_confirmation" type="password" placeholder="<?php echo e(trans('Nhập lại mật khẩu')); ?>" disabled>
                                    <?php if($errors->has('email')): ?>
                                        <span id="password_confirmation-error" class="help-block" style="display: inline;"><?php echo e($errors->first('password_confirmation')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <?php echo e(Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])); ?>

                                    <?php echo e(link_to_route('comments.index', 'Cancel', null, array('class' => 'btn btn-default'))); ?>

                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>