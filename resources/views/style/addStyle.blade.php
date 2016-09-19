@extends('layouts\master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div><h2>Add a new Style</h2></div>
<div class="row">
    <div class='col-md-2'></div>
    <div class="required col-md-4">
        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(required fields indicated with an *)</b>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        &nbsp;
    </div>
</div>

<div class="col-md-12">
    {!! Form::open(['route' => 'style.store']) !!}
    <div class="container">
          <div class="col-md-5 pull-left" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:160px">&nbsp;<b>Style Information</b></h4>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    {!! Form::label('null', '* Style:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('DESCRIPTION') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label(null,'Update UserID:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('UPDATEUSERID') !!}
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
                        {!! Form::submit('Add', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        {!! Form::model(null, ['method' => 'get', 'route' => 'style.index']) !!}
                        {!! Form::submit('Cancel', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
