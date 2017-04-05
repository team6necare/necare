@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show an Activity Appointment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('activitydetails.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
           @if ($activitydetails->activity_id == $activities->id)
            <tr>
                <td><b>Activity Name</b></td>
                <td>{{ $activities->description}}</td>
            </tr>
            @endif

            @if ($activitydetails->volunteer_id == $volunteers->id)
            <tr>
                <td><b>Volunteer Name</b></td>
                <td>{{$volunteers->first_name}} {{$volunteers->last_name}}</td>
            </tr>
            @endif

            @if ($activitydetails->victim_id == $victims->id)
            <tr>
                <td><b>Victim Name</b></td>
                <td>{{$victims->first_name}} {{$victims->last_name}}</td>
            </tr>
            @endif

            @if ($activitydetails->employee_id == $employees->id)
            <tr>
                <td><b>Employee Name</b></td>
                <td>{{$employees->first_name}} {{$employees->last_name}}</td>
            </tr>
            @endif

             @if ($activitydetails->activity_id == $activities->id)
            <tr>
                <td><b>Activity Start DateTime</b></td>
                <td>{{ $activities->start_datetime}}</td>
            </tr>
            @endif

             @if ($activitydetails->activity_id == $activities->id)
            <tr>
                <td><b>Activity End DateTime</b></td>
                <td>{{ $activities->end_datetime}}</td>
            </tr>
            @endif

             <tr>
                <td><b>Comments</b></td>
                <td>{{ $activitydetails->comments}}</td>
            </tr>
             <tr>
                <td><b>Feedback</b></td>
                <td>{{ $activitydetails->feedback}}</td>
            </tr>

            
            </tbody>
        </table>
    </div>
@endsection

