@extends('layouts\master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<form role='form' name="myRqst" id="myRqst" action='/user/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:70%" border=".5" align="center" >
    <caption><h2>Musicians Manager Users</h2></caption>
    <tr>
        <th> User Name </th>        
        <th> Last Name </th>
        <th> First Name </th>
        <th> Group Memberships </th>
        <th> Instruments </th>
        <th> Current Role </th>
        <th>Can Login</th>
        <th> Action </th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->username }}</td>        
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->firstname }}</td>
        <td>
            @if (count($usrgps[$user->id]) > 0)
                {{ Form::select(null, $usrgps[$user->id]) }}
            @endif
        </td>        
        <td>
            @if (count($instruments[$user->id]) > 0)
                {{ Form::select(null, $instruments[$user->id]) }}
            @endif
            <!--<button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $user->id }}')">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
            </button>-->
        </td>        
        <td>{{ App\Role::where('id', $user->currentRole)->first()->displayname }}</td>
        @if ($user->loginpermitted == 1)
        <td>True</td>
        @else
        <td>False</td>
        @endif
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $user->id }}')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $user->id }}')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                </button>
            </span>
            </form>
        </td>
    </tr>
    @endforeach
</table

@stop
