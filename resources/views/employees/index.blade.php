@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Employee Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('employee-create')
	            <a class="btn btn-success" href="{{ route('employees.create') }}"> Create a New Employee</a>
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
		    <th>Employee Number</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Street Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip Code</th>
			<th>Email</th>
			<th>Work Phone Number</th>
			<th>Mobile Phone Number</th>
			<th width="280px">Action</th>
		</tr>
		
		@foreach ($employees as $key => $employee)
		  <tr>
			<td>{{ $employee->employee_number }}</td>
			<td>{{ $employee->last_name }}</td>
			<td>{{ $employee->first_name }}</td>			
			<td>{{ $employee->street_address}}</td>
			<td>{{ $employee->city}}</td>
			<td>{{ $employee->state }}</td>
			<td>{{ $employee->zip}}</td>
			<td>{{ $employee->email}}</td>
			<td>{{ $employee->work_phone}}</td>
			<td>{{ $employee->mobile_phone}}</td>
			
			<td>
            
				<a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>
				@permission('employee-edit')
					<a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
				@endpermission
				
				@permission('employee-delete')
					{!! Form::open(['method' => 'DELETE','route' => ['employees.destroy', $employee->id],'style'=>'display:inline']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				@endpermission
        	

			</td>
		  </tr>
		@endforeach
	</table>
	
	{!! $employees->render() !!}
@endsection