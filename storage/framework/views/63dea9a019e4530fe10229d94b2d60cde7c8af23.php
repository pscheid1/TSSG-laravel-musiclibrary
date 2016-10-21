<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form role='form' name="myRqst" id="myRqst" action='/musiclibrary/'   method='POST'>
    <?php echo e(csrf_field()); ?> 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:98%" border=".5" align="center" >
    <caption><h2>Musicians Manager Music Library</h2></caption>
    <tr>
        <th> Catlog No. </th>
        <th> Title </th>
        <th> Arranger </th>
        <th> Composer </th>
        <th> Style</th>
        <th> Tempo </th>
        <th> Published </th>
        <th> Action </th>
    </tr>
    <?php foreach($musiclibrary as $music): ?>
    <?php if( $music->CATALOGNUM  === '' ): ?>
    <?php break; ?>
    <?php endif; ?>

    <tr>
        <td><?php echo e($music->CATALOGNUM); ?></td>
        <td><?php echo e($music->TITLE); ?></td>
        <td><?php echo e($music->ARRANGER); ?></td>
        <td><?php echo e($music->COMPOSER); ?></td> 
        <td><?php echo e(App\Style::where('id', $music->STYLEID)->first()->DESCRIPTION); ?></td>
        <td><?php echo e(App\Tempo::where('id', $music->TEMPOID)->first()->DESCRIPTION); ?></td>
        <td><?php echo e($music->PUBYEAR); ?></td>
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '<?php echo e($music->id); ?>')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '<?php echo e($music->id); ?>')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                </button>
            </span>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>