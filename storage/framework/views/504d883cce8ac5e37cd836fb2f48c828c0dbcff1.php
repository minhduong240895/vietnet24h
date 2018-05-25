<?php $__env->startSection('pageTitle', 'add Notification'); ?>
<?php $__env->startSection('content'); ?>
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1><?php echo e(trans('Create Notification')); ?></h1>
                        <?php echo e(Breadcrumbs::render('notifications-create')); ?>

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
                            <h2 class="card-title"><?php echo e(trans('Notification infomation')); ?></h2>
                        </header>
                        <div class="card-body">
                            <?php echo Form::open(['route' => ['notifications.store'], 'files' => true, 'method' => 'POST', 'class' => 'form-horizontal']); ?>

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('title', trans('Title'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <?php echo e(Form::text('title', '',
                                            [   'placeholder' => trans('Title of notification'),
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'title-error'
                                            ])); ?>

                                    <?php if($errors->has('title')): ?>
                                        <span id="title-error" class="help-block" style="display: inline;"><?php echo e($errors->first('title')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('short_description') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('short_description', trans('Short description'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="short_description"></textarea>
                                    <span class="help-block">Describe the content, which will be sent to the member.</span>
                                    <?php if($errors->has('short_description')): ?>
                                        <span id="short_description-error" class="help-block" style="display: inline;"><?php echo e($errors->first('short_description')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('description', trans('Description'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description"></textarea>
                                    <span class="help-block">Full description.</span>
                                    <?php if($errors->has('description')): ?>
                                        <span id="description-error" class="help-block" style="display: inline;"><?php echo e($errors->first('description')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('sendNow', trans('Send Now'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="sendNow" id="sendNow">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('time') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('time', 'Time', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10 input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-time"></i></span>
                                    <input type="text" class="form-control datepicker" name="time" id="md_input_time" type="text" placeholder="Time">
                                    <?php if($errors->has('time')): ?>
                                        <span id="time-error" class="help-block" style="display: inline;"><?php echo e($errors->first('time_start')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('date') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('date', 'Date', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10 input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="date" id="datepicker-theme" type="date" placeholder="Date">
                                    <?php if($errors->has('date')): ?>
                                        <span id="date-error" class="help-block" style="display: inline;"><?php echo e($errors->first('date')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('type', 'Type', ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <select class="select form-control" name="type" tabindex="-1" aria-hidden="true">
                                        <option value="0">Public</option>
                                        <option value="1">Private</option>
                                    </select>
                                    <?php if($errors->has('type')): ?>
                                        <span id="type-error" class="help-block" style="display: inline;"><?php echo e($errors->first('type')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group is-fileinput<?php echo e($errors->has('members') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('members', trans('Members'), ['class' => 'col-sm-2 control-label'])); ?>

                                <div class="col-sm-10">
                                    <select class="js-example-basic-multiple form-control" name="members[]" disabled id="members" multiple="multiple">
                                        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($mem->id); ?>"><?php echo e($mem->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <?php echo e(Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])); ?>

                                    <?php echo e(link_to_route('notifications.index', 'Cancel', null, array('class' => 'btn btn-default'))); ?>

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
        $('document').ready(function(){
            $('#sendNow').change(function(){
                if($('#sendNow').is(':checked')){
                    $( "input[name='time']").attr('disabled', 'disabled')
                    $( "input[name='date']").attr('disabled', 'disabled')
                }else{
                    $( "input[name='time']").removeAttr('disabled')
                    $( "input[name='date']").removeAttr('disabled')
                }
            })
            $( "select[name='type']").change(function(){
                var val = $( "select[name='type']").val()
                if(val == 0){
                    $("#members").attr('disabled', 'disabled')
                }else{
                    $("#members").removeAttr('disabled')
                }
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>