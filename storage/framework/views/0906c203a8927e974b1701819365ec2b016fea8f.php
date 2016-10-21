<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div><h2>Edit Song: <?php echo e($song->TITLE); ?></h2></div>
<<div class="row">
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
    <?php echo Form::model($song, ['method' => 'PATCH', 'route' => ['musiclibrary.update', $song]]); ?>	
    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:212px">&nbsp;<b>Basic Song Information</b></h4>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label(null, '* Catalog Num:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('CATALOGNUM'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'* Title:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('TITLE'); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'* Style:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::select('STYLEID', $styles, $song->STYLEID); ?>

                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'* Tempo:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::select('TEMPOID', $tempos, $song->TEMPOID); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Std. Playing Time:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('STDPLAYTIME', null , array('placeholder' => 'hh:mm:ss')); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Xtd. Playing Time:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('EXTPLAYTIME', null , array('placeholder' => 'hh:mm:ss')); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="col-md-1" style="background-color:white;"></div>
        <div class="col-md-5 pull-right" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:280px">&nbsp;<b>Vocal & Musician Requirements</b></h4>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Instrumentation:'); ?> 
                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('INSTRUMENTATION'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Vocal:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::checkbox('VOCAL' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Vocalists:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::checkbox('VOCALISTS' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Voices:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('VOICES'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Transcription:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::checkbox('TRANSCRIPTION' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Arrangement:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::checkbox('COMMARRANGEMENT' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Grade:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('PERFGRADE'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Voice Cues:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('VCIF'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:206px">&nbsp;<b>Publishing Information</b></h4>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Composer:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('COMPOSER'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Arranger:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('ARRANGER' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Lyracist:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('LYRACIST'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Copyright:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('COPYRIGHT' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Publisher:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('PUBLISHER'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Publication Year:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('PUBYEAR' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="col-md-1" style="background-color:white;"></div>
        <div class="col-md-5 pull-right" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:186px">&nbsp;<b>Comments & History</b></h4>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Performance:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('PERFCOMMENTS'); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Description:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('DESCRIPTION' ); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Last Updated by:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('null',  $lastupdatedby, ['disabled' => 'true'] ); ?>

                </div>
            </div>                        
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Created at:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('created_at', null , ['disabled' => 'true']); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <?php echo Form::label(null,'Updated at:'); ?>

                </div>
                <div class="col-md-1 pull-left">
                    <?php echo Form::text('updated_at', null , ['disabled' => 'true']); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            &nbsp;
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
                        <?php echo Form::submit('Update', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo Form::model($song, ['method' => 'get', 'route' => 'musiclibrary.index']); ?>

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