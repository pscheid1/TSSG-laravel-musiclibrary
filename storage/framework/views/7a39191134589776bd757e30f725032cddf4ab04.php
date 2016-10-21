<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container">
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/user')); ?>">
            <?php echo csrf_field(); ?>


            <div class="col-sm-6 pull-left" style="background-color:LightCyan;">
                <div class="panel panel-default">
                    <div class="panel-heading">Basic Information</div>
                    <div class="panel-body">
                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>">

                                <?php if($errors->has('username')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('username')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('prefix') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Prefix</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="prefix" value="<?php echo e(old('prefix')); ?>">

                                <?php if($errors->has('prefix')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('prefix')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname')); ?>">

                                <?php if($errors->has('firstname')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('firstname')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('middlename') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="middlename" value="<?php echo e(old('middlename')); ?>">

                                <?php if($errors->has('middlename')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('middlename')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>">

                                <?php if($errors->has('lastname')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('lastname')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('sufix') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Sufixx</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sufix" value="<?php echo e(old('sufix')); ?>">

                                <?php if($errors->has('sufix')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('sufix')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location" value="<?php echo e(old('location')); ?>">

                                <?php if($errors->has('location')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('location')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>                        

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                <?php if($errors->has('password_confirmation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('companyname') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="companyname" value="<?php echo e(old('companyname')); ?>">

                                <?php if($errors->has('companyname')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('companyname')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>">

                                <?php if($errors->has('title')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('note') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Note</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="note" value="<?php echo e(old('note')); ?>">

                                <?php if($errors->has('note')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('note')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-1 style="white;">
        </div>

        <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Information</div>
                <div class="panel-body">
                    
                    <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">Role</label>
                        <div class="col-md-5">
                            <?php echo Form::select('role', $rolesAdd, null,
                            ['class' => 'form-control',
                            'multiple' => 'multiple']); ?>

                            <?php if($errors->has('role')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('role')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('address1') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">Address 1</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="address1" value="<?php echo e(old('address1')); ?>">

                            <?php if($errors->has('address1')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('address1')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('address2') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">Address 2</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="address2" value="<?php echo e(old('address2')); ?>">

                            <?php if($errors->has('address2')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('address2')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">City</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="city" value="<?php echo e(old('state')); ?>">

                            <?php if($errors->has('city')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('city')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">State</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="state" value="<?php echo e(old('state')); ?>">

                            <?php if($errors->has('state')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('state')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">Zip</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="zip" value="<?php echo e(old('zip')); ?>">

                            <?php if($errors->has('zip')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('zip')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('phone1') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">Phone 1</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="phone1" value="<?php echo e(old('phone1')); ?>">

                            <?php if($errors->has('phone1')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('phone1')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('phonet') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">Phone 2</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="phone2" value="<?php echo e(old('phone2')); ?>">

                            <?php if($errors->has('phone2')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('2')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-5">
                            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                            <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('weburl') ? ' has-error' : ''); ?>">
                        <label class="col-md-4 control-label">Web URL</label>

                        <div class="col-md-5">
                            <input type="email" class="form-control" name="weburl" value="<?php echo e(old('weburl')); ?>">

                            <?php if($errors->has('weburl')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('weburl')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>                            

                </div>
            </div>
        </div>

</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>Register
        </button>
    </div>
</div>
</form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>