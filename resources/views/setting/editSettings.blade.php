@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - Edit Settings';
</script>

<div class="col-md-12">
    <div class="col-md-5 pull-left">
        <div><h2>Edit Settings</h2></div>
        <div class="row">
            <div class="required col-md-12 pull-right">
                <b>(required fields indicated with an *)</b>
                <br></br>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    {!! Form::model($settings, ['method' => 'post', 'route' => ['settings.update', $settings]]) !!}
    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:80px">&nbsp;<b>Settings</b></h4>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    {!! Form::label('null', '* Banner Display:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::select('bannerPics', $bannerChoices, $settings->bannerPics) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label(null,'Last Updated by:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text(null, $updateusername , ['disabled' => 'true']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label(null,'Created at:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('created_at', null , ['disabled' => 'true']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label(null,'Updated at:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('updated_at', null , ['disabled' => 'true']) !!}
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
        <div class='col-sm-2  pull-left'><br/>
            <table border='0'>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        {!! Form::submit('Update', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        {!! Form::model($settings, ['method' => 'get', 'route' => 'home']) !!}
                        {!! Form::submit('Cancel', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection



