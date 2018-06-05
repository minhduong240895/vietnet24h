<?php if($type == 'only-show'): ?>
    <a href="<?php echo e(route("{$route}.show", ['id' => $id])); ?>" class="icon edit-customer"><i class="zmdi zmdi-eye"></i></a>
<?php elseif($type == 'none'): ?>
<?php elseif($type == 'edit-delete'): ?>
    <a href="<?php echo e(route("{$route}.edit", ['id' => $id])); ?>" class="icon edit-customer"><i class="zmdi zmdi-edit"></i></a>
    <?php echo Form::open(['url' => route("{$route}.destroy", ['id' => $id]), 'method' => 'POST', 'style' => 'vertical-align: middle; display: inline-block;']); ?>

    <?php echo e(method_field('DELETE')); ?>

    <a href="javascript:void(0)" class="icon edit-customer sweet-warning-cancel"><i class="zmdi zmdi-delete delete-icon"></i></a>
    <?php echo Form::close(); ?>

<?php elseif($type == 'show-delete'): ?>
    <a href="<?php echo e(route("{$route}.show", ['id' => $id])); ?>" class="icon edit-customer"><i class="zmdi zmdi-eye"></i></a>
    <?php echo Form::open(['url' => route("{$route}.destroy", ['id' => $id]), 'method' => 'POST', 'style' => 'vertical-align: middle; display: inline-block;']); ?>

    <?php echo e(method_field('DELETE')); ?>

    <a href="javascript:void(0)" class="icon edit-customer sweet-warning-cancel"><i class="zmdi zmdi-delete delete-icon"></i></a>
    <?php echo Form::close(); ?>

<?php else: ?>
    <a href="<?php echo e(route("{$route}.show", ['id' => $id])); ?>" class="icon edit-customer"><i class="zmdi zmdi-eye"></i></a>
    <a href="<?php echo e(route("{$route}.edit", ['id' => $id])); ?>" class="icon edit-customer"><i class="zmdi zmdi-edit"></i></a>
    <?php echo Form::open(['url' => route("{$route}.destroy", ['id' => $id]), 'method' => 'POST', 'style' => 'vertical-align: middle; display: inline-block;']); ?>

    <?php echo e(method_field('DELETE')); ?>

        <a href="javascript:void(0)" class="icon edit-customer sweet-warning-cancel"><i class="zmdi zmdi-delete delete-icon"></i></a>
    <?php echo Form::close(); ?>

<?php endif; ?>