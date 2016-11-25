@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')

<div class="relative">
    <h4><b>Welcome to the Musicians' Manager Website</b></h4>

    <p>This site is for use by the band manager to schedule events, to manage the music library, to create music set lists and to manage the band membership.  It is also used by the band members to view the event information, to
        communicate their availability and to download music set lists and music sheets (pdf files).</p>
    <p>As a visiting musician, the most common feature to access is the "Musician Response" action, which is available under the "Events" menu item.</p>
</div>
{{--
<hr>
<a href="{{ route('home') }}" class="btn btn-info">View Tasks</a>
<a href="{{ route('home') }}" class="btn btn-primary">Add New Task</a>
--}}

@stop