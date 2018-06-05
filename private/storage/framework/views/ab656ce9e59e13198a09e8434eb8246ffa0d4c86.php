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

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'rooms.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-store zmdi-hc-fw"></i><?php echo e(trans('Room')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'rooms.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'rooms.index') === false)? route('rooms.index') : 'javascript:void();'); ?>"><?php echo e(trans('List room')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'rooms.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'rooms.create') === false)? route('rooms.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new room')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'roomrequests.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'roomrequests.index') === false)? route('roomrequests.index') : 'javascript:void();'); ?>"><?php echo e(trans('List request room')); ?></a></li>

            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'reports.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-comment-alert zmdi-hc-fw"></i><?php echo e(trans('Reports')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'reports.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'reports.index') === false)? route('reports.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'cleans.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-nature zmdi-hc-fw"></i><?php echo e(trans('Clean Request')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'cleans.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'cleans.index') === false)? route('cleans.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
            </ul>
        </li>
        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'services.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-toys zmdi-hc-fw"></i><?php echo e(trans('Services')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'services.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'services.index') === false)? route('services.index') : 'javascript:void();'); ?>"><?php echo e(trans('List services')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'services.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'services.create') === false)? route('services.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new service')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'servicerequests.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'servicerequests.index') === false)? route('servicerequests.index') : 'javascript:void();'); ?>"><?php echo e(trans('List service request')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'bookingvans.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i><?php echo e(trans('Booking Van')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'bookingvans.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'bookingvans.index') === false)? route('bookingvans.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'bookingvans.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'bookingvans.create') === false)? route('bookingvans.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'events.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-card-giftcard zmdi-hc-fw"></i><?php echo e(trans('Event')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'events.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'events.index') === false)? route('events.index') : 'javascript:void();'); ?>"><?php echo e(trans('List')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'events.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'events.create') === false)? route('events.create') : 'javascript:void();'); ?>"><?php echo e(trans('Create new')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'bills.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i><?php echo e(trans('Bill')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'bills.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'bills.index') === false)? route('bills.index') : 'javascript:void();'); ?>"><?php echo e(trans('List member')); ?></a></li>
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