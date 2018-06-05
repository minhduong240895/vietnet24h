<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>@yield('pageTitle') - Trang tin tức, thời sự số một Việt Nam</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/home/Font-Awesomecss/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/home/css/jquery.bxslider.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/home/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/home/css/style.css') }}">
    @stack('css')
    <style>
        body{
            background-color: #eef5f9 !important;
            background-image: none !important;
            color: #607188;
        }
    </style>
    <script src="{{ URL::asset('plugin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('plugin/ckfinder/ckfinder.js') }}"></script>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=135927353692147';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- header -->

<div id="header" class="header">
    <nav class="nav-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="left-menu">
                                <span role="button" class="hidden-md hidden-sm hidden-lg" id="button-menu"><i class="fa fa-bars menu-icon" aria-hidden="true">

                                </i></span>
                        <span class="hidden-xs">{!! $data['hotline'] !!}</span>
                    </div>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div id="social-icon">
                        <a href="{!! $data['linkFace'] !!}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="{!! $data['linkYoutube'] !!}"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                        <a href="{!! $data['linkGoogle'] !!}"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="nav-middle">
        <div class="container">
            <div class="col-sm-4" id="logo">
                <a href="{{url('/')}}"><img src="{{url('/assets/home/images/logo.png')}}"></a>
            </div>
            <div class="col-sm-8 " id="search">
                <input type="text" name="" placeholder="Tìm kiếm">
                <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </nav>
    <nav class="nav-bottom hidden-xs">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" style="background: #ffd800"></span>
                <span class="icon-bar" style="background: #ffd800"></span>
                <span class="icon-bar" style="background: #ffd800"></span>
            </button>
        </div>
        <div class="container">
            <!-- main menu -->
            @include('partials.home-main-menu')
            <!-- /main menu -->
        </div>
    </nav>
</div>
<div class="clear"></div>

<!-- Menu left -->
@include('partials.home-left-menu')
<!-- end header -->
<!-- Content -->
@yield('content')
<!-- END Content-->
<!-- Footer-->
<footer id="footer">
    <div class="container footer">
        <div class="row">
            <div class="col-sm-3">
                <a href="{{url('/')}}"><img src="{{url('/assets/home/images/logo.png')}}"></a>
            </div>

            <div class="col-sm-6">
                <h2>VIETNET24H - Thông tin liên hệ</h2>
                <div class="is-divider"></div>
                <b>Địa chỉ: {!! $data['footerAddress'] !!}</b><br>
                <b>Hotline: {!! $data['footerHotline'] !!}</b> <br>
                <b>Email: {!! $data['footerEmail'] !!}</b> <br>
                <b>Liên hệ Quảng cáo: {!! $data['footerADS'] !!}</b>
            </div>

            <div class="col-sm-3 social">
                <h2>Mạng xã hội</h2>
                <div class="is-divider"></div>
                <a href="{!! $data['linkFace'] !!}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="{!! $data['linkYoutube'] !!}"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                <a href="{!! $data['linkGoogle'] !!}"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                <a href="{!! $data['linkTwitter'] !!}"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            </div>
        </div>
</footer>
<!-- END Footer-->
<script src="{{URL::asset('assets/home/js/jquery.min.js') }}"></script>
<script src="{{URL::asset('assets/home/js/bootstrap.min.js') }}"></script>
<script src="{{URL::asset('assets/home/js/jquery.bxslider.min.js') }}"></script>
<script src="{{URL::asset('assets/home/js/jquery.fancybox.min.js') }}"></script>
<script src="{{URL::asset('assets/home/js/custom.js') }}"></script>

<script>
    jQuery(document).ready(function(){
        $('#button-menu').click(function(){
            $('#nav-left').addClass('show');
        });
        $('#closeNav').click(function(){
            $('#nav-left').removeClass('show');
        });

    });
</script>
@stack('script')
</body>
</html>



