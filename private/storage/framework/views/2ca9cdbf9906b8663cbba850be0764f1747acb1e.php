<div class="main-menu navbar-left" id="nav-left">
    <button id="closeNav"><i class="fa fa-close"></i></button>

    <div class="affix-sidebar">
        <div class="sidebar-nav">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-collapse">
                    <ul class="nav navbar-nav" id="sidenav01">
                        <?php if(isset($data['categories'])): ?>
                            <li><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                            <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="#" class="collapsed">
                                        <?php echo e($category->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <img src="./assets/home/images/logo.png" >
</div>