@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - List Groups';</script>

<form role='form' name="myRqst" id="myRqst" action='/group/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
    <table style="width:70%" border="1.0" align="center" >
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
    </table>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="center70" >
        <div class="row">
            @if ($groups->lastPage() > 0)
            <div  class="col-md-6" align="left" >Page:{{ $groups->currentPage() }} of {{$groups->lastPage() }}</div>
            @else
            <div  class="col-md-6" align="left" >Nothing to display</div>
            @endif
            <!--
            Selecting a new page size will trigger  a submit page action that will reset the list size and return a new
            listing starting with page 1.
            -->
            <div  class="col-md-6" align="right">Lines/Page:{!! Form::select('pageSize', PAGESIZES, $pgSzIndx, ['onchange' => "doSubmit('setPgSz', '$pgSzIndx')"]) !!}</div>
        </div>
        <div class="row">
            <div  class="col-md-6" align="left" >{{ $groups->links() }}</div> 
        </div>
    </div>
</form>

@stop
