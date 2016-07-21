@extends('layouts\master')

@section('content')
{{--@include('partials.alerts.errors')--}}
@include('flash::message')

<div>
    <h2>Add a New Style</h2>
</div>
<div class=""col-sm-6>
    {!! Form::open(['route' => 'style.store']) !!}
    <div class="container">
        <div class="row">
            <div class="col-sm-5 pull-left" style="background-color:LightCyan;">
                <h3>Basic Style Info</h3>
                <div>
                    {!! Form::label(null,'Style:') !!}
                </div>
                <div>
                    {!! Form::text('DESCRIPTION' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Update UserID:') !!}
                </div>
                <div>
                    {!! Form::text('UPDATEUSERID' ) !!}
                </div>
                <p/>
             </div>
        </div>
        <div/>
        <div>
            <p/>
            <p class="xsmall"><br/></p>

            <table border='0'>
                <tr>
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
    @stop


