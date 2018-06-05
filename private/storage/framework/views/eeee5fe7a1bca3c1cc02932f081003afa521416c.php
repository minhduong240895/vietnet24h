<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title><?php echo $__env->yieldContent('pageTitle'); ?> - Quản trị Admin</title>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/vendor.bundle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/app.bundle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/theme-b.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/customs.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/select2.min.css')); ?>">
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
<div id="app_wrapper">
    <header id="app_topnavbar-wrapper">
        <nav role="navigation" class="navbar topnavbar">
            <div class="nav-wrapper">
                <ul class="nav navbar-nav pull-left left-menu">
                    <li class="app_menu-open">
                        <a href="javascript:void(0)" data-toggle-state="app_sidebar-left-open" data-key="leftSideBar">
                            <i class="zmdi zmdi-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown avatar-menu">
                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
								<span class="meta">
									<span class="avatar">
                                        <?php if(Auth::user()->avatar): ?>
                                            <img src="<?php echo e(url(Auth::user()->avatar)); ?>" alt="" class="img-circle max-w-35">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('assets/img/profiles/user.png')); ?>" alt="" class="img-circle max-w-35">
                                        <?php endif; ?>
										<i class="badge mini success status"></i>
									</span>
									<span class="name"><?php echo e(Auth::user()->name); ?></span>
									<span class="caret"></span>
								</span>
                        </a>
                        <ul class="dropdown-menu btn-primary dropdown-menu-right">
                            <li>
                                <a href="<?php echo e(route("users.show", ['id' => Auth::user()->id])); ?>"><i class="zmdi zmdi-account"></i> Tài khoản</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route("users.edit", ['id' => Auth::user()->id])); ?>"><i class="zmdi zmdi-edit"></i> Chỉnh sửa thông tin</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route("users.logout")); ?>"><i class="zmdi zmdi-sign-in"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <form role="search" action="" class="navbar-form" id="navbar_form">
                <div class="form-group">
                    <input type="text" placeholder="Search and press enter..." class="form-control" id="navbar_search" autocomplete="off">
                    <i data-navsearch-close class="zmdi zmdi-close close-search"></i>
                </div>
                <button type="submit" class="hidden btn btn-default">Submit</button>
            </form>
        </nav>
    </header>
    <aside id="app_sidebar-left">
        <div id="logo_wrapper">
            <ul>
                <li class="logo-icon">
                    <a href="<?php echo e('/'); ?>">
                        <div class="logo">
                            <img src="<?php echo e(URL::asset('assets/img/logo/logo-icon@2x.png')); ?>" alt="Logo">
                        </div>
                    </a>
                </li>
                <li class="menu-icon">
                    <a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar">
                        <i class="mdi mdi-backburger"></i>
                    </a>
                </li>
            </ul>
        </div>
        <nav id="app_main-menu-wrapper" class="scrollbar">
            <!-- sidebar menu -->
            <?php echo $__env->make('partials.left-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /sidebar menu -->
        </nav>
    </aside>
    <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
            <?php echo $__env->yieldContent('content'); ?>
            <!-- ENDS $content -->
        </div>
        <footer id="footer_wrapper">
            <div class="footer-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <h6>Want to Work with Us?</h6>
                        <p>Paleo flexitarian bushwick letterpress, ea migas yr adipisicing. Man bun tacos tumblr kombucha, yuccie banjo affogato dolore gentrify retro chartreuse. Anim austin tempor ethical, sapiente food truck fanny pack farm-to-table. Culpa keytar esse
                            tilde hoodie, art party nostrud messenger bag authentic helvetica kinfolk cred eu affogato forage.</p>
                    </div>
                </div>
                <div class="row copy-wrapper">
                    <div class="col-xs-12 col-sm-12">
                        <p class="copy">&copy; Copyright <time class="year"></time> Dormi - Hostel</p>
                    </div>
                </div>
            </div>
        </footer>
    </section>

<script src="<?php echo e(URL::asset('assets/js/vendor.bundle.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/app.bundle.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/select2.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
