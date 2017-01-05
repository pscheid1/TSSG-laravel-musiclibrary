@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<form role='form' name="myRqst" id="myRqst" action='/musiclibrary/'   method='POST'>
    {{ csrf_field() }} 
    <input type="hidden" id="_method" name="_method" value=""></input>
</form>
<table style="width:98%" border=".5" align="center" >
    <caption><h2>Musicians Manager Music Library</h2></caption>
    <tr>
        <th> Catlog No. </th>
        <th> Title </th>
        <th> Arranger </th>
        <th> Composer </th>
        <th> Style</th>
        <th> Tempo </th>
        <th> Published </th>
        <th> Action </th>
    </tr>
    @foreach ($musiclibrary as $music)
    @if ( $music->CATALOGNUM  === '' )
    @break
    @endif

    <tr>
        <td>{{ $music->CATALOGNUM }}</td>
        <td>{{ $music->TITLE }}</td>
        <td>{{ $music->ARRANGER }}</td>
        <td>{{ $music->COMPOSER }}</td> 
        <td>{{ App\Style::where('id', $music->STYLEID)->first()->DESCRIPTION }}</td>
        <td>{{ App\Tempo::where('id', $music->TEMPOID)->first()->DESCRIPTION }}</td>
        <td>{{ $music->PUBYEAR }}</td>
        <td style="width: 49px;">
            <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $music->id }}')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>
                <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $music->id }}')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                </button>
            </span>
            </form>
        </td>
    </tr>
    @endforeach
</table

@stop
