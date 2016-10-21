<?php $__env->startSection('content'); ?>
<?php /*<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class=""col-sm-6>
    <?php echo Form::model($tempo, ['method' => 'PATCH', 'route' => ['tempo.update', $tempo]]); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-5
                 pull-left" style="background-color:LightCyan;">
                <h3>Basic Tempo Info</h3>
                <div>
                    <?php echo Form::label(null,'Tempo:'); ?>

                </div>
                <div>
                    <?php echo Form::text('DESCRIPTION' ); ?>

                </div>
                <p/>
                <div>
                    <?php echo Form::label(null,'Update UserID:'); ?>

                </div>
                <div>
                    <?php echo Form::text('UPDATEUSERID' ); ?>

                </div>
                <p/>
                <div>
                    <?php echo Form::label(null,'Created at:'); ?>

                </div>
                <div>
                    <?php echo Form::text('created_at', null , ['disabled' => 'true']); ?>

                </div>
                <p/>
                <div>
                    <?php echo Form::label(null,'Updated at:'); ?>

                </div>
                <div>
                    <?php echo Form::text('updated_at', null , ['disabled' => 'true']); ?>

                </div>
                <p/>
            </div>
        </div>
        <div/>
        <div>
            <p/>
            <p class="xsmall"><br/></p>

            <table border='0'>
                <tr>
                    <td>
                        <?php echo Form::submit('Update', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo Form::model($tempo, ['method' => 'get', 'route' => 'tempo.index']); ?>

                        <?php echo Form::submit('Cancel', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>