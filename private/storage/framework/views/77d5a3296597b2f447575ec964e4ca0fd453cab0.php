<div class="navbar-collapse collapse" id="main-menu">
    <ul class="nav navbar-nav">
        <?php if(isset($data['categories'])): ?>
            <?php if( isset($currentCate)): ?>
                <li><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
            <?php else: ?>
                <li class="active"><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
            <?php endif; ?>
            <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( isset($currentCate) && $currentCate->id == $category->id): ?>
                    <li class="active"><a href="<?php echo e(url('danh-muc/'.$category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                <?php else: ?>
                    <li><a href="<?php echo e(url('danh-muc/'.$category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div>

<?php if( isset($currentCate)): ?>
    <div class="navbar-collapse collapse" id="sub-menu">
        <ul class="nav navbar-nav">
            <?php if(count($listtopics) > 0): ?>
                <?php $__currentLoopData = $listtopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( isset($currentTopic) && $currentTopic->id == $topic->id): ?>
                        <li class="active"><a href="<?php echo e(url('chuyen-muc/'.$topic->slug)); ?>"><?php echo e($topic->name); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e(url('chuyen-muc/'.$topic->slug)); ?>"><?php echo e($topic->name); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>