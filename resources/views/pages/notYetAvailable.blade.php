@extends('layouts.master')

@section('content')

<script>
    document.title = 'Musicians Manager - Under Construction';
</script>

<div class="relative">
    <h4><b>Under Construction</b></h4>
    <img src="/images/underconstr.jpg" alt="" style="width:100px;height:100px;" />
    
    <br /> <br /> <br />
    <b><p>The feature you have requested is not yet available.</p></b>
    <p>
        <hr>
        <a href="{{ route('musiclibrary.index') }}" class="btn btn-info">List Songs</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    </p>
</div>

@stop