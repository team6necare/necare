@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Activities</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('activity-create')
	            <a class="btn btn-success" href="{{ route('activities.create') }}"> Create New Activity</a>
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
			<th>Activity Refno</th>
            <th>Activity Description</th>
			<th>Location</th>
			<th>Start DateTime</th>
			<th>End DateTime</th>
			<th>Status</th>
			<th>Cost</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($activities as $key => $activity)
	<tr>
		<td>{{ $activity->activity_refno }}</td>
        <td>{{ $activity->description }}</td>
		<td>{{ $activity->location->name}}</td>
		<td>{{ $activity->start_datetime }}</td>
		<td>{{ $activity->end_datetime }}</td>
		<td>{{ $activity->status}}</td>
		<td>{{ $activity->cost}}</td>
		<td>
            
			<a class="btn btn-info" href="{{ route('activities.show',$activity->id) }}">Show</a>
			@permission('activity-edit')
			<a class="btn btn-primary" href="{{ route('activities.edit',$activity->id) }}">Edit</a>
			@endpermission
			@permission('activity-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['activities.destroy', $activity->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
        	

		</td>
	</tr>
	@endforeach
	</table>
	{!! $activities->render() !!}
@endsection