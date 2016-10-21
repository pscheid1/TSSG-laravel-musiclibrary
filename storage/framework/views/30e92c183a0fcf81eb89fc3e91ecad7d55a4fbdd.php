<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div><h2>Edit Song: <?php echo e($song->TITLE); ?></h2></div>
<div class=""col-sm-6>
    <?php echo Form::model($song, ['method' => 'PATCH', 'route' => ['musiclibrary.update', $song]]); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-5
                 pull-left" style="background-color:LightCyan;">
                <h3>Basic Song Info</h3>
                <div>
                    <?php echo Form::label(null, 'Catalog Num:'); ?>

                    <?php echo Form::text('CATALOGNUM'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Title:'); ?>

                    <?php echo Form::text('TITLE'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Style:'); ?>

                    <?php echo Form::select('STYLEID', $styles, $song->STYLEID); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Tempo:'); ?>

                    <?php echo Form::select('TEMPOID', $tempos, $song->TEMPOID); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Standard Playing Time:'); ?>

                    <?php echo Form::text('STDPLAYTIME', null , array('placeholder' => 'hh:mm:ss')); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Extended Playing Time:'); ?>

                    <?php echo Form::text('EXTPLAYTIME', null , array('placeholder' => 'hh:mm:ss')); ?>

                </div>
            </div>
             <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                <h3>Vocal & Musician Requirements</h3>
                <div>
                    <?php echo Form::label(null,'Instrumentation:'); ?>

                    <?php echo Form::text('INSTRUMENTATION'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Vocal:'); ?>

                    <?php echo Form::checkbox('VOCAL' ); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Vocalists:'); ?>

                    <?php echo Form::checkbox('VOCALISTS' ); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Voices:'); ?>

                    <?php echo Form::text('VOICES'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Transcription:'); ?>

                    <?php echo Form::checkbox('TRANSCRIPTION' ); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Commercial Arrangement:'); ?>

                    <?php echo Form::checkbox('COMMARRANGEMENT' ); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Performance Grade:'); ?>

                    <?php echo Form::text('PERFGRADE'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Voice Cues:'); ?>

                    <?php echo Form::text('VCIF'); ?>

                </div>
            </div>
        </div>

        <div class=row>
            <div class="col-sm-5 pull-left" style="background-color:LightCyan;">
                <h3>Publishing Info</h3>
                <div>
                    <?php echo Form::label(null,'Composer:'); ?>

                    <?php echo Form::text('COMPOSER'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Arranger:'); ?>

                    <?php echo Form::text('ARRANGER' ); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Lyracist:'); ?>

                    <?php echo Form::text('LYRACIST'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Copyright:'); ?>

                    <?php echo Form::text('COPYRIGHT' ); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Publisher:'); ?>

                    <?php echo Form::text('PUBLISHER'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Publication Year:'); ?>

                    <?php echo Form::text('PUBYEAR' ); ?>

                </div>
            </div>
            <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                <h3>Comments & History</h3>
                <div>
                    <?php echo Form::label(null,'Performance Comments:'); ?>

                    <?php echo Form::text('PERFCOMMENTS'); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Song Description:'); ?>

                    <?php echo Form::text('DESCRIPTION' ); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Created at:'); ?>

                    <?php echo Form::text('created_at', null , ['disabled' => 'true']); ?>

                </div>
                <div>
                    <?php echo Form::label(null,'Updated at:'); ?>

                    <?php echo Form::text('updated_at', null , ['disabled' => 'true']); ?>

                </div>
            </div>
        </div>
    </div>

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
                    <?php echo Form::model($song, ['method' => 'get', 'route' => 'musiclibrary.index']); ?>

                    <?php echo Form::submit('Cancel', ['class' => 'button']); ?>

                    <?php echo Form::close(); ?>

                </td>
            </tr>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>