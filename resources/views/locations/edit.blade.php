fcit@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit a Location</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('locations.index') }}"> Back</a>
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
	
	{!! Form::model($locations, ['method' => 'PATCH','route' => ['locations.update', $locations->id]]) !!}
	
	<div class="container">
	  <div class="row">
	
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location Code:</strong>
                {!! Form::text('location_code', null, array('placeholder' => 'Location_code','class' => 'form-control')) !!}
            </div>
        </div>
	
	
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
		
	  </div>
	</div>
	{!! Form::close() !!}
@endsection