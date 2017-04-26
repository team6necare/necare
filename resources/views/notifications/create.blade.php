@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create a Notification</h2>
	        </div>

	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('notifications.index') }}"> Back</a>
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

	{!! Form::open(array('route' => 'notifications.store','method'=>'POST')) !!}
      <div class="container">

	     <div class="row">


	            <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Notification Ref no:</strong>
                              {!! Form::text('reference_number', null, array('placeholder' => 'Notification Reference No.','class' => 'form-control')) !!}
                        </div>
                  </div>

      
                  <div class="col-xs-12 col-sm-12 col-md-12">
			      <div class="form-group">
				    <strong>Activity:</strong>
				    {!!Form::select('activity_id', $activities,  null, ['class' => 'form-control'])!!}
			      </div>
		      </div> 


 
                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Send to all Volunteers:</strong>
                              {!!Form::checkbox('to_all_volunteers', 'Y', array('class' => 'form-control')) !!}
                        </div>
                  </div> 

                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Send to all Victims:</strong>
                              {!!Form::checkbox('to_all_victims', 'Y', array('class' => 'form-control')) !!}
                        </div>
                  </div> 

                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Send to all Employees:</strong>
                              {!!Form::checkbox('to_all_employees', 'Y', array('class' => 'form-control')) !!}
                        </div>
                  </div> 

                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Notification Subject:</strong>
                              {!! Form::text('notification_subject', null, array('placeholder' => 'Notification Subject','class' => 'form-control')) !!}
                        </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Message:</strong>
                              {!! Form::textarea('notification_message', null, array('placeholder' => 'Notification Message','class' => 'form-control','style'=>'height:100px')) !!}
                        </div>
                  </div>
        
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
  						<button type="submit" class="btn btn-primary">Send Notification</button>                        
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
      </div>
	{!! Form::close() !!}
@endsection