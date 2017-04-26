@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Manage Notifications</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('notification-create')
	            <a class="btn btn-success" href="{{ route('notifications.create') }}"> Create a New Notification</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	
	<table class="table table-bordered table-hover">
		<tr>
			<th>Notification Ref No.</th>
            <th>Activity Ref No.</th>
			<th>Activity Description</th>
			<th>Activity Start Date</th>
			<th>Location</th>
			<th>Sent to all Volunteers</th>
			<th>Sent to all Victims</th>
			<th>Sent to all Employees</th>
			<th>Notification Subject</th>
			<th>Notification Message</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($notifications as $key => $notification)
	<tr>
		<td>{{ $notification->reference_number}}</td>
		<td>{{ $notification->activity->activity_refno}}</td>
        <td>{{ $notification->activity->description }}</td>
		<td>{{ $notification->activity->start_datetime }}</td>
		<td>{{ $notification->activity->location->name}}</td>
		<td>{{ $notification->to_all_volunteers}}</td>
		<td>{{ $notification->to_all_victims}}</td>
		<td>{{ $notification->to_all_employees}}</td>
		<td>{{ $notification->notification_subject}}</td>
		<td>{{ $notification->notification_message}}</td>
		<td>
            
			<a class="btn btn-info" href="{{ route('notifications.show',$notification->id) }}">Show</a>
			@permission('notification-edit')
			<a class="btn btn-primary" href="{{ route('notifications.edit',$notification->id) }}">Edit</a>
			@endpermission
			@permission('notification-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['notifications.destroy', $notification->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
        	

		</td>
	</tr>
	@endforeach
	</table>
	{!! $notifications->render() !!}
@endsection