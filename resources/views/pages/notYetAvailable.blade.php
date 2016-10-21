@extends('layouts.master')

@section('content')


<div class="relative">
    <b><h4>Under Construction</h4></b>
    <img src="images/underconstr.jpg" alt="" style="width:100px;height:100px;" />
    
    <br /> <br /> <br />
    <b><p>The feature You have requested is not yet available.</p></b>
    <p>
        <hr>
        <a href="{{ route('musiclibrary.index') }}" class="btn btn-info">List Songs</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    </p>
</div>

@stop