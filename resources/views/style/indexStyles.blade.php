@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - List Styles';</script>

<form role='form' name="myRqst" id="myRqst" action='/style/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
    <table style="width:70%" border="1.0" align="center" >
        <caption><h2>Musicians Manager Styles</h2></caption>
        <tr>
            <th> Style </th>
            <th> Last Updated By </th>
            <th> Action </th>
        </tr>
        @foreach ($styles as $style)
        <tr>
            <td>{{ $style->DESCRIPTION }}</td>
            <td>{{ $updaters[$style->id] }}</td>
            <td style="width: 49px;">
                <span class="btn-group">
                    <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $style->id }}')">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                    </button>
                    <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $style->id }}')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                    </button>
                </span>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</table>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="center70" >
        <div class="row">
            @if ($styles->lastPage() > 0)
            <div  class="col-md-6" align="left" >Page:{{ $styles->currentPage() }} of {{$styles->lastPage() }}</div>
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
            <div  class="col-md-6" align="left" >{{ $styles->links() }}</div> 
        </div>
    </div>
</form>

    @stop
