<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form role='form' name="myRqst" id="myRqst" action='/user/'   method='POST'>
    <?php echo e(csrf_field()); ?> 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:70%" border=".5" align="center" >
    <caption><h2>Musicians Manager Users</h2></caption>
    <tr>
        <th> User Name </th>        
        <th> Last Name </th>
        <th> First Name </th>
        <th> Group Membership </th>
        <th> Instrument </th>
        <th> Current Role </th>
        <th>Can Login</th>
        <th> Action </th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?php echo e($user->username); ?></td>        
        <td><?php echo e($user->lastname); ?></td>
        <td><?php echo e($user->firstname); ?></td>
        <td> <?php echo e(Form::select(null, $usrgps[$user->id], 0)); ?> </td>        
        <td></td>        
        <td><?php echo e(App\Role::where('id', $user->currentRole)->first()->displayname); ?></td>
        <?php if($user->loginpermitted == 1): ?>
        <td>True</td>
        <?php else: ?>
        <td>False</td>
        <?php endif; ?>
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '<?php echo e($user->id); ?>')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '<?php echo e($user->id); ?>')">
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