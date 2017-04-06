@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Volunteer Schedule</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('volunteerschedules.index') }}"> Back</a>
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
	
	{!! Form::model($volunteerschedules, ['method' => 'PATCH','route' => ['volunteerschedules.update', $volunteerschedules->id]]) !!}
	
<div class="container">	

 	<div class="row">
	
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Volunteer:</strong>
              
				{!!Form::select('volunteer_id', $volunteers, null, ['class' => 'form-control'])!!} 
			</div>
		</div>


 		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Valid From:</strong>
                {!! Form::date('valid_from', null, array('placeholder' => 'YYYY-MM-DD','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Validity To:</strong>
                {!! Form::date('valid_to', null, array('placeholder' => 'YYYY-MM-DD','class' => 'form-control')) !!}
            </div>
        </div>
		
		<br><br>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Available As Follows: </strong>
            <br><br>
        </div>

  <!--Sunday-->
        <!--<div class="row">-->
        <div class="col-xs-12 col-sm-12 col-md-12">    
             <strong>Sunday:</strong>
             <br>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Morning:</th>
                    <th>Afternoon:</th>
                </tr>
                <tr>
                    <td>{!! Form::checkbox('sunday_morning', 'Y',  null, array('placeholder' => 'Sunday_morning','class' => 'form-control')) !!}</td>

                    <td>{!! Form::checkbox('sunday_afternoon', 'Y',  null, array('placeholder' => 'Sunday_afternoon','class' => 'form-control')) !!}</td>

                </tr>
            </table>

        </div>

<!--Monday-->
        <div class="col-xs-12 col-sm-12 col-md-12">    
             <strong>Monday:</strong>
             <br>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Morning:</th>
                    <th>Afternoon:</th>
                </tr>
                <tr>
                    <td>{!! Form::checkbox('monday_morning', 'Y',  null, array('placeholder' => 'Monday_morning','class' => 'form-control')) !!}</td>

                    <td>{!! Form::checkbox('monday_afternoon', 'Y',  null, array('placeholder' => 'Monday_afternoon','class' => 'form-control')) !!}</td>

                </tr>
            </table>
        </div>


<!--Tuesday-->
         <div class="col-xs-12 col-sm-12 col-md-12">    
             <strong>Tuesday:</strong>
             <br>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Morning:</th>
                    <th>Afternoon:</th>
                </tr>
                <tr>
                    <td>{!! Form::checkbox('tuesday_morning', 'Y',  null, array('placeholder' => 'Tuesday_morning','class' => 'form-control')) !!}</td>

                    <td>{!! Form::checkbox('tuesday_afternoon', 'Y',  null, array('placeholder' => 'Tuesday_afternoon','class' => 'form-control')) !!}</td>

                </tr>
            </table>
        </div>      

<!--Wednesday-->
        <div class="col-xs-12 col-sm-12 col-md-12">    
             <strong>Wednesday:</strong>
             <br>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Morning:</th>
                    <th>Afternoon:</th>
                </tr>
                <tr>
                    <td>{!! Form::checkbox('wednesday_morning', 'Y',  null, array('placeholder' => 'Wednesday_morning','class' => 'form-control')) !!}</td>

                    <td>{!! Form::checkbox('wednesday_afternoon', 'Y',  null, array('placeholder' => 'Wednesday_afternoon','class' => 'form-control')) !!}</td>

                </tr>
            </table>
        </div>

<!--Thursday-->
         <div class="col-xs-12 col-sm-12 col-md-12">    
             <strong>Thursday:</strong>
             <br>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Morning:</th>
                    <th>Afternoon:</th>
                </tr>
                <tr>
                    <td>{!! Form::checkbox('thursday_morning', 'Y', null, array('placeholder' => 'Thursday_morning','class' => 'form-control')) !!}</td>

                    <td>{!! Form::checkbox('thursday_afternoon', 'Y', null, array('placeholder' => 'Thursday_afternoon','class' => 'form-control')) !!}</td>

                </tr>
            </table>
        </div>

<!--Friday-->
        <div class="col-xs-12 col-sm-12 col-md-12">    
             <strong>Friday:</strong>
             <br>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Morning:</th>
                    <th>Afternoon:</th>
                </tr>
                <tr>
                    <td>{!! Form::checkbox('friday_morning', 'Y',  null, array('placeholder' => 'Friday_morning','class' => 'form-control')) !!}</td>

                    <td>{!! Form::checkbox('friday_afternoon', 'Y',  null, array('placeholder' => 'Friday_afternoon','class' => 'form-control')) !!}</td>

                </tr>
            </table>
        </div>


<!--Saturday-->     
        <div class="col-xs-12 col-sm-12 col-md-12">    
             <strong>Saturday:</strong>
             <br>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Morning:</th>
                    <th>Afternoon:</th>
                </tr>
                <tr>
                    <td>{!! Form::checkbox('saturday_morning', 'Y',  null, array('placeholder' => 'Saturday_morning','class' => 'form-control')) !!}</td>

                    <td>{!! Form::checkbox('saturday_afternoon', 'Y',  null, array('placeholder' => 'Saturday_afternoon','class' => 'form-control')) !!}</td>

                </tr>
            </table>
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
		<br>
		<br>
		<br>
		
	  </div>
	</div>
	<!--</div> *** -->
	{!! Form::close() !!}
@endsection