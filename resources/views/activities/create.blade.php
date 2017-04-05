@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Schedule an Activity</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('activities.index') }}"> Back</a>
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
	{!! Form::open(array('route' => 'activities.store','method'=>'POST')) !!}
	<div class="row">


	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Activity Refno:</strong>
                {!! Form::text('activity_refno', null, array('placeholder' => 'Activity Refno','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Activity Type:</strong>
                {!! Form::select('activity_type_id', $activity_types, null,['class' => 'form-control']) !!}
            </div>
        </div>
		

       <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::select('activity_type_id', $activity_descs, null,['class' => 'form-control']) !!}
            </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Location:</strong>
				{!!Form::select('location_id', $locations,  null, ['class' => 'form-control'])!!}
			</div>
		</div>    
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Start DateTime:</strong>
               {!! Form::datetime('start_datetime', Carbon\Carbon::now()->format('y-m-d H:i'), array('placeholder' => 'start_datetime','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>End DateTime:</strong>
               
                 {!! Form::datetime('end_datetime', Carbon\Carbon::now()->format('y-m-d H:i'), array('placeholder' => 'send_datetime','class' => 'form-control')) !!}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {!! Form::text('status', null, array('placeholder' => 'Status','class' => 'form-control')) !!}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost: </strong> 
                {!! Form::text('cost', null, array('placeholder' => '$Cost','class' => 'form-control currency')) !!}
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