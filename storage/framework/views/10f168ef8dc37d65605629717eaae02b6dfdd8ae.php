<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div><h2>Create a Guest Account</h2></div>
<div class="row">
    <div class="required cod-md-12 pull-right">
        <b>(required fields indicated with an *)</b>
    </div>
</div>
<div class="row">
    <div class="cod-md-12">
        &nbsp;
    </div>
</div>

<div class=""col-md-12>
    <?php echo Form::open(['method' => 'POST', 'url' => '/auth/register']); ?>

    <?php echo csrf_field(); ?>

    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:160px">&nbsp;<b>Basic Information</b></h4>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    <?php echo Form::label('username', '* Username:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('username'); ?>

                </div>
            </div>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    <?php echo Form::label('canlogin', '* Login Permitted:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::checkbox('loginpermitted', true, true); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('prefix', 'Prefix:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('prefix'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label('firstname', '* First Name:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('firstname'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('middlename', 'Middle Name:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('middlename'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label('lastname', '* Last Name:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('lastname'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('suffix', 'Suffix:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('suffix'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Password:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::password('password'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Confirmation:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::password('password_confirmation'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('company', 'Company:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('company'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('title', 'Title:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('title'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('note', 'Note:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('note'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="col-md-1" style="background-color:white;">
        </div>
        <div class="col-md-5 pull-right" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:180px">&nbsp;<b>Contact Information</b></h4>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label('currentRole', '* Current Role:'); ?> 
                </div>
                <div class="col-md-1 pull-left">
                        <?php echo Form::select('userRoles[]', ['12' => 'Guest'], 12); ?>

                </div>
            </div>
            <?php /*
                By adding the following Form::model binding of contact, the contact attributes can be filled with the view.
                Posting the Form::model($user) above, still works the same and sends all the attributes (User and Contact).
            */ ?>    
            <?php /*<?php echo Form::model($contact, ['method' => 'PATCH', 'route' => ['user.update', $user]]); ?>*/ ?>
            
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('address1', 'Address One:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('address1'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('address2', 'Address Two:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('address2'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('city', 'City:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('city'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('state', 'State:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('state'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('zipcode', 'Zipcode:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('zipcode'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label('phone1', '* Phone One:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('phone1'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('phone2', 'Phone Two:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('phone2'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label('email', '* Email:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('email'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label('weburl', 'Web URL:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('weburl'); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            &nbsp;
        </div>
        <div class='col-sm-2'>
            <table border='0'>
                <tr>
                    <td>
                        <?php echo Form::submit('Add', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo Form::model(null, ['method' => 'get', 'route' => 'login']); ?>

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