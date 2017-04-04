@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New Activity details</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('victims.index') }}"> Back</a>
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
	{!! Form::open(array('route' => 'activitydetails.store','method'=>'POST')) !!}
	<div class="row">
	     
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				
				<strong>Activity Num:</strong>
				{!!Form::select('activity_id', $activities,  null, ['class' => 'form-control'])!!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				
				<strong>Volunteer Id:</strong>
				{!!Form::select('volunteer_id', $volunteers,  null, ['class' => 'form-control'])!!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				
				<strong>Victim Id:</strong>
				{!!Form::select('victim_id', $victims,  null, ['class' => 'form-control'])!!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				
				<strong>Employee Id:</strong>
				{!!Form::select('employee_id', $employees,  null, ['class' => 'form-control'])!!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comments</strong>
                {!! Form::textarea('comments', null, array('placeholder' => 'Comments','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Feedback</strong>
                {!! Form::textarea('feedback', null, array('placeholder' => 'Feedback','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>




		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
        </div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
	</div>
	{!! Form::close() !!}
@endsection