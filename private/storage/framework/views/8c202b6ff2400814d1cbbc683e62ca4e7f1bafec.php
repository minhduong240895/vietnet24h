<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title><?php echo $__env->yieldContent('pageTitle'); ?> - Trang tin tức, thời sự số một Việt Nam</title>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/home/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/home/Font-Awesomecss/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/home/css/jquery.bxslider.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/home/css/jquery.fancybox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/home/css/style.css')); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>
    <style>
        body{
            background-color: #eef5f9 !important;
            background-image: none !important;
            color: #607188;
        }
    </style>
    <script src="<?php echo e(URL::asset('plugin/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('plugin/ckfinder/ckfinder.js')); ?>"></script>

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
                        <span class="hidden-xs"><?php echo $data['hotline']; ?></span>
                    </div>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div id="social-icon">
                        <a href="<?php echo $data['linkFace']; ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="<?php echo $data['linkYoutube']; ?>"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                        <a href="<?php echo $data['linkGoogle']; ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="nav-middle">
        <div class="container">
            <div class="col-sm-4" id="logo">
                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/public/assets/home/images/logo.png')); ?>"></a>
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
            <?php echo $__env->make('partials.home-main-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /main menu -->
        </div>
    </nav>
</div>
<div class="clear"></div>

<!-- Menu left -->
<?php echo $__env->make('partials.home-left-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- end header -->
<!-- Content -->
<?php echo $__env->yieldContent('content'); ?>
<!-- END Content-->
<!-- Footer-->
<footer id="footer">
    <div class="container footer">
        <div class="row">
            <div class="col-sm-3">
                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/public/assets/home/images/logo.png')); ?>"></a>
            </div>

            <div class="col-sm-6">
                <h2>VIETNET24H - Thông tin liên hệ</h2>
                <div class="is-divider"></div>
                <b>Địa chỉ: <?php echo $data['footerAddress']; ?></b><br>
                <b>Hotline: <?php echo $data['footerHotline']; ?></b> <br>
                <b>Email: <?php echo $data['footerEmail']; ?></b> <br>
                <b>Liên hệ Quảng cáo: <?php echo $data['footerADS']; ?></b>
            </div>

            <div class="col-sm-3 social">
                <h2>Mạng xã hội</h2>
                <div class="is-divider"></div>
                <a href="<?php echo $data['linkFace']; ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="<?php echo $data['linkYoutube']; ?>"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                <a href="<?php echo $data['linkGoogle']; ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                <a href="<?php echo $data['linkTwitter']; ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            </div>
        </div>
</footer>
<!-- END Footer-->
<script src="<?php echo e(URL::asset('public/assets/home/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/home/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/home/js/jquery.bxslider.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/home/js/jquery.fancybox.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/home/js/custom.js')); ?>"></script>

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
<?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>



