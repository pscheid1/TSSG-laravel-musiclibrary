@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - List Tempos';</script>

<form role='form' name="myRqst" id="myRqst" action='/tempo/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
    <table style="width:70%" border="1.0" align="center" >
        <caption><h2>Musicians Manager Tempos</h2></caption>
        <tr>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('DESCRIPTION', 'Tempo') }} </th>   
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('UPDATEUSERID', 'Last Updated By') }} </th>   
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
    </table>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="center70" >
        <div class="row">
            @if ($tempos->lastPage() > 0)
            <div  class="col-md-6" align="left" >Page:{{ $tempos->currentPage() }} of {{$tempos->lastPage() }}</div>
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
            <div  class="col-md-6" align="left" >{{ $tempos->links() }}</div> 
        </div>
    </div>
</form>
@stop
