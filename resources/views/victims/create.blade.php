@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New Victim</h2>
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
	{!! Form::open(array('route' => 'victims.store','method'=>'POST')) !!}
	<div class="row">
	     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Victim ID:</strong>
                {!! Form::text('victim_refno', null, array('placeholder' => 'Victim_refno','class' => 'form-control')) !!}
            </div>
        </div>
	
	
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {!! Form::text('last_name', null, array('placeholder' => 'Last_Name','class' => 'form-control')) !!}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {!! Form::text('first_name', null, array('placeholder' => 'First_Name','class' => 'form-control')) !!}
            </div>
        </div>
		
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Street Address:</strong>
                {!! Form::textarea('street_address', null, array('placeholder' => 'Street_address','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control')) !!}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State:</strong>
                {!! Form::text('state', null, array('placeholder' => 'State','class' => 'form-control')) !!}
            </div>
        </div>
		
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zip:</strong>
                {!! Form::text('zip', null, array('placeholder' => 'Zip','class' => 'form-control')) !!}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Home Phone No.:</strong>
                {!! Form::text('home_phone', null, array('placeholder' => 'Home_Phone','class' => 'form-control')) !!}
            </div>
        </div>
		
	
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile Phone No.:</strong>
                {!! Form::text('mobile_phone', null, array('placeholder' => 'Mobile_Phone','class' => 'form-control')) !!}
            </div>
        </div>
	
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<!--{!! Form::select('cancer_type_id', $cancer_types) !!} -->
				<strong>Cancer Type:</strong>
				{!!Form::select('cancer_type_id', $cancer_types,  null, ['class' => 'form-control'])!!}
			</div>
		</div>


		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Notes:</strong>
                {!! Form::text('notes', null, array('placeholder' => 'Notes','class' => 'form-control')) !!}
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