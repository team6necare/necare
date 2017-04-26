@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show a Notification</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('notifications.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
            
            <tr>
                <td><b>Notification Ref No.</b></td>
                <td>{{ $notifications->reference_number}}</td>
            </tr>

		
			 @if ($notifications->activity_id == $activities->id)
                <tr>
                    <td><b>Activity Ref No.</b></td>
                    <td>{{ $activities->activity_refno}}</td>
                </tr>

                <tr>
                    <td><b>Activity Description</b></td>
                    <td>{{ $activities->description }}</td>
                </tr>

                 <tr>
                    <td><b>Activity Start DateTime</b></td>
                    <td>{{ $activities->start_datetime }}</td>
                </tr>
                 
                 <tr>
                            <td><b>Location</b></td>
                            <td>{{ $locations->name }}</td>
                 </tr>



            @endif
            <tr>
                <td><b>Sent to All Volunteers </b></td>
                <td>{{ $notifications->to_all_volunteers }}</td>
            </tr>

            <tr>
                <td><b>Sent to All Victims </b></td>
                <td>{{ $notifications->to_all_victims }}</td>
            </tr>

            <tr>
                <td><b>Sent to All Employees </b></td>
                <td>{{ $notifications->to_all_employees }}</td>
            </tr>
           
           <tr>
                <td><b>Notification Subject </b></td>
                <td>{{ $notifications->notification_subject }}</td>
            </tr>

            <tr>
                <td><b>Notification Message </b></td>
                <td>{{ $notifications->notification_message }}</td>
            </tr>
            
            </tbody>
        </table>
    </div>


@endsection

