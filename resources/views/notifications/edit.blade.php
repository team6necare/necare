@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit a Notification</h2>
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
	
	{!! Form::model($notifications, ['method' => 'PATCH','route' => ['notifications.update', $notifications->id]]) !!}
	
	<div class="container">
		<div class="row">

	    		<div class="col-xs-12 col-sm-12 col-md-12">
            		<div class="form-group">
                		<strong>Notification Ref No.:</strong>
                		{!! Form::text('reference_number', null, array('placeholder' => 'Reference No.','class' => 'form-control')) !!}
            		</div>
        		</div>


        		<div class="col-xs-12 col-sm-12 col-md-12">
            		<div class="form-group">
                		<strong>Activity:</strong>
               			{!! Form::select('activity_id', $activities, null, ['class' => 'form-control']) !!}
            			</div>
        			</div>
					
				<div class="col-xs-12 col-sm-12 col-md-12"> 
					<table class="table table-bordered table-hover">
						<tr>
							<th>Send to all Volunteers:</th>
						</tr>
						<tr>
							<td>{!! Form::checkbox('to_all_volunteers', 'Y',  null, array('placeholder' => 'to_all_volunteers','class' => 'form-control')) !!}</td>
						</tr>
					</table>
				</div> 
					
				<div class="col-xs-12 col-sm-12 col-md-12"> 
					<table class="table table-bordered table-hover">
						<tr>
							<th>Send to all Victims:</th>
						</tr>
						<tr>
							<td>{!! Form::checkbox('to_all_victims', 'Y',  null, array('placeholder' => 'to_all_victims','class' => 'form-control')) !!}</td>
						</tr>
					</table>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12"> 
					<table class="table table-bordered table-hover">
						<tr>
							<th>Send to all Employees:</th>
						</tr>
						<tr>
							<td>{!! Form::checkbox('to_all_employees', 'Y',  null, array('placeholder' => 'to_all_employees','class' => 'form-control')) !!}</td>
						</tr>
					</table>
				</div>				
					
		        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Notification Subject:</strong>
                              {!! Form::text('notification_subject', null, array('placeholder' => 'Notification Subject.','class' => 'form-control')) !!}
                        </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                              <strong>Message:</strong>
                              {!! Form::textarea('notification_message', null, array('placeholder' => 'Notification Message','class' => 'form-control','style'=>'height:100px')) !!}
                        </div>
                  </div>

        	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Update Notifications</button>
        	</div>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>
	{!! Form::close() !!}
@endsection