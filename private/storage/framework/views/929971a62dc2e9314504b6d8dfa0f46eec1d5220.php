<div class="sidebar-inner sidebar-push">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php echo e(request()->is('/') ? 'active' : ''); ?>"><a href="<?php echo e(route('homes.index')); ?>"><i class="zmdi zmdi-view-dashboard"></i><?php echo e(trans('Dashboard')); ?></a></li>
        <li class="sidebar-header"><?php echo e(trans('Management')); ?></li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'users.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-account zmdi-hc-fw"></i><?php echo e(trans('Admin')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'users.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'users.index') === false)? route('users.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'users.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'users.create') === false)? route('users.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'members.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i><?php echo e(trans('Member')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'members.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'members.index') === false)? route('members.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'members.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'members.create') === false)? route('members.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'events.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-card-giftcard zmdi-hc-fw"></i><?php echo e(trans('News')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'news.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'news.index') === false)? route('news.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'news.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'news.create') === false)? route('news.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new')); ?></a></li>
            </ul>
        </li>


        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'notifications.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-notifications zmdi-hc-fw"></i><?php echo e(trans('Notification')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'notifications.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'notifications.index') === false)? route('notifications.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'notifications.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'notifications.create') === false)? route('notifications.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new')); ?></a></li>
            </ul>
        </li>
    </ul>
</div>