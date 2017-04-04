@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show an Victim </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('victims.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
		    <tr>
                <td><b>Victim ID</b></td>
                <td>{{ $victims->victim_refno}}</td>
            </tr>
            
            <tr>
                <td><b>Last Name</b></td>
                <td>{{ $victims->last_name}}</td>
            </tr>

            <tr>
                <td><b>First Name</b></td>
                <td>{{ $victims->first_name}}</td>
            </tr>
			
            <tr>
                <td><b>Street Address</b></td>
                <td>{{ $victims->street_address }}</td>
            </tr>
			
			<tr>
                <td><b>City</b></td>
                <td>{{ $victims->city }}</td>
            </tr>
			
			<tr>
                <td><b>State</b></td>
                <td>{{ $victims->state}}</td>
            </tr>
			
            <tr>
                <td><b>Zip Code</b></td>
                <td>{{ $victims->zip }}</td>
            </tr>
			
			<tr>
                <td><b>Email Address</b></td>
                <td>{{ $victims->email }}</td>
            </tr>
			
			<tr>
                <td><b>Home Phone No.</b></td>
                <td>{{ $victims->home_phone }}</td>
            </tr>
			
			<tr>
                <td><b>Mobile Phone No.</b></td>
                <td>{{ $victims->mobile_phone }}</td>
            </tr>

             @if ($victims->cancer_type_id == $cancer_types->id)
            <tr>
                <td><b>Cancer Type</b></td>
                <td>{{ $cancer_types->name}}</td>
            </tr>
            @endif
            
            <tr>
                <td><b>Notes</b></td>
                <td>{{ $victims->notes }}</td>
            </tr>
 

            
            </tbody>
        </table>
    </div>
@endsection

