<div class="main-menu navbar-left" id="nav-left">
    <button id="closeNav"><i class="fa fa-close"></i></button>

    <div class="affix-sidebar">
        <div class="sidebar-nav">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-collapse">
                    <ul class="nav navbar-nav" id="sidenav01">
                        @if(isset($data['categories']))
                            <li><a href="{{url('/')}}">Trang chủ</a></li>
                            @foreach($data['categories'] as $category)
                                <li>
                                    <a href="#" class="collapsed">
                                        {{$category->name}}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <img src="./assets/home/images/logo.png" >
</div>