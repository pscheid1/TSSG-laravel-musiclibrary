<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div><h2>Edit User: <?php echo e($user->username); ?></h2></div>
<div class=""col-md-12>
    <?php echo Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user]]); ?>

    <div class="container">

        <div class="col-md-10 pull-left">
            <h3>Basic Information</h3>
            <div class="row">
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('username', 'Username:'); ?>

                    <?php echo Form::text('username'); ?>

                </div>
                <div class="col-md-1" style="background-color:white;"></div>
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('currentRole', 'Role:'); ?>

                    <?php echo Form::select('currentRole', $userRoles, $user->currentRole); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('prefix', 'Prefix:'); ?>

                    <?php echo Form::text('prefix'); ?>

                </div>
                <div class="col-md-1" style="background-color:white;"></div>
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('address1', 'Address One:'); ?>

                    <?php echo Form::text('address1'); ?>

                </div>
            </div>
             <div class="row">
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('firstname', 'First Name:'); ?>

                    <?php echo Form::text('firstname'); ?>

                </div>
                <div class="col-md-1" style="background-color:white;"></div>
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('address2', 'Address Two:'); ?>

                    <?php echo Form::text('address2'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('middlename', 'Middle Name:'); ?>

                    <?php echo Form::text('middlename'); ?>

                </div>
                <div class="col-md-1" style="background-color:white;"></div>
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('address1', 'Address One:'); ?>

                    <?php echo Form::text('address1'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('prefix', 'Prefix:'); ?>

                    <?php echo Form::text('prefix'); ?>

                </div>
                <div class="col-md-1" style="background-color:white;"></div>
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('address1', 'Address One:'); ?>

                    <?php echo Form::text('address1'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('prefix', 'Prefix:'); ?>

                    <?php echo Form::text('prefix'); ?>

                </div>
                <div class="col-md-1" style="background-color:white;"></div>
                <div class="col-md-4" style="background-color:LightCyan;">
                    <?php echo Form::label('address1', 'Address One:'); ?>

                    <?php echo Form::text('address1'); ?>

                </div>
            </div>
            
            
            
            
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('prefix', 'Prefix:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('prefix'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('firstname', 'First Name:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('firstname'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('middlename', 'Middle Name:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('middlename'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('lastname', 'Last Name:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('lastname'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('suffix', 'Suffix:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('suffix'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('username', 'Userame:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('username'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('firstname', 'First Name:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('firstname'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('firstname', 'First Name:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('firstname'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('firstname', 'First Name:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('firstname'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('firstname', 'First Name:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('firstname'); ?>

                    </span>
                </div>
                <div class="col-md-2">

                </div>                    
                <div class="col-md-2">
                    <span class='control-label pull-right'>
                        <?php echo Form::label('addressone', 'Address One:'); ?>

                    </span>
                </div>
                <div class="col-md-2">
                    <span class='pull-left'>
                        <?php echo Form::text('addressone'); ?>

                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-10 pull-left" style="background-color:white;">
            <br/>
            <div class='row'/>

            <p class="xsmall"></p>

            <table border='0'>
                <tr>
                    <td>
                        <?php echo Form::submit('Update', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo Form::model($user, ['method' => 'get', 'route' => 'user.index']); ?>

                        <?php echo Form::submit('Cancel', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>