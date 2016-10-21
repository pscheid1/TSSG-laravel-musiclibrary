<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal">
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('prefix', 'Prefix:', ['class' => 'pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('prefix'); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::label('currentRole', 'Role:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::select('currentRole', $userRoles, $user->currentRole); ?>

        </div>
    </div>
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('firstname', 'First Name:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('firstname'); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::label('address1', 'Address One:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('address1'); ?>

        </div>
    </div>
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('middlename', 'Middle Name:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('middlename'); ?>

        </div>
        <div class="row" style="padding-bottom : 10px">
            <div class="col-lg-2">
                <?php echo Form::label('address2', 'Address Two:', ['class' => 'control-label pull-right']); ?>

            </div>
            <div class="col-lg-2">
                <?php echo Form::text('address2'); ?>

            </div>
        </div>
    </div>
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('lastname', 'Last Name:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('lastname'); ?>

        </div>
        <div class="row" style="padding-bottom : 10px">
            <div class="col-lg-2">
                <?php echo Form::label('city', 'City:', ['class' => 'control-label pull-right']); ?>

            </div>
            <div class="col-lg-2">
                <?php echo Form::text('city'); ?>

            </div>
        </div>
    </div>
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('suffix', 'Suffix:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('suffix'); ?>

        </div>
        <div class="row" style="padding-bottom : 10px">
            <div class="col-lg-2">
                <?php echo Form::label('state', 'State:', ['class' => 'control-label pull-right']); ?>

            </div>
            <div class="col-lg-2">
                <?php echo Form::text('state'); ?>

            </div>
        </div>
    </div>
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('companyname', 'Company Name:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('companyname'); ?>

        </div>
        <div class="row" style="padding-bottom : 10px">
            <div class="col-lg-2">
                <?php echo Form::label('zipcode', 'Zipcode:', ['class' => 'control-label pull-right']); ?>

            </div>
            <div class="col-lg-2">
                <?php echo Form::text('zipcode'); ?>

            </div>
        </div>
    </div>
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('title', 'Title:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('title'); ?>

        </div>
        <div class="row" style="padding-bottom : 10px">
            <div class="col-lg-2">
                <?php echo Form::label('phone1', 'Phone One:', ['class' => 'control-label pull-right']); ?>

            </div>
            <div class="col-lg-2">
                <?php echo Form::text('phone1'); ?>

            </div>
        </div>
    </div>
    <div class="row" style="padding-bottom : 10px">
        <div class="col-lg-2">
            <?php echo Form::label('note', 'Note:', ['class' => 'control-label pull-right']); ?>

        </div>
        <div class="col-lg-2">
            <?php echo Form::text('note'); ?>

        </div>
        <div class="row" style="padding-bottom : 10px">
            <div class="col-lg-2">
                <?php echo Form::label('phone2', 'Phone Two:', ['class' => 'control-label pull-right']); ?>

            </div>
            <div class="col-lg-2">
                <?php echo Form::text('phone2'); ?>

            </div>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>