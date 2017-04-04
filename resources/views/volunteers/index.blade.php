@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Volunteer Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('volunteer-create')
	            <a class="btn btn-success" href="{{ route('volunteers.create') }}"> Create a New Volunteer</a>
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
		    <th>Volunteer ID</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Street Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip Code</th>
			<th>Email</th>
			<th>Work Phone Number</th>
			<th>Mobile Phone Number</th>
			<th>Cancer Type</th>
			<th>Notes</th>			
			<th width="280px">Action</th>
		</tr>
		
		@foreach ($volunteers as $key => $volunteer)
		  <tr>
			<td>{{ $volunteer->volunteer_refno }}</td>
			<td>{{ $volunteer->last_name }}</td>
			<td>{{ $volunteer->first_name }}</td>			
			<td>{{ $volunteer->street_address}}</td>
			<td>{{ $volunteer->city}}</td>
			<td>{{ $volunteer->state }}</td>
			<td>{{ $volunteer->zip}}</td>
			<td>{{ $volunteer->email}}</td>
			<td>{{ $volunteer->work_phone}}</td>
			<td>{{ $volunteer->mobile_phone}}</td>
			<td>{{ $volunteer->cancer_type->name}}</td>
			<td>{{ $volunteer->notes}}</td>
			
			<td>
            
				<a class="btn btn-info" href="{{ route('volunteers.show',$volunteer->id) }}">Show</a>
				@permission('volunteer-edit')
					<a class="btn btn-primary" href="{{ route('volunteers.edit',$volunteer->id) }}">Edit</a>
				@endpermission
				
				@permission('volunteer-delete')
					{!! Form::open(['method' => 'DELETE','route' => ['volunteers.destroy', $volunteer->id],'style'=>'display:inline']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				@endpermission
        	

			</td>
		  </tr>
		@endforeach
	</table>
	
	{!! $volunteers->render() !!}
@endsection