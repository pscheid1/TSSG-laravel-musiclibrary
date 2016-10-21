@extends('layouts\master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div><h2>Add a New Group</h2></div>
<div class="row">
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
    {!!Form::model($group, ['route' => 'group.store']) !!}
    {!! csrf_field() !!}
    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:160px">&nbsp;<b>Basic Information</b></h4>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    {!! Form::label('name', '* Group Name:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('name') !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label(null,'* Type:') !!}
                </div>
                <div class="col-md-1 pull-left">				
                    {!! Form::select('type',  $types, null, ['placeholder' => '- - - select one - - -']) !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label(null,'* Status:') !!}
                </div>
                <div class="col-md-1 pull-left">				
                    {!! Form::select('status',  $status, null, ['placeholder' => '- - - select one - - -']) !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label(null,'* Group Leader:') !!}
                </div>
                <div class="col-md-1 pull-left">				
                    {!! Form::select('groupleader',  $groupleader, null, ['placeholder' => '- - - select one - - -']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    &nbsp;
                </div>
            </div>                        
            <div class="row">
                <div class="col-md-12">
                    The Group Leader will automatically be made a member of the group.
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    It can be changed in any future edit.
                </div>
            </div>            
            <div class="row">
                <div class="col-md-1">
                    &nbsp;
                </div>
            </div>            
        </div>
        <div class="col-md-1" style="background-color:white;">
        </div>
        <div class="col-md-5 pull-right" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:180px">&nbsp;<b>Contact Information</b></h4>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('address1', 'Address One:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('address1') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('address2', 'Address Two:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('address2') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('city', 'City:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('city') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('state', 'State:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('state') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('zipcode', 'Zipcode:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('zipcode') !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label('phone1', '* Phone One:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('phone1') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('phone2', 'Phone Two:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('phone2') !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label('email', '* Email:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('email') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('weburl', 'Web URL:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('weburl') !!}
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
        <div class="col-md-7">
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
                        {!! Form::submit('Add', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        {!! Form::model(null, ['method' => 'get', 'route' => 'group.index']) !!}
                        {!! Form::submit('Cancel', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection


