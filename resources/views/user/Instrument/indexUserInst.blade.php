@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div class="row">
    <div class='col-md-12 col-md-offset-1'>
        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Instrument Assignments</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">       
        {!! Form::model($user, ['method' => 'get',  'action' => '/user/', 'route' => ['user.addinstrrequest', $user], 'id' => 'myRqst',  'name' => 'myRqst']) !!}
        {!! Form::hidden('resourceId', '$value', ['id' => '_resourceid']) !!}
        {!! Form::hidden('_method', '$value', ['id' => '_method']) !!}
        {!! csrf_field() !!}
    <!--    <input type="hidden" id="_method" name="_method" value=""></input>-->
        <table style="width:70%" border=".5" align="center" >
            <caption>
                <h4><b>{{ $user->firstname }} {{ $user->lastname }} ({{ $user->username }})</b></h4>
            </caption>
            <tr>
                <th> Instruments </th>
                <th> Mgr Proficiency </th>
                <th> Proficiency </th>
                <th> Solo's </th>
                <th> Last Updated By</th>
                <th> Updated </th>
                <th> Created </th>
                <th> Action </th>
            </tr>
            @foreach ($userResources as $resource)
            <tr>
                <td>{{ $resource->instrument->name }}</td>
                <td>{{ App\Skill::where('id', $resource->mgrskill)->first()->name }}</td>
                <td>{{ App\Skill::where('id', $resource->skill)->first()->name }}</td>
                @if ($resource->solo === 1)
                <td>Yes</td>
                @else
                <td>No</td>
                @endif
                <td>{{ App\User::find($resource->updateuserid)->firstname . ' ' . App\User::find($resource->updateuserid)->lastname }}</td>
                <td>{{$resource->updated_at}}</td>
                <td>{{$resource->created_at}}</td>
                <td style="width: 49px;">
                    <span class="btn-group">
                        <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('getinstr', '{{$user->id}}', '{{$resource->id}}')">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                        </button>
                        <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delinstr', '{{ $user->id }}', '{{$resource->id}}')">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                        </button>
                    </span>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-8">
        &nbsp;
    </div>
    <div class='col-sm-2'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <table border='0'>
            <tr>
                <td>
                    {!! Form::model($user, ['method' => 'get', 'route' => ['user.addinstrrequest', $user]]) !!}
                    {!! Form::submit('Add Instrument', ['class' => 'button']) !!}
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
@endsection


