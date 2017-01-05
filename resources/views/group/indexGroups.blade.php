@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<form role='form' name="myRqst" id="myRqst" action='/group/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:70%" border=".5" align="center" >
    <caption><h2>Musicians Manager Groups</h2></caption>
    <tr>
        <th> Group </th>        
        <th> Type </th>
        <th> Status </th>
        <th> Manager </th>
         <th> Action </th>
    </tr>
    @foreach ($groups as $group)
    <tr>
        <td>{{ $group->name }}</td>        
        <td>{{ App\Style::where('id', $group->type)->first()->DESCRIPTION }}</td> 
        @if ($group->status == 1)
        <td>Active</td>
        @else
        <td>Inactive</td>
        @endif
        <td>{{ App\User::where('id', $group->groupleader)->first()->firstname . ' ' . App\User::where('id', $group->groupleader)->first()->lastname }}</td>        
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $group->id }}')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $group->id }}')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                </button>
            </span>
            </form>
        </td>
    </tr>
    @endforeach
</table

@stop
