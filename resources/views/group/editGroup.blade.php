@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - Edit Group';
</script>

<div class="col-md-12">
    <div class="col-md-5 pull-left">
        <h2>Edit Group: {{ $group->name }}</h2>
        <div class="row">
            <div class="required col-md-12 pull-right">
                <b>(required fields indicated with an *)</b>
                <br></br>
            </div>
        </div>
    </div>
</div>

<div class=""col-md-12>
    {!! Form::model($group, ['method' => 'patch', 'route' => ['group.update', $group]]) !!}
    <div class="container">
        <div class="col-md-5 pull-left" style="background-color:LightCyan; border:4px solid blue; border-radius:25px;">
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
                    {!! Form::select('type',  $types, $group->type) !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label(null,'* Status:') !!}
                </div>
                <div class="col-md-1 pull-left">				
                    {!! Form::select('status',  $status, $group->status) !!}
                </div>
            </div>
            <div class="row">
                <div class="required col-md-4 col-md-offset-1">
                    {!! Form::label(null,'* Group Leader:') !!}
                </div>
                <div class="col-md-1 pull-left">				
                    {!! Form::select('groupleader',  $managers, $group->groupleader) !!}
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
        <div class="col-md-1" style="background-color:white;">
        </div>
        <div class="col-md-5 pull-right" style="background-color:LightCyan; border:4px solid blue; border-radius:25px;">
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
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                &nbsp;
            </div>
        </div>
        <div class="col-md-5 pull-left" style="background-color:LightCyan; border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:172px">&nbsp;<b>Group Membership </b></h4>
            <div class="row">
                <div class="col-md-5 col-md-offset-1 selectBox">
                    {!! Form::label(null,'Members:', ['data-toggle' => 'tooltip', 'title' => 'Listed below are all the users currently assigned to this group.']) !!}
                    {!! Form::select('membership[]', $members, null, ['multiple' => 'multiple', 'name' => 'membership[]', 'size' => '10', 'class' => 'selectbox']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
            Select one or more members to delete from the group.
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="col-md-5 pull-right" style="background-color:LightCyan; border:4px solid blue; border-radius:25px;">
            <h4 style="margin-top: -10px; background:white; width:318px">&nbsp;<b>Musicians Available for Membership </b></h4>
            <div class="row">
                <div class="col-md-5 col-md-offset-1 selectBox">
                    {!! Form::label(null,'Available Musicians:', ['data-toggle' => 'tooltip', 'title' => 'Listed below are all the users with the role Musician that are not currently members of this group.']) !!}
                    {!! Form::select('available[]', $available, null, ['multiple' => 'multiple', 'name' => 'available[]', 'size' => '10', 'class' => 'selectbox']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
            Select one or more available members to add to the group.
            <div class="row">
                <div class="col-md-5">
                    &nbsp;
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
                            {!! Form::submit('Update', ['class' => 'button']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            {!! Form::model($group, ['method' => 'get', 'route' => 'group.index']) !!}
                            {!! Form::submit('Cancel', ['class' => 'button']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endsection



