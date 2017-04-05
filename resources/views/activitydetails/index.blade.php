@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Activity Appointment Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('activitydetail-create')
	            <a class="btn btn-success" href="{{ route('activitydetails.create') }}"> Create a New Activity Appointment</a>
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
		    <th>Activity Name</th>
			<th>Volunteer fullname</th>
			
			<th>Victim fullname</th>
			<th>Employee fullname</th>
			<th> Start DateTime</th>
			<th> End DateTime</th>
			<th>comments</th>
			<th>feedback</th>
			
			<th width="280px">Action</th>
		</tr>
		
		@foreach ($activitydetails as $key => $activitydetail)
		  <tr>
			<td>{{ $activitydetail->activity->description }}</td>

			<td>{{ $activitydetail->volunteer->last_name}},{{ $activitydetail->volunteer->first_name}}</td>
			<td>{{ $activitydetail->victim->last_name}},{{ $activitydetail->victim->first_name}}</td>
			<td>{{ $activitydetail->employee->last_name}},{{ $activitydetail->employee->first_name}}</td>	

			<td>{{ $activitydetail->activity->start_datetime }}</td>
			<td>{{ $activitydetail->activity->end_datetime }}</td>	
			<td>{{ $activitydetail->comments}}</td>
			<td>{{ $activitydetail->feedback }}</td>			
			<td>
            
				<a class="btn btn-info" href="{{ route('activitydetails.show',$activitydetail->id) }}">Show</a>
				@permission('activitydetail-edit')
					<a class="btn btn-primary" href="{{ route('activitydetails.edit',$activitydetail->id) }}">Edit</a>
				@endpermission
				
				@permission('activitydetail-delete')
					{!! Form::open(['method' => 'DELETE','route' => ['activitydetails.destroy', $activitydetail->id],'style'=>'display:inline']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				@endpermission
        	

			</td>
		  </tr>
		@endforeach
	</table>
	
	{!! $activitydetails->render() !!}
@endsection