@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<form role='form' name="myRqst" id="myRqst" action='/tempo/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:70%" border=".5" align="center" >
    <caption><h2>Musicians Manager Tempos</h2></caption>
    <tr>
        <th> Tempo </th>
        <th> Last Updated By </th>
        <th> Action </th>
   </tr>
    @foreach ($tempos as $tempo)
    <tr>
        <td>{{ $tempo->DESCRIPTION }}</td>
        <td>{{ $updaters[$tempo->id] }}</td>
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $tempo->id }}')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $tempo->id }}')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                </button>
            </span>
            </form>
        </td>
    </tr>
    @endforeach
</table

@stop
