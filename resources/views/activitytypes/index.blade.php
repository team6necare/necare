@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Activity Types</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('activity_type-create')
	            <a class="btn btn-success" href="{{ route('activitytypes.create') }}"> Create New Activity Type</a>
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
			
			<th>Name</th>
			<th>Description</th>
			<th>Minimum participants</th>
			
			<th width="280px">Action</th>
		</tr>
	@foreach ($activity_types as $key => $activitytype)
	<tr>
		<td>{{ $activitytype->name }}</td>
		<td>{{ $activitytype->description }}</td>
		<td>{{ $activitytype->min_participants }}</td>
		<td>
            
			<a class="btn btn-info" href="{{ route('activitytypes.show',$activitytype->id) }}">Show</a>
			@permission('activity_type-edit')
			<a class="btn btn-primary" href="{{ route('activitytypes.edit',$activitytype->id) }}">Edit</a>
			@endpermission
			@permission('activity_type-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['activitytypes.destroy', $activitytype->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
        	

		</td>
	</tr>
	@endforeach
	</table>
	{!! $activity_types->render() !!}
@endsection