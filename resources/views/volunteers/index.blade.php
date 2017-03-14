@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Locations Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('location-create')
	            <a class="btn btn-success" href="{{ route('locations.create') }}"> Create New Location</a>
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
		    <th>Location Code</th>
			<th>Name</th>
			<th>Street Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip Code</th>
			<th>Notes</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($locations as $key => $location)
		  <tr>
			<td>{{ $location->location_code }}</td>
			<td>{{ $location->name }}</td>
			<td>{{ $location->street_address}}</td>
			<td>{{ $location->city}}</td>
			<td>{{ $location->state }}</td>
			<td>{{ $location->zip}}</td>
			<td>{{ $location->notes}}</td>
			
			<td>
            
				<a class="btn btn-info" href="{{ route('locations.show',$location->id) }}">Show</a>
				@permission('location-edit')
					<a class="btn btn-primary" href="{{ route('locations.edit',$location->id) }}">Edit</a>
				@endpermission
				@permission('location-delete')
					{!! Form::open(['method' => 'DELETE','route' => ['locations.destroy', $location->id],'style'=>'display:inline']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				@endpermission
        	

			</td>
		  </tr>
		@endforeach
	</table>
	
	{!! $locations->render() !!}
@endsection