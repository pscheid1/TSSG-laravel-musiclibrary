@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div class="container">
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <div class="col-sm-6 pull-left" style="background-color:LightCyan;">
                <div class="panel panel-default">
                    <div class="panel-heading">Basic Information</div>
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prefix') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Prefix</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="prefix" value="{{ old('prefix') }}">

                                @if ($errors->has('prefix'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('prefix') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">

                                @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="middlename" value="{{ old('middlename') }}">

                                @if ($errors->has('middlename'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('middlename') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">

                                @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sufix') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Sufixx</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sufix" value="{{ old('sufix') }}">

                                @if ($errors->has('sufix'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sufix') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location" value="{{ old('location') }}">

                                @if ($errors->has('location'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="companyname" value="{{ old('companyname') }}">

                                @if ($errors->has('companyname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('companyname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Note</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="note" value="{{ old('note') }}">

                                @if ($errors->has('note'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('note') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-1 style="white;">
            </div>

            <div class="col-sm-5 pull-right" style="background-color:LightCyan;">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact Information</div>
                    <div class="panel-body">

                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Role</label>
                        <div class="col-md-5">
                            {!! Form::select('role', $rolesAdd, null,
                            ['class' => 'form-control',
                            'multiple' => 'multiple']) !!}
                            @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                        <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address 1</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="address1" value="{{ old('address1') }}">

                                @if ($errors->has('address1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address 2</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="address2" value="{{ old('address2') }}">

                                @if ($errors->has('address2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">City</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="city" value="{{ old('state') }}">

                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">State</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="state" value="{{ old('state') }}">

                                @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Zip</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="zip" value="{{ old('zip') }}">

                                @if ($errors->has('zip'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('zip') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Phone 1</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="phone1" value="{{ old('phone1') }}">

                                @if ($errors->has('phone1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phonet') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Phone 2</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="phone2" value="{{ old('phone2') }}">

                                @if ($errors->has('phone2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weburl') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Web URL</label>

                            <div class="col-md-5">
                                <input type="email" class="form-control" name="weburl" value="{{ old('weburl') }}">

                                @if ($errors->has('weburl'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('weburl') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                            

                    </div>
                </div>
            </div>

    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>Register
            </button>
        </div>
    </div>
</form>

</div>
@endsection
