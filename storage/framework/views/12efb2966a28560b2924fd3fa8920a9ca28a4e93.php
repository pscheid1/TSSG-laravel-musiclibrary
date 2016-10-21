<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div><h2>Add a New Song</h2></div>
<div class=""col-sm-6>
    <?php echo Form::open(['route' => 'musiclibrary.store']); ?>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-5
                     pull-left" style="background-color:LightCyan;">
                    <h3>Basic Song Info</h3>
                    <div>
                        <?php echo Form::label(null, 'Catalog Num:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('CATALOGNUM'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Title:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('TITLE'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Style:'); ?>

                    </div>
                    <div>
                        <?php echo Form::select('STYLEID', $stylesAdd, "0"); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Tempo:'); ?>

                    </div>
                    <div>
                        <?php echo Form::select('TEMPOID', $temposAdd, "0"); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Standard Playing Time:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('STDPLAYTIME', null , array('placeholder' => 'hh:mm:ss')); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Extended Playing Time:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('EXTPLAYTIME', null , array('placeholder' => 'hh:mm:ss')); ?>

                    </div>
                    <p/>
                </div>

                <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                    <h3>Vocal & Musician Requirements</h3>
                    <div>
                        <?php echo Form::label(null,'Instrumentation:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('INSTRUMENTATION'); ?>

                    </div>
                    <p/>
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

                    </div>
                    <div>
                        <?php echo Form::text('VOICES'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Transcription:'); ?>

                        <?php echo Form::checkbox('TRANSCRIPTION' ); ?>

                    </div>
                    <div>
                        <?php echo Form::label(null,'Commercial Arrangement:'); ?>

                        <?php echo Form::checkbox('COMMARRANGEMENT' ); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Performance Grade:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('PERFGRADE'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Voice Cues:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('VCIF'); ?>

                    </div>
                    <p/>
                </div>
            </div>
            <p/>&nbsp;<p/>
            <div class=row>
                <div class="col-sm-5 pull-left" style="background-color:LightCyan;">
                    <h3>Publishing Info</h3>
                    <div>
                        <?php echo Form::label(null,'Composer:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('COMPOSER'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Arranger:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('ARRANGER' ); ?>

                    </div>
                    <div>
                        <?php echo Form::label(null,'Lyracist:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('LYRACIST'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Copyright:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('COPYRIGHT' ); ?>

                    </div>
                    <div>
                        <?php echo Form::label(null,'Publisher:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('PUBLISHER'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Publication Year:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('PUBYEAR' ); ?>

                    </div>
                    <p/>
                </div>
                <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                    <h3>Comments & History</h3>
                    <div>
                        <?php echo Form::label(null,'Rehearsal/Performance Comments:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('PERFCOMMENTS'); ?>

                    </div>
                    <p/>
                    <div>
                        <?php echo Form::label(null,'Song Description:'); ?>

                    </div>
                    <div>
                        <?php echo Form::text('DESCRIPTION' ); ?>

                    </div>
                    <p/>
                </div>
            </div>
        </div>
        <div>
            <table border='0'>
                <tr>
                    <td>
                        <?php echo Form::submit('Add', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo Form::model(null, ['method' => 'get', 'route' => 'musiclibrary.index']); ?>

                        <?php echo Form::submit('Cancel', ['class' => 'button']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            </table>
        </div>

    </div>


    <?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts\master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>