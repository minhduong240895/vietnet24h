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


                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('name', trans('Tên thành viên'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('name', $data->name,
                                            [   'placeholder' => trans('Tên thành viên'),
                                                'data-rule-required' => 'true',
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

                            <?php if($data->avatar): ?>
                                <div class="form-group">
                                    <?php echo e(Form::label('', trans(''), ['class' => 'col-sm-2 control-label'])); ?>

                                    <div class="col-sm-10">
                                        <img src="<?php echo e(url($data->avatar)); ?>" width="200" height="200" />
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group is-fileinput<?php echo e($errors->has('avatar') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('avatar', trans('Ảnh đại diện'), ['class' => 'col-sm-2 control-label'])); ?>

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

                                        <div class="input-group<?php echo e($errors->has('') ? ' has-error' : ''); ?>">
                                            <?php echo e(Form::text('avatar', '',
                                                [
                                                    'placeholder' => trans('Tải ảnh lên...'),
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
                            <div class="form-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('phone_number', 'Số điện thoại', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('phone_number', $data->phone_number,
                                            [   'placeholder' => trans('Số điện thoại'),
                                                'data-rule-required' => 'true',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'phone_number-error'
                                            ])); ?>

                                    <?php if($errors->has('phone_number')): ?>
                                        <span id="phone_number-error" class="help-block" style="display: inline;"><?php echo e($errors->first('phone_number')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('address', 'Địa chỉ', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('address', $data->address,
                                            [   'placeholder' => trans('Ex: Số nhà 34, Ngõ 5, Quận 6, TPHCM'),
                                                'data-rule-required' => 'true',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'address-error'
                                            ])); ?>

                                    <?php if($errors->has('address')): ?>
                                        <span id="address-error" class="help-block" style="display: inline;"><?php echo e($errors->first('address')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if(Auth::user()->group_id == 1): ?>
                                <div class="form-group<?php echo e($errors->has('group_id') ? ' has-error' : ''); ?>">
                                    <?php echo e(Form::label('group_id', 'Nhóm thành viên', ['class' => 'col-sm-2 control-label'])); ?>

                                    <div class="col-sm-10">
                                        <select id="group_id" name="group_id" data-rule-required="true" class="form-control select" aria-required="true" placeholder="Chọn nhóm thành viên">
                                            <?php $__currentLoopData = $listGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($gr->id == $data->group_id): ?>
                                                    <option value="<?php echo e($gr->id); ?>" selected><?php echo e($gr->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($gr->id); ?>"><?php echo e($gr->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('group_id')): ?>
                                            <span id="group_id-error" class="help-block" style="display: inline;"><?php echo e($errors->first('group_id')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <?php echo e(Form::label('change_password', 'Thay đổi mật khẩu', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <input type="checkbox" name="change_password" id="change_password"  >
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('password', 'Mật khẩu mới', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="password" placeholder="<?php echo e(trans('Nhập mật khẩu')); ?>" disabled>
                                    <?php if($errors->has('password')): ?>
                                        <span id="password-error" class="help-block" style="display: inline;"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('password_confirmation', 'Nhập lại mật khẩu mới', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <input class="form-control" name="password_confirmation" type="password" placeholder="<?php echo e(trans('Nhập lại mật khẩu')); ?>" disabled>
                                    <?php if($errors->has('password_confirmation')): ?>
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