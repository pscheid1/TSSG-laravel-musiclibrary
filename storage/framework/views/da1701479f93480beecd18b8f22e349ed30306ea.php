<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form role='form' name="myRqst" id="myRqst" action='/tempo/'   method='POST'>
    <?php echo e(csrf_field()); ?> 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:70%" border=".5" align="center" >
    <caption><h2>Musicians Manager Tempos</h2></caption>
    <tr>
        <th> Tempo </th>
        <th> Last Updated By </th>
        <th> Action </th>
   </tr>
    <?php foreach($tempos as $tempo): ?>
    <tr>
        <td><?php echo e($tempo->DESCRIPTION); ?></td>
        <td><?php echo e($updaters[$tempo->id]); ?></td>
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '<?php echo e($tempo->id); ?>')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '<?php echo e($tempo->id); ?>')">
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