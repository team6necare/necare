@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show an Activity</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('activities.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
            
            <tr>
                <td><b>Activity Refno</b></td>
                <td>{{ $activities->activity_refno}}</td>
            </tr>

            <tr>
                <td><b>Activity Desc</b></td>
                <td>{{ $activities->description}}</td>
            </tr>
            
            <!--@if ($activities->activity_type_id == $activity_types->id)
            <tr>
                <td><b>Name</b></td>
                <td>{{ $activity_types->name}}</td>
            </tr>
            @endif


            @if ($activities->activity_type_id == $activity_types->id)
            <tr>
                <td><b>Description</b></td>
                <td>{{ $activity_types->description}}</td>
            </tr>
            @endif
            -->
			
			 @if ($activities->location_id == $locations->id)
            <tr>
                <td><b>Location</b></td>
                <td>{{ $locations->name}}</td>
            </tr>
            @endif
            <tr>
                <td><b>Start DateTime</b></td>
                <td>{{ $activities->start_datetime }}</td>
            </tr>
            <tr>
                <td><b>End DateTime</b></td>
                <td>{{ $activities->end_datetime }}</td>
            </tr>
             <tr>
                <td><b>Status</b></td>
                <td>{{ $activities->status }}</td>
            </tr>
             <tr>
                <td><b>Cost ($)</b></td>
                <td>{{ $activities->cost }}</td>
            </tr>
            
            </tbody>
        </table>
    </div>
@endsection

