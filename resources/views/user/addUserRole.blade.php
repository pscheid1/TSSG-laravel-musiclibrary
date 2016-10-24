@extends('layouts\master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div><h2>Add Role to User: {{ $user->username }}</h2></div>
<div class="row">
    <div class="required cod-md-12 pull-right">
        <b>(required fields indicated with an *)</b>
    </div>
</div>
<div class=""col-md-12>
    {!! Form::model($user, ['method' => 'post', 'route' => ['user.addrole', $user]]) !!}
    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:160px">&nbsp;<b>Basic Information</b></h4>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    {!! Form::label('username', '* Username:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('username') !!}
                </div>
            </div>
            <div class="row">
                <div class=" required col-md-4 col-md-offset-1">
                    {!! Form::label('canlogin', '* Login Permitted:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::checkbox('loginpermitted', 1) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('prefix', 'Prefix:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('prefix') !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label('firstname', '* First Name:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('firstname') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('middlename', 'Middle Name:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('middlename') !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label('lastname', '* Last Name:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('lastname') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('suffix', 'Suffix:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('suffix') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('company', 'Company:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('company') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('title', 'Title:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('title') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    {!! Form::label('note', 'Note:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::text('note') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="col-md-1" style="background-color:white;">
        </div>
        <div class="col-md-5 pull-right" style="background-color:LightCyan; adding:4px;border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:180px">&nbsp;<b>Contact Information</b></h4>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label('currentRole', '* Current Role:') !!} 
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::select('currentRole', $availableRoles, null, ['placeholder' => '--- select one ---']) !!}                    
                </div>
            </div>
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
                    &nbsp;{!! Form::hidden('id') !!}
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
                        {!! Form::submit('Update', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                     <td>&nbsp;</td>
                    <td>                   
                        {!! Form::model($user, ['method' => 'get', 'route' => ['user.show', $user]]) !!}
                        {!! Form::submit('Cancel', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection



