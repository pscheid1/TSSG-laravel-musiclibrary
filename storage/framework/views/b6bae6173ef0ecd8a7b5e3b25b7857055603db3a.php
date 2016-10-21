<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form role='form' name="myRqst" id="myRqst" action='/group/'   method='POST'>
    <?php echo e(csrf_field()); ?> 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:70%" border=".5" align="center" >
    <caption><h2>Musicians Manager Groups</h2></caption>
    <tr>
        <th> Group </th>        
        <th> Type </th>
        <th> Status </th>
        <th> Manager </th>
         <th> Action </th>
    </tr>
    <?php foreach($groups as $group): ?>
    <tr>
        <td><?php echo e($group->name); ?></td>        
        <td><?php echo e(App\Style::where('id', $group->type)->first()->DESCRIPTION); ?></td> 
        <?php if($group->status == 1): ?>
        <td>Active</td>
        <?php else: ?>
        <td>Inactive</td>
        <?php endif; ?>
        <td><?php echo e(App\User::where('id', $group->groupleader)->first()->firstname . ' ' . App\User::where('id', $group->groupleader)->first()->lastname); ?></td>        
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '<?php echo e($group->id); ?>')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '<?php echo e($group->id); ?>')">
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