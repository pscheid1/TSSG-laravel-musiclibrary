@extends('layouts\master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div><h2>Edit User: {{ $user->username }}</h2></div>
<div class=""col-sm-12>
    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user]]) !!}
    <div class="container">
        <div class="row">
            <div class="col-sm-5 pull-left" style="background-color:LightCyan;">
                <h3>Basic Information</h3>
                <div>
                    {!! Form::label(null,'Prefix:') !!}
                </div>
                <div>
                    {!! Form::text('prefix' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'First Name:') !!}
                </div>
                <div>
                    {!! Form::text('firstname' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Middle Name:') !!}
                </div>
                <div>
                    {!! Form::text('middlename' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Last Name:') !!}
                </div>
                <div>
                    {!! Form::text('lastname' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Sufix:') !!}
                </div>
                <div>
                    {!! Form::text('sufix' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'User Name:') !!}
                </div>
                <div>
                    {!! Form::text('username' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Role:') !!}
                </div>
                <div>                
                    {!! Form::select('currentRole', $userRoles, $user->currentRole) !!}
                    @if (Auth::check())
                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('manager'))
                        <span class="btn-group">
                            <button type="button" class="btn btn-default btn-xs" onClick="editRoles()">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span>
                            </button>
                        </span>
                        @endif
                    @endif
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Can Login:') !!}
                    {!! Form::checkbox('usercanlogin' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Company Name:') !!}
                </div>
                <div>
                    {!! Form::text('companyname' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Title:') !!}
                </div>
                <div>
                    {!! Form::text('title' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Note
                    ;') !!}
                </div>
                <div>
                    {!! Form::textarea('note' ) !!}
                </div>
                <p/>

                <div>
                    {!! Form::label(null,'Created at:') !!}
                </div>
                <div>
                    {!! Form::text('created_at', null , ['disabled' => 'true']) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Updated at:') !!}
                </div>
                <div>
                    {!! Form::text('updated_at', null , ['disabled' => 'true']) !!}
                </div>
                <p/>
            </div>
            <div class="col-sm-6 pull-right" style="background-color:LightCyan;">
                <h3>Contact Information</h3>
                <div>
                    {!! Form::label(null,'Address 1:') !!}
                </div>
                <div>
                    {!! Form::text('address1' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Address 2:') !!}
                </div>
                <div>
                    {!! Form::text('address2' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'City:') !!}
                </div>
                <div>
                    {!! Form::text('city' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'State:') !!}
                </div>
                <div>
                    {!! Form::text('state' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Zipcode:') !!}
                </div>
                <div>
                    {!! Form::text('zipcode' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Email:') !!}
                </div>
                <div>
                    {!! Form::text('email' ) !!}
                </div>
                <p/>
                <div>
                    {!! Form::label(null,'Web URL:') !!}
                </div>
                <div>
                    {!! Form::text('url' ) !!}
                </div>
                <p/>

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
                    {!! Form::model($user, ['method' => 'get', 'route' => 'user.index']) !!}
                    {!! Form::submit('Cancel', ['class' => 'button']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        </table>
    </div>
</div>
@stop


