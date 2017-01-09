@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - Edit Member Proficiency';
</script>

<div class="row">
    <div class=""col-md-12>       
        {!! Form::model($user, ['method' => 'post', 'route' => ['user.updateproficiency', $user]]) !!}
        {!! csrf_field() !!}
        {!! Form::hidden('user_id', $resource->user_id) !!}
        {!! Form::hidden('resourceId', $resource->id) !!}
        {!! Form::hidden('instrument_id', $resource->instrument_id) !!}
        <table style="width:73%" border=".5" align="center" >
            <caption>
                <div><h2>Edit Member Proficiency</h2></div>
                <h4><b>{{ $user->firstname }} {{ $user->lastname }} ({{ $user->username }})</b></h4>
            </caption>
            <tr>
                <th> Instrument </th>
                <th> Mgr Proficiency </th>
                <th> Proficiency </th>
                <th> Solo's </th>
            </tr>
            <tr>
                <td>{!! $instName !!}</td>
                <td>{!! Form::select('mgrskill', $mgrskill, $resource->mgrskill) !!}</td>
                <td>{!! Form::select('skill', $skill, $resource->skill) !!}</td>
                <td>{!! Form::select('solo', $solo, $resource->solo) !!}</td>
            </tr>
        </table>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-9">
    </div>
    <div class='col-md-1 pull-left'>
        <table border='0'>
            <tr>
                <td>
                    {!! Form::submit('Submit', ['class' => 'button']) !!}
                    {!! Form::close() !!}
                </td>
                <td>&nbsp;</td>
                <td>
                    {!! Form::model($user, ['method' => 'get', 'route' => ['user.indexinstr', $user]]) !!}                                        
                    {!! Form::submit('Cancel', ['class' => 'button']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection

