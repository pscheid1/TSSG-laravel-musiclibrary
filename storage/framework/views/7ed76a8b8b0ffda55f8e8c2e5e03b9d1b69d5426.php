<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<table style="width:80%" border="1" align="center">
    <caption><h4>Musicians Manager Music Library</h4></caption>
    <tr>
        <th> Catlog No. </th>
        <th> Ti </th>
        <th> Arranger </th>
        <th> Composer </th>
        <th> Style</th>
        <th> Tempo </th>
        <th> Published </th>
        <th> Action </th>
    </tr>
    <?php foreach($musiclibrary as $music): ?>
    <tr>
        <td><?php echo e($music->CATALOGNUM); ?></td>
        <td><?php echo e($music->TITLE); ?></td>
        <td><?php echo e($music->ARRANGER); ?></td>
        <td><?php echo e($music->COMPOSER); ?></td> 
        <td><?php echo e(App\Style::where('id', $music->STYLEID)->first()->DESCRIPTION); ?></td>
        <td><?php echo e(App\Tempo::where('id', $music->TEMPOID)->first()->DESCRIPTION); ?></td>
        <td><?php echo e($music->PUBYEAR); ?></td>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo e(route('musiclibrary.edit', compact($music)); ?>" class="glyphicon glyphicon-edit">&nbsp;</a>
            <a href="<?php echo e(route('musiclibrary.destroy', $music->id )); ?>" class="glyphicon glyphicon-trash"></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>