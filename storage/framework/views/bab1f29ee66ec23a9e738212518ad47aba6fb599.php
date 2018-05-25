<?php $__env->startSection('pageTitle', 'Edit Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1><?php echo e(trans('Edit information')); ?></h1>
                        <?php echo e(Breadcrumbs::render('users-edit', $data)); ?>

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
                            <h2 class="card-title"><?php echo e(trans('Information')); ?></h2>
                        </header>
                        <div class="card-body">
                            <?php echo Form::open(['route' => ['users.update', 'id' => $data->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal']); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('email', 'Email', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('email', $data->email,
                                            [   'placeholder' => trans('Ex: contact@company.com'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '10',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'email-error',
                                                'disabled'
                                            ])); ?>

                                    <?php if($errors->has('email')): ?>
                                        <span id="email-error" class="help-block" style="display: inline;"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
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
                            <div class="form-group<?php echo e($errors->has('permission') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('permission', 'Permission', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('name', $data->permission,
                                            [
                                                'class' => 'form-control',
                                                'disabled'
                                            ])); ?>

                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('permission') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('permission', 'Change Permission', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <select class="js-example-basic-multiple form-control" name="permission[]"  multiple="multiple">
                                        <?php $__currentLoopData = $listPermission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(strtolower($per)); ?>"><?php echo e($per); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('permission')): ?>
                                        <span id="permission-error" class="help-block" style="display: inline;"><?php echo e($errors->first('permission')); ?></span>
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

                                    <?php echo e(link_to_route('users.index', 'Cancel', null, array('class' => 'btn btn-default'))); ?>

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
    <script>
        $('#change_password').change(function () {
            if($('input[name="change_password"]').is(':checked'))
            {
                $('input[name="password"]').removeAttr('disabled')
                $('input[name="password_confirmation"]').removeAttr('disabled')
            }else
            {
                $('input[name="password"]').attr('disabled','disabled')
                $('input[name="password_confirmation"]').attr('disabled','disabled')
            }
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>