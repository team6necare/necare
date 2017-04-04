@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show a Volunteer </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('volunteers.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
		    <tr>
                <td><b>Volunteer ID</b></td>
                <td>{{ $volunteers->volunteer_refno}}</td>
            </tr>
            
            <tr>
                <td><b>Last Name</b></td>
                <td>{{ $volunteers->last_name}}</td>
            </tr>

            <tr>
                <td><b>First Name</b></td>
                <td>{{ $volunteers->first_name}}</td>
            </tr>
			
            <tr>
                <td><b>Street Address</b></td>
                <td>{{ $volunteers->street_address }}</td>
            </tr>
			
			<tr>
                <td><b>City</b></td>
                <td>{{ $volunteers->city }}</td>
            </tr>
			
			<tr>
                <td><b>State</b></td>
                <td>{{ $volunteers->state}}</td>
            </tr>
			
            <tr>
                <td><b>Zip Code</b></td>
                <td>{{ $volunteers->zip }}</td>
            </tr>
			
			<tr>
                <td><b>Email Address</b></td>
                <td>{{ $volunteers->email }}</td>
            </tr>
			
			<tr>
                <td><b>Work Phone No.</b></td>
                <td>{{ $volunteers->work_phone }}</td>
            </tr>
			
			<tr>
                <td><b>Mobile Phone No.</b></td>
                <td>{{ $volunteers->mobile_phone }}</td>
            </tr>

            
     
            @if ($volunteers->cancer_type_id == $cancer_types->id)
            <tr>
                <td><b>Cancer Type</b></td>
                <td>{{ $cancer_types->name}}</td>
            </tr>
            @endif
    

            <tr>
                <td><b>Notes</b></td>
                <td>{{ $volunteers->notes }}</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection

