@extends('layouts.app')
 
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Volunteer involvement</h2>
	        </div>
	        
	         <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('activitydetails.involvement') }}"> Back</a>
	        </div>
	        
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<div class="container">
	<table class="table table-bordered table-hover">
		<tr>
		    <th>Activity Name</th>
			<th>Volunteer fullname</th>
			
			<th>Victim fullname</th>
			<th>Employee fullname</th>
			<th> Start DateTime</th>
			<th> End DateTime</th>

			
			
		</tr>
		
		@for ($i = 0; $i < sizeof($data); $i++)
		  <tr>
			<td>{{ $data[$i][0]->activity->description }}</td>

			<td>{{ $data[$i][0]->volunteer->last_name}},{{ $data[$i][0]->volunteer->first_name}}</td>
			<td>{{ $data[$i][0]->victim->last_name}},{{ $data[$i][0]->victim->first_name}}</td>
			<td>{{ $data[$i][0]->employee->last_name}},{{ $data[$i][0]->employee->first_name}}</td>	

			<td>{{ $data[$i][0]->activity->start_datetime }}</td>
			<td>{{ $data[$i][0]->activity->end_datetime }}</td>	
		
		  </tr>
		@endfor
	</table>
</div>	
	
@endsection