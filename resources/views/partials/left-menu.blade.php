<div class="sidebar-inner sidebar-push">
    <ul class="nav nav-pills nav-stacked">
        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('homes.index') }}"><i class="zmdi zmdi-view-dashboard"></i>{{trans('Dashboard')}}</a></li>
        <li class="sidebar-header">{{trans('Management')}}</li>
        <li class="nav-dropdown{{ (strrpos(\Request::route()->getName(), 'groups.')!== false)? ' active open' : '' }}">
            <a href="#"><i class="zmdi zmdi-account zmdi-hc-fw"></i>{{trans('Nhóm người dùng')}}</a>
            <ul class="nav-sub">
                <li class="{{ (strrpos(\Request::route()->getName(), 'groups.index')!== false)? ' active' : '' }}"><a href="{{ (strrpos(\Request::route()->getName(), 'groups.index') === false)? route('groups.index') : 'javascript:void();' }}">{{trans('List')}}</a></li>
           </ul>
        </li>
        <li class="nav-dropdown{{ (strrpos(\Request::route()->getName(), 'users.')!== false)? ' active open' : '' }}">
            <a href="#"><i class="zmdi zmdi-account zmdi-hc-fw"></i>{{trans('Admin')}}</a>
            <ul class="nav-sub">
                <li class="{{ (strrpos(\Request::route()->getName(), 'users.index')!== false)? ' active' : '' }}"><a href="{{ (strrpos(\Request::route()->getName(), 'users.index') === false)? route('users.index') : 'javascript:void();' }}">{{trans('List')}}</a></li>
                <li class="{{ (strrpos(\Request::route()->getName(), 'users.create')!== false)? ' active' : '' }}"><a href="{{ (strrpos(\Request::route()->getName(), 'users.create') === false)? route('users.create') : 'javascript:void();' }}">{{trans('Create new')}}</a></li>
            </ul>
        </li>

        <li class="nav-dropdown{{ (strrpos(\Request::route()->getName(), 'news.')!== false)? ' active open' : '' }}">
            <a href="#"><i class="zmdi zmdi-card-giftcard zmdi-hc-fw"></i>{{trans('News')}}</a>
            <ul class="nav-sub">
                <li class="{{ (strrpos(\Request::route()->getName(), 'news.index')!== false)? ' active' : '' }}"><a href="{{ (strrpos(\Request::route()->getName(), 'news.index') === false)? route('news.index') : 'javascript:void();' }}">{{trans('List')}}</a></li>
                <li class="{{ (strrpos(\Request::route()->getName(), 'news.create')!== false)? ' active' : '' }}"><a href="{{ (strrpos(\Request::route()->getName(), 'news.create') === false)? route('news.create') : 'javascript:void();' }}">{{trans('Create new')}}</a></li>
            </ul>
        </li>
    </ul>
</div>