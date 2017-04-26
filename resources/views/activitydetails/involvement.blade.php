@extends('layouts.app')
 
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Volunteer involvement</h2>
	        </div>
	        <div class="pull-right" style="margin-bottom:2%" >
	        	<div class="form-group" style="margin-top:25px; margin-right:70px">
	        	{!! Form::open(['url' => 'activitydetails/status','method'=>'POST']) !!}
	            	<div class="col-md-6">
	            	{!! Form::select('activitystatus', array('All'=>'All','Upcoming' => 'Upcoming', 'Ongoing' => 'Ongoing', 'Past' => 'Past'), null, array('class' => 'form-control activities cds-select', 'style' => 'width: 200%; margin-top: 15px;')) !!}
	          

	            </div>
	        </div>
	            	<div>
	            	<button type="submit" class="btn-group pull-right"  style="margin-top:15px; margin-right:5px; margin-bottom: 10px" >Go</button>
	            	</div>
	            	{!! Form::close() !!}
	         </div>
	            	
	     </div>
	</div>

	
	@if ($message = Session::get('success'))
		<div class="alert-success	 alert-success">
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
	</tr>
		
		@foreach ($activitydetails as $key => $activitydetail)
		  <tr>
			<td>{{ $activitydetail->activity->description }}</td>

			<td>{{ $activitydetail->volunteer->last_name}},{{ $activitydetail->volunteer->first_name}}</td>
			<td>{{ $activitydetail->victim->last_name}},{{ $activitydetail->victim->first_name}}</td>
			<td>{{ $activitydetail->employee->last_name}},{{ $activitydetail->employee->first_name}}</td>	

			<td>{{ $activitydetail->activity->start_datetime }}</td>
			<td>{{ $activitydetail->activity->end_datetime }}</td>	
		
		  </tr>
		@endforeach
	</table>

@endsection