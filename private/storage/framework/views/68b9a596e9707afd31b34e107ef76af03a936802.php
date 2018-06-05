<?php $__env->startSection('pageTitle', 'Vietnet24h'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container">
        <section class="cat_header clearfix">
            <ul class="map-breadcrumb left">
                <li class="start">
                    <h4>
                        <a href="javascript:void(0)">Tin tức nổi bật</a>
                    </h4>
                </li>
            </ul>
        </section>
        <section class="cat_header clearfix">
            <span class="btn_sub_menu active"><i class="ic ic-caret-2-down"></i></span>

            <section class="hot_news">
                <div class=" blogs-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="main-item">
                                <a href="<?php echo e(url('tin-tuc/'.$first_hot_news->slug.'.html')); ?>"><img src="<?php echo e(url($first_hot_news->image)); ?>"></a>
                                <h2><a href="<?php echo e(url('tin-tuc/'.$first_hot_news->slug.'.html')); ?>"><?php echo e($first_hot_news->title); ?></a></h2>
                                <p> <?php echo e($first_hot_news->capo); ?>.</p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="list-news">
                                <?php $__currentLoopData = $hot_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h2><a href="<?php echo e(url('tin-tuc/'.$news->slug.'.html')); ?>"><?php echo e(App\Helpers\Common::subTitle($news->title,100)); ?>...</a></h2>
                                    <?php if($key != count($hot_news)): ?>
                                        <hr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-sm-3 ads-top">
                            <a href="<?php echo e($ads_1->link); ?>"><img src="<?php echo e(url($ads_1->image)); ?>" alt="<?php echo e($ads_1->title); ?>"></a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ads-middle">
                <a href="<?php echo e($ads_2->link); ?>"><img src="<?php echo e(url($ads_2->image)); ?>" alt="<?php echo e($ads_2->title); ?>"></a>
            </section>

            <section class="list-category-middle">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="row">
                            <?php if(count($categories) > 0): ?>
                                <?php
                                    $i = 0;
                                ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($i %  2 == 0 && $i > 0): ?>
                                        <div class="clearfix"></div>
                                    <?php endif; ?>
                                    <div class="col-sm-6">
                                        <div class="blogs-content">
                                            <div class="title_box_category">
                                                <h4><a title="<?php echo e($cat->name); ?>" href="<?php echo e(url('danh-muc/'.$cat->slug)); ?>" class="first"><?php echo e($cat->name); ?></a></h4>
                                                <?php
                                                    $topics = App\Models\Topic::where('category_id', $cat->id)->take(4)->get();
                                                    $arrTopicID = [];
                                                    foreach ($topics as $topic){
                                                        $arrTopicID[] = $topic->id;
                                                    }
                                                    $cate_news = App\Models\News::whereIn('topic_id', $arrTopicID)->orderBy('id', 'desc')->take(4)->get();
                                                    $hot_news = $cate_news->values()->get(count($cate_news) - 1);
                                                ?>
                                                <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <h5>
                                                        <a title="<?php echo e($topic->name); ?>" target="" href="<?php echo e(url('chuyen-muc/'.$topic->slug)); ?>">
                                                            <?php echo e($topic->name); ?>

                                                        </a>
                                                    </h5>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="main-item">
                                                        <a href="<?php echo e(url('tin-tuc/'.$hot_news['slug'].'.html')); ?>"><img src="<?php echo e($hot_news['image']); ?>"></a>
                                                        <h2><a href="<?php echo e(url('tin-tuc/'.$hot_news['slug'].'.html')); ?>"><?php echo e($hot_news['title']); ?></a></h2>
                                                        <p> <?php echo e($hot_news['capo']); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="list-news">
                                                        <?php $__currentLoopData = $cate_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($key != count($cate_news) -1): ?>
                                                                <h2><a href="<?php echo e(url('tin-tuc/'.$news['slug'].'.html')); ?>"><?php echo e(App\Helpers\Common::subTitle($news->title,120)); ?>...</a></h2>
                                                                <?php if($key < count($cate_news) - 2): ?>
                                                                    <hr>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $i++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12 ads">
                                <a href="<?php echo e($ads_3->link); ?>"><img src="<?php echo e(url($ads_3->image)); ?>" alt="<?php echo e($ads_3->title); ?>"></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 ads" >
                                <a href="<?php echo e($ads_4->link); ?>"><img src="<?php echo e(url($ads_4->image)); ?>" alt="<?php echo e($ads_4->title); ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>