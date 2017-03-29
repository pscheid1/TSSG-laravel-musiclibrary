@extends('layouts.master')

@section('content')
@include('partials.alerts.errors')
@include('flash::message')
<script>
    document.title = 'Musicians Manager - List Members';</script>
<form role='form' name="myRqst" id="myRqst" action='/user/'   method='POST'>
    <input type="hidden" id="_method" name="_method" value="" />
    <table style="width:100%" border="1" >
        <caption><h2>Musicians Manager Members</h2></caption>
        <tr>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('username', 'User Name') }} </th>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('firstname', 'First Name') }} </th>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('lastname', 'Last Name') }} </th>
            <th> Group Memberships </th>
            <th> Instruments </th>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('currentrole', 'Current Role') }} </th>
            <th> {{ App\Traits\SortableTrait::link_to_sorting_action('loginpermitted', 'Can Login') }} </th>
            <th> Action </th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>        
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>            
            <td>
                @if (count($usrgps[$user->id]) > 0)
                {{-- use select for single line listing, foreach loop for multiple lines --}}                
                {{-- Form::select(null, $usrgps[$user->id]) --}}
                @foreach ($usrgps[$user->id] as $instrument)
                {{$instrument}}<br>
                @endforeach
                
                @endif
            </td>        
            <td>
                @if (count($instruments[$user->id]) > 0)
                {{-- use select for single line listing, foreach loop for multiple lines --}}
                {{-- Form::select(null, $instruments[$user->id]) --}}
                @foreach ($instruments[$user->id] as $instrument)
                {{$instrument}}<br>
                @endforeach
                @endif
                <!--<button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $user->id }}')">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                </button>-->
            </td>        
            <td>{{ App\Role::where('id', $user->currentRole)->first()->displayname }}</td>
            @if ($user->loginpermitted == 1)
            <td>True</td>
            @else
            <td>False</td>
            @endif
            <td style="width: 49px;">
                <span class="btn-group">                   
                    <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('get', '{{ $user->id }}')">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                    </button>
                    <button type="button" class="btn btn-default btn-xs" onClick="doSubmit('delete', '{{ $user->id }}')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                    </button>
                </span>
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
            @if ($users->lastPage() > 0)
            <div  class="col-md-6" align="left" >Page:{{ $users->currentPage() }} of {{$users->lastPage() }}</div>
            @else
            <div  class="col-md-6" align="left" >Nothing to display</div>
            @endif            
            <!--
            Selecting a new page size will trigger  a submit page action that will reset the list size and return a new
            listing starting with page 1.
            -->
            <div  class="col-md-6" align="right">Lines/Page:{!! Form::select('pageSize', PAGESIZES, $pgSzIndx, ['onchange' => "doSubmit('setPgSz', '$pgSzIndx')"]) !!}</div>
        </div>
        <div  class="col-md-6" align="left" >{{ $users->links() }}</div> 
    </div>
</form>    
@stop
