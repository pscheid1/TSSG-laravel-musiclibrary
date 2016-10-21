<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div><h2>Add a New User</h2></div>
<div class="col-sm-6">
    <?php echo Form::open(['route' => 'user.store']); ?>

    <?php echo csrf_field(); ?>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 pull-left" style="background-color:LightCyan;">
                    <h3>Basic Information</h3>
                    <div>
                        <?php echo Form::label(null,'Prefix:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('prefix' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'First Name:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('firstname' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Middle Name:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('middlename' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Last Name:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('lastname' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Sufix:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('sufix' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'User Name:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('username' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Can Login:'); ?>

                        <?php echo Form::checkbox('usercanlogin' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Password:'); ?>

                    </div>
                    <div>
                        <?php echo Form::password('password'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Confirm Password:'); ?>

                    </div>
                    <div>
                        <?php echo Form::password('password_confirmation'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Company Name:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('companyname' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Title:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('title' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Note
                        ;'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('note' ); ?>

                    </div>
                    <p/>
                </div>
                <div class="col-sm-6 pull-right" style="background-color:LightCyan;">
                    <h3>Contact Information</h3>
                    <div>
                        <?php echo Form::label(null,'Role:'); ?>

                    </div>
                    <div>  
                        <?php echo Form::select('userRoles[]', $rolesAdd, null,
                        ['class' => 'form-control', 'multiple' => 'true', 'style' => 'width: 60%']); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Address 1:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('address1' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Address 2:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('address2' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'City:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('city' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'State:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('state' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Zipcode:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('zipcode' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Phone 1:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('phone1' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Phone 2:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('phone2' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Email:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('email' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Web URL:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('url' ); ?>

                    </div>
                    <p/>

                </div>
            </div>
        </div>
        <div>
            <p/>
            <table border='0'>
                <tr>
                    <td>
                        <?php echo Form::submit('Add', ['class' => 'button']); ?>

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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>