<div class="sidebar-inner sidebar-push">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php echo e(request()->is('homes.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('homes.index')); ?>"><i class="zmdi zmdi-view-dashboard"></i><?php echo e(trans('Trang giao diện')); ?></a></li>
        <li class="sidebar-header"><?php echo e(trans('Management')); ?></li>
        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'groups.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i><?php echo e(trans('Nhóm người dùng')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'groups.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'groups.index') === false)? route('groups.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
           </ul>
        </li>
        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'users.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-account zmdi-hc-fw"></i><?php echo e(trans('Admin')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'users.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'users.index') === false)? route('users.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'users.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'users.create') === false)? route('users.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>
        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'types.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-file zmdi-hc-fw"></i><?php echo e(trans('Loại bài viết')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'types.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'types.index') === false)? route('types.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'types.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'types.create') === false)? route('types.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'categories.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-group zmdi-hc-fw"></i><?php echo e(trans('Danh mục')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'categories.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'categories.index') === false)? route('categories.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'categories.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'categories.create') === false)? route('categories.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'topics.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-tag-more zmdi-hc-fw"></i><?php echo e(trans('Danh mục con')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'topics.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'topics.index') === false)? route('topics.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'topics.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'topics.create') === false)? route('topics.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'news.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i><?php echo e(trans('Bài viết')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'news.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'news.index') === false)? route('news.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'news.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'news.create') === false)? route('news.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'tags.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-tag-more zmdi-hc-fw"></i><?php echo e(trans('Tags')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'tags.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'tags.index') === false)? route('tags.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'tags.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'tags.create') === false)? route('tags.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>

        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'comments.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-comment-text zmdi-hc-fw"></i><?php echo e(trans('Bình luận')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'comments.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'comments.index') === false)? route('comments.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
            </ul>
        </li>
        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'statistic.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-money zmdi-hc-fw"></i><?php echo e(trans('Thống kê nhuận bút')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'statistic.listtopic')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'statistic.listtopic') === false)? route('statistic.listtopic') : 'javascript:void();'); ?>"><?php echo e(trans('Thống kê theo danh mục con')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'statistic.listuser')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'statistic.listuser') === false)? route('statistic.listuser') : 'javascript:void();'); ?>"><?php echo e(trans('Thống kê theo tác giả')); ?></a></li>
            </ul>
        </li>

















        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'options.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-settings zmdi-hc-fw"></i><?php echo e(trans('Thành phần')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'options.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'options.index') === false)? route('options.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'options.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'options.create') === false)? route('options.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>
        <li class="nav-dropdown<?php echo e((strrpos(\Request::route()->getName(), 'banners.')!== false)? ' active open' : ''); ?>">
            <a href="#"><i class="zmdi zmdi-brightness-auto zmdi-hc-fw"></i><?php echo e(trans('Ảnh quảng cáo')); ?></a>
            <ul class="nav-sub">
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'banners.index')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'banners.index') === false)? route('banners.index') : 'javascript:void();'); ?>"><?php echo e(trans('Danh sách')); ?></a></li>
                <li class="<?php echo e((strrpos(\Request::route()->getName(), 'banners.create')!== false)? ' active' : ''); ?>"><a href="<?php echo e((strrpos(\Request::route()->getName(), 'banners.create') === false)? route('banners.create') : 'javascript:void();'); ?>"><?php echo e(trans('Tạo mới')); ?></a></li>
            </ul>
        </li>
    </ul>
</div>