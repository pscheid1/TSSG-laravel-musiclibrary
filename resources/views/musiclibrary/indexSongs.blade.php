@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<script>
    document.title = 'Musicians Manager - List Songs';</script> 

<form role='form' name="myRqst" id="myRqst" action='/musiclibrary/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value="">
    <table style="width:100%" border="1" >
        <caption><h2>Musicians Manager Music Library</h2></caption>
        <tr>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('CATALOGNUM', 'Catlog No. ') }} </th>  
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('TITLE', 'Title') }} </th>  
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('ARRANGER', 'Arranger') }} </th>  
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('COMPOSER', 'Composer') }} </th>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('STYLEID', 'Style') }} </th>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('TEMPOID', 'Tempo') }} </th>  
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('PUBLISHER', 'Published') }} </th>  
            <th> Action </th>
        </tr>
        @foreach ($songs as $song)
        @if ( $song->CATALOGNUM  === '' )
        @break
        @endif

        <tr>
            <td>{{ $song->CATALOGNUM }}</td>
            <td>{{ $song->TITLE }}</td>
            <td>{{ $song->ARRANGER }}</td>
            <td>{{ $song->COMPOSER }}</td> 
            <td>{{ App\Style::where('id', $song->STYLEID)->first()->DESCRIPTION }}</td>
            <td>{{ App\Tempo::where('id', $song->TEMPOID)->first()->DESCRIPTION }}</td>
            <td>{{ $song->PUBYEAR }}</td>
            <td style="width: 49px;">
                <span class="btn-group">
                    <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $song->id }}')">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                    </button>
                    <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $song->id }}')">
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
    <div class="row">
        <div>
            @if ($songs->lastPage() > 0)
            <div  class="col-md-6" align="left" >Page:{{ $songs->currentPage() }} of {{$songs->lastPage() }}</div>
            @else
            <div  class="col-md-6" align="left" >Nothing to display</div>
            @endif            
            <!--
            Selecting a new page size will trigger  a submit page action that will reset the list size and return a new
            listing starting with page 1.
            -->
            <div  class="col-md-6" align="right">Lines/Page:{!! Form::select('pageSize', PAGESIZES, $pgSzIndx, ['onchange' => "doSubmit('setPgSz', '$pgSzIndx')"]) !!}</div>
        </div>
        <div  class="col-md-6" align="left" >{{ $songs->links() }}</div> 
    </div>
</form>
@stop
