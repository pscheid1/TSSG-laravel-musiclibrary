<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div><h2>Add a new Role</h2></div>
<div class="row">
    <div class='col-md-2'></div>
    <div class="required col-md-4">
        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(required fields indicated with an *)</b>
    </div>
</div>
<br/>
<div class="col-md-12">
    <?php echo Form::open(['route' => 'role.store']); ?>

    <div class="container">
          <div class="col-md-5 pull-left" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:160px">&nbsp;<b>Role Information</b></h4>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    <?php echo Form::label('null', '* Role:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('name'); ?>

                </div>
            </div><br/>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    <?php echo Form::label('null', '* Display Name:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('displayname'); ?>

                </div>
            </div> 
            <br/>
        </div>
    </div>
    <div class="row">
        <div class='col-sm-2  pull-left'><br/>
            <table border='0'>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <?php echo Form::submit('Add', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo Form::model(null, ['method' => 'get', 'route' => 'role.index']); ?>

                        <?php echo Form::submit('Cancel', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>