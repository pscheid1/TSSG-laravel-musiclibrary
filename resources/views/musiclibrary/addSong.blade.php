@extends('layouts\master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div><h2>Add a New Song</h2></div>
<div class=""col-sm-6>
    {!!Form::open(['route' => 'musiclibrary.store']) !!}
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-5
                     pull-left" style="background-color:LightCyan;">
                    <h3>Basic Song Info</h3>
                    <div>
                        {!! Form::label(null, 'Catalog Num:') !!}
                    </div>
                    <div>
                        {!! Form::text('CATALOGNUM') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Title:') !!}
                    </div>
                    <div>
                        {!! Form::text('TITLE') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Style:') !!}
                    </div>
                    <div>
                        {!! Form::select('STYLEID', $stylesAdd, "0") !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Tempo:') !!}
                    </div>
                    <div>
                        {!! Form::select('TEMPOID', $temposAdd, "0") !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Standard Playing Time:') !!}
                    </div>
                    <div>
                        {!! Form::text('STDPLAYTIME', null , array('placeholder' => 'hh:mm:ss')) !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Extended Playing Time:') !!}
                    </div>
                    <div>
                        {!! Form::text('EXTPLAYTIME', null , array('placeholder' => 'hh:mm:ss')) !!}
                    </div>
                    <p/>
                </div>

                <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                    <h3>Vocal & Musician Requirements</h3>
                    <div>
                        {!! Form::label(null,'Instrumentation:') !!}
                    </div>
                    <div>
                        {!! Form::text('INSTRUMENTATION') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Vocal:') !!}
                        {!! Form::checkbox('VOCAL' ) !!}
                    </div>
                    <div>
                        {!! Form::label(null,'Vocalists:') !!}
                        {!! Form::checkbox('VOCALISTS' ) !!}
                    </div>
                    <div>
                        {!! Form::label(null,'Voices:') !!}
                    </div>
                    <div>
                        {!! Form::text('VOICES') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Transcription:') !!}
                        {!! Form::checkbox('TRANSCRIPTION' ) !!}
                    </div>
                    <div>
                        {!! Form::label(null,'Commercial Arrangement:') !!}
                        {!! Form::checkbox('COMMARRANGEMENT' ) !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Performance Grade:') !!}
                    </div>
                    <div>
                        {!! Form::text('PERFGRADE') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Voice Cues:') !!}
                    </div>
                    <div>
                        {!! Form::text('VCIF') !!}
                    </div>
                    <p/>
                </div>
            </div>
            <p/>&nbsp;<p/>
            <div class=row>
                <div class="col-sm-5 pull-left" style="background-color:LightCyan;">
                    <h3>Publishing Info</h3>
                    <div>
                        {!! Form::label(null,'Composer:') !!}
                    </div>
                    <div>
                        {!! Form::text('COMPOSER') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Arranger:') !!}
                    </div>
                    <div>
                        {!! Form::text('ARRANGER' ) !!}
                    </div>
                    <div>
                        {!! Form::label(null,'Lyracist:') !!}
                    </div>
                    <div>
                        {!! Form::text('LYRACIST') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Copyright:') !!}
                    </div>
                    <div>
                        {!! Form::text('COPYRIGHT' ) !!}
                    </div>
                    <div>
                        {!! Form::label(null,'Publisher:') !!}
                    </div>
                    <div>
                        {!! Form::text('PUBLISHER') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Publication Year:') !!}
                    </div>
                    <div>
                        {!! Form::text('PUBYEAR' ) !!}
                    </div>
                    <p/>
                </div>
                <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                    <h3>Comments & History</h3>
                    <div>
                        {!! Form::label(null,'Rehearsal/Performance Comments:') !!}
                    </div>
                    <div>
                        {!! Form::text('PERFCOMMENTS') !!}
                    </div>
                    <p/>
                    <div>
                        {!! Form::label(null,'Song Description:') !!}
                    </div>
                    <div>
                        {!! Form::text('DESCRIPTION' ) !!}
                    </div>
                    <p/>
                </div>
            </div>
        </div>
        <div>
            <table border='0'>
                <tr>
                    <td>
                        {!! Form::submit('Add', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        {!! Form::model(null, ['method' => 'get', 'route' => 'musiclibrary.index']) !!}
                        {!! Form::submit('Cancel', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div>

    </div>


    @stop


