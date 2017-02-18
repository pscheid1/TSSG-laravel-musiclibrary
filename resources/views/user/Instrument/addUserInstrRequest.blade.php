@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - Assign Instrument to Member';
</script>

<div class="row">
    <div class=""col-md-12>       
        {!! Form::model($user, ['method' => 'post', 'route' => ['user.addinstr', $user]]) !!}
        {!! csrf_field() !!}
        {!!Form::hidden('user_id', $user->id)!!}
    <!--    <input type="hidden" id="_method" name="_method" value=""></input>-->
        <table style="width:70%" border="1.0" align="center" >
            <caption>
                <div><h2>Add Instrument to User</h2></div>
                <h4><b>{{ $user->firstname }} {{ $user->lastname }} ({{ $user->username }})</b></h4>
            </caption>
            <tr>
                <th> Instruments </th>
                <th> Mgr Proficiency </th>
                <th> Proficiency </th>
                <th> Solo's </th>
            </tr>
            <tr>
                <td>{!! Form::select('instrument_id', $instruments, null, ['placeholder' => '- - - select one - - -']) !!}</td>
                <td>{!! Form::select('mgrskill', $mgrskill, null, ['placeholder' => '- - - select one - - -']) !!}</td>
                <td>{!! Form::select('skill', $skill, null, ['placeholder' => '- - - select one - - -']) !!}</td>
                <td>{!! Form::select('solo', $solo, null, ['placeholder' => '- - - select one - - -']) !!}</td>
            </tr>
        </table>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-8">
        &nbsp;
    </div>
    <div class='col-sm-2'>
        <table border='0'>
            <tr>
                <td>
                    {!! Form::submit('Add Instrument', ['class' => 'button']) !!}
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

