@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Victim Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('victim-create')
	            <a class="btn btn-success" href="{{ route('victims.create') }}"> Create a New Victim</a>
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
		    <th>Victim ID</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Street Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip Code</th>
			<th>Email</th>
			<th>Home Phone Number</th>
			<th>Mobile Phone Number</th>
			<th>Cancer Type</th>
			<th>Notes</th>
			<th width="280px">Action</th>
		</tr>
		
		@foreach ($victims as $key => $victim)
		  <tr>
			<td>{{ $victim->victim_refno }}</td>
			<td>{{ $victim->last_name }}</td>
			<td>{{ $victim->first_name }}</td>			
			<td>{{ $victim->street_address}}</td>
			<td>{{ $victim->city}}</td>
			<td>{{ $victim->state }}</td>
			<td>{{ $victim->zip}}</td>
			<td>{{ $victim->email}}</td>
			<td>{{ $victim->home_phone}}</td>
			<td>{{ $victim->mobile_phone}}</td>
			<td>{{ $victim->cancer_type->name}}</td>
			<td>{{ $victim->notes}}</td>			
			<td>
            
				<a class="btn btn-info" href="{{ route('victims.show',$victim->id) }}">Show</a>
				@permission('victim-edit')
					<a class="btn btn-primary" href="{{ route('victims.edit',$victim->id) }}">Edit</a>
				@endpermission
				
				@permission('victim-delete')
					{!! Form::open(['method' => 'DELETE','route' => ['victims.destroy', $victim->id],'style'=>'display:inline']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				@endpermission
        	

			</td>
		  </tr>
		@endforeach
	</table>
	
	{!! $victims->render() !!}
@endsection