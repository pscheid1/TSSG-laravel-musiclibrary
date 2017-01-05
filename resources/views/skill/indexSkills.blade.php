@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<form role='form' name="myRqst" id="myRqst" action='/skill/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:70%" border=".5" align="center" >
    <caption><h2>Musicians Manager Proficiencies</h2></caption>
    <tr>
        <th> Proficiency </th>
        <th> Last Updated By </th>
        <th> Action </th>
   </tr>
    @foreach ($skills as $skill)
    <tr>
        <td>{{ $skill->name }}</td>
        <td>{{ $updaters[$skill->id] }}</td>
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $skill->id }}')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $skill->id }}')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                </button>
            </span>
            </form>
        </td>
    </tr>
    @endforeach
</table

@stop
