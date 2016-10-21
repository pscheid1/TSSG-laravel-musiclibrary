<?php $__env->startSection('content'); ?>


<div class="relative">
    <h4>Under Construction</h4>

    <p>The feature You have requested is not yet available.</p>
    <p>
        <hr>
        <a href="<?php echo e(route('musiclibrary.index')); ?>" class="btn btn-info">List Songs</a>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Home</a>
    </p>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>