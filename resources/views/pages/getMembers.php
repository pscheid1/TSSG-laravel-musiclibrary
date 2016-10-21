@extends('layouts.master')

@section('content')


<div class="relative">
    <h4>Under Construction</h4>

    <p>The feature You have requested is not yet available.</p>
    <p>
        <hr>
        <a href="{{ route('musiclibrary.index') }}" class="btn btn-info">List Songs</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    </p>
</div>

@stop