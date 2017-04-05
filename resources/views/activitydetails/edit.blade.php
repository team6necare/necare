@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit an Activity Appointment</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('activitydetails.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
	{!! Form::model($activitydetails, ['method' => 'PATCH','route' => ['activitydetails.update', $activitydetails->id]]) !!}
	
	<div class="container">
	<div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Activity Name:</strong>
                {!! Form::select('activity_id', $activities, null,['class' => 'form-control']) !!}
            </div>
        </div>
		
	 	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Volunteer FullName:</strong>
                {!! Form::select('volunteer_id', $volunteers, null,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Victim FullName:</strong>
                {!! Form::select('victim_id', $victims, null,['class' => 'form-control']) !!}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee FullName:</strong>
                {!! Form::select('employee_id', $employees, null,['class' => 'form-control']) !!}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Activity Start DateTime:</strong>
                {!! Form::select('activity_id', $startdatetimes, null,['class' => 'form-control']) !!}
            </div>
        </div>

           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Activity End DateTime:</strong>
                {!! Form::select('activity_id', $enddatetimes, null,['class' => 'form-control']) !!}
            </div>
        </div>



		
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
		<br>
		<br>
		<br>
		<br>
	</div>
	</div>
	{!! Form::close() !!}
@endsection