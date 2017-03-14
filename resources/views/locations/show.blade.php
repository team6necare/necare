@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show a Location </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('locations.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
		    <tr>
                <td><b>Location Code</b></td>
                <td>{{ $locations->location_code}}</td>
            </tr>
            
            <tr>
                <td><b>Name</b></td>
                <td>{{ $locations->name}}</td>
            </tr>
			
            <tr>
                <td><b>Street Address</b></td>
                <td>{{ $locations->street_address }}</td>
            </tr>
			
			<tr>
                <td><b>City</b></td>
                <td>{{ $locations->city }}</td>
            </tr>
			
			<tr>
                <td><b>State</b></td>
                <td>{{ $locations->state}}</td>
            </tr>
			
            <tr>
                <td><b>Zip Code</b></td>
                <td>{{ $locations->zip }}</td>
            </tr>
			
			<tr>
                <td><b>Notes</b></td>
                <td>{{ $locations->notes }}</td>
            </tr>
            
            </tbody>
        </table>
    </div>
@endsection

