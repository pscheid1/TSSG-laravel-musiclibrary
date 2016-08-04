@extends('layouts\master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div><h2>Edit Song: {{ $song->TITLE }}</h2></div>
<div class=""col-sm-6>
    {!! Form::model($song, ['method' => 'PATCH', 'route' => ['musiclibrary.update', $song]]) !!}
    <div class="container">
        <div class="row">
            <div class="col-sm-5
                 pull-left" style="background-color:LightCyan;">
                <h3>Basic Song Info</h3>
                <div>
                    {!! Form::label(null, 'Catalog Num:') !!}
                    {!! Form::text('CATALOGNUM') !!}
                </div>
                <div>
                    {!! Form::label(null,'Title:') !!}
                    {!! Form::text('TITLE') !!}
                </div>
                <div>
                    {!! Form::label(null,'Style:') !!}
                    {!! Form::select('STYLEID', $styles, $song->STYLEID) !!}
                </div>
                <div>
                    {!! Form::label(null,'Tempo:') !!}
                    {!! Form::select('TEMPOID', $tempos, $song->TEMPOID) !!}
                </div>
                <div>
                    {!! Form::label(null,'Standard Playing Time:') !!}
                    {!! Form::text('STDPLAYTIME', null , array('placeholder' => 'hh:mm:ss')) !!}
                </div>
                <div>
                    {!! Form::label(null,'Extended Playing Time:') !!}
                    {!! Form::text('EXTPLAYTIME', null , array('placeholder' => 'hh:mm:ss')) !!}
                </div>
            </div>
             <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                <h3>Vocal & Musician Requirements</h3>
                <div>
                    {!! Form::label(null,'Instrumentation:') !!}
                    {!! Form::text('INSTRUMENTATION') !!}
                </div>
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
                    {!! Form::text('VOICES') !!}
                </div>
                <div>
                    {!! Form::label(null,'Transcription:') !!}
                    {!! Form::checkbox('TRANSCRIPTION' ) !!}
                </div>
                <div>
                    {!! Form::label(null,'Commercial Arrangement:') !!}
                    {!! Form::checkbox('COMMARRANGEMENT' ) !!}
                </div>
                <div>
                    {!! Form::label(null,'Performance Grade:') !!}
                    {!! Form::text('PERFGRADE') !!}
                </div>
                <div>
                    {!! Form::label(null,'Voice Cues:') !!}
                    {!! Form::text('VCIF') !!}
                </div>
            </div>
        </div>

        <div class=row>
            <div class="col-sm-5 pull-left" style="background-color:LightCyan;">
                <h3>Publishing Info</h3>
                <div>
                    {!! Form::label(null,'Composer:') !!}
                    {!! Form::text('COMPOSER') !!}
                </div>
                <div>
                    {!! Form::label(null,'Arranger:') !!}
                    {!! Form::text('ARRANGER' ) !!}
                </div>
                <div>
                    {!! Form::label(null,'Lyracist:') !!}
                    {!! Form::text('LYRACIST') !!}
                </div>
                <div>
                    {!! Form::label(null,'Copyright:') !!}
                    {!! Form::text('COPYRIGHT' ) !!}
                </div>
                <div>
                    {!! Form::label(null,'Publisher:') !!}
                    {!! Form::text('PUBLISHER') !!}
                </div>
                <div>
                    {!! Form::label(null,'Publication Year:') !!}
                    {!! Form::text('PUBYEAR' ) !!}
                </div>
            </div>
            <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                <h3>Comments & History</h3>
                <div>
                    {!! Form::label(null,'Performance Comments:') !!}
                    {!! Form::text('PERFCOMMENTS') !!}
                </div>
                <div>
                    {!! Form::label(null,'Song Description:') !!}
                    {!! Form::text('DESCRIPTION' ) !!}
                </div>
                <div>
                    {!! Form::label(null,'Created at:') !!}
                    {!! Form::text('created_at', null , ['disabled' => 'true']) !!}
                </div>
                <div>
                    {!! Form::label(null,'Updated at:') !!}
                    {!! Form::text('updated_at', null , ['disabled' => 'true']) !!}
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
                    {!! Form::submit('Update', ['class' => 'button']) !!}
                    {!! Form::close() !!}
                </td>
                <td>&nbsp;</td>
                <td>
                    {!! Form::model($song, ['method' => 'get', 'route' => 'musiclibrary.index']) !!}
                    {!! Form::submit('Cancel', ['class' => 'button']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        </table>
    </div>
</div>
@stop


