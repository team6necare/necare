@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show an Activity Type</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('activitytypes.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
            
            <tr>
                <td><b>Name</b></td>
                <td>{{ $activity_types->name}}</td>
            </tr>
            <tr>
                <td><b>Description</b></td>
                <td>{{ $activity_types->description }}</td>
            </tr>
			
			<tr>
                <td><b>Min of Participants</b></td>
                <td>{{ $activity_types->min_participants }}</td>
            </tr>
            
            </tbody>
        </table>
    </div>
@endsection

