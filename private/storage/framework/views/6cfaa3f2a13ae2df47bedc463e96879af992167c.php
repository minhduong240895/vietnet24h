<?php $__env->startSection('pageTitle', 'Vietnet24h'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container">
        <section class="cat_header clearfix">
            <ul class="map-breadcrumb left">
                <li class="start">
                    <h4>
                        <a href="javascript:void(0)"><?php echo e($currentCate->name); ?></a>
                    </h4>
                </li>
            </ul>
        </section>
        <section class="cat_header clearfix">
            <span class="btn_sub_menu active"><i class="ic ic-caret-2-down"></i></span>
            <?php if($first_hot_news): ?>
                <section class="hot_news">
                    <div class="row">
                        <div class="category-content">
                            <div class="col-sm-6">
                                <article>
                                    <div class="thumb_big">
                                        <a class="thumb thumb_5x3" title="<?php echo e($first_hot_news->title); ?>" href="<?php echo e(url('tin-tuc/'.$first_hot_news->slug.'.html')); ?>">
                                            <img src="<?php echo e(url($first_hot_news->image)); ?>" alt="<?php echo e($first_hot_news->title); ?>" width="100%">
                                            <h1 class="title_news"><?php echo e($first_hot_news->title); ?></h1>
                                        </a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6">
                                <div class="list-hot-news row">
                                    <?php if(count($listHotNews) > 0): ?>
                                        <?php $__currentLoopData = $listHotNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotNew): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <article class="col-sm-6">
                                                <div class="thumb_big">
                                                    <a class="thumb thumb_5x3" title="<?php echo e($hotNew->title); ?>" href="<?php echo e(url('tin-tuc/'.$hotNew->slug.'.html')); ?>">
                                                        <img src="<?php echo e(url($hotNew->image)); ?>" alt="<?php echo e($hotNew->title); ?>" width="100%">
                                                        <h1 class="title_news"><?php echo e($hotNew->title); ?></h1>
                                                    </a>
                                                </div>
                                            </article>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ads-middle">
                    <a href="<?php echo e($ads_1->link); ?>"><img src="<?php echo e(url($ads_1->image)); ?>" alt="<?php echo e($ads_1->title); ?>"></a>
                </section>

                <section class="list-news ">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row">
                                <?php if(count($listNews) > 0): ?>
                                    <?php $__currentLoopData = $listNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $New): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="news">
                                            <div class="col-sm-4 img">
                                                <img src="<?php echo e(url($New->image)); ?>">
                                            </div>
                                            <div class="col-sm-8">

                                                <div class="item-info">
                                                    <h3 class="title-news"><a href="#"><?php echo e($hotNew->title); ?></a></h3>
                                                    <p> <?php echo e($hotNew->capo); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr style="margin-left: 15px;">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="clearfix text-center">
                                <?php echo e($listNews->links()); ?>

                            </div>
                        </div>
                        <div class="col-sm-3 ads">
                            <a href="<?php echo e($ads_2->link); ?>"><img src="<?php echo e(url($ads_2->image)); ?>" alt="<?php echo e($ads_2->title); ?>"></a>
                            <a href="<?php echo e($ads_3->link); ?>"><img src="<?php echo e(url($ads_3->image)); ?>" alt="<?php echo e($ads_3->title); ?>"></a>
                        </div>
                    </div>
                </section>

            <?php else: ?>
                <h3>Danh mục này hiện chưa có tin tức</h3>
            <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>