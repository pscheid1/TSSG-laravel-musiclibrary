@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - Register Guest';
</script>

<div><h2>Create a Guest Account</h2></div>
<div class="row">
    <div class="required col-md-12 pull-right">
        <b>(required fields indicated with an *)</b>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        &nbsp;
    </div>
</div>

<div class=""col-md-12>
    {!!Form::open(['method' => 'POST', 'url' => '/auth/register']) !!}
    {!! csrf_field() !!}
    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; border:4px solid blue; border-radius:25px;">
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
                    {!! Form::checkbox('loginpermitted', true, true) !!}
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
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label(null,'Password:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::password('password') !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label(null,'Confirmation:') !!}
                </div>
                <div class="col-md-1 pull-left">
                    {!! Form::password('password_confirmation') !!}
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
        <div class="col-md-5 pull-right" style="background-color:LightCyan; border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:180px">&nbsp;<b>Contact Information</b></h4>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label('currentRole', '* Current Role:') !!} 
                </div>
                <div class="col-md-1 pull-left">
                        {!! Form::select('userRoles[]', ['12' => 'Guest'], 12) !!}
                </div>
            </div>
            {{--
                By adding the following Form::model binding of contact, the contact attributes can be filled with the view.
                Posting the Form::model($user) above, still works the same and sends all the attributes (User and Contact).
            --}}    
            {{--{!! Form::model($contact, ['method' => 'PATCH', 'route' => ['user.update', $user]]) !!}--}}
            
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
                        {!! Form::model(null, ['method' => 'get', 'route' => 'login']) !!}
                        {!! Form::submit('Cancel', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection


