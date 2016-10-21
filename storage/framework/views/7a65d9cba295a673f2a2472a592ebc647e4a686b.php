<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<h1>Song $musiclibrary->MUSICID Deleted</h1>

<a href="<?php echo e(route('nya')); ?>" class="glyphicon glyphicon-edit">&nbsp;</a>
<a href="<?php echo e(route('nya')); ?>" class="glyphicon glyphicon-trash"></a>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>