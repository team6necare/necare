@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show an Employee </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
		    <tr>
                <td><b>Employee ID</b></td>
                <td>{{ $employees->employee_number}}</td>
            </tr>
            
            <tr>
                <td><b>Last Name</b></td>
                <td>{{ $employees->last_name}}</td>
            </tr>

            <tr>
                <td><b>First Name</b></td>
                <td>{{ $employees->first_name}}</td>
            </tr>
			
            <tr>
                <td><b>Street Address</b></td>
                <td>{{ $employees->street_address }}</td>
            </tr>
			
			<tr>
                <td><b>City</b></td>
                <td>{{ $employees->city }}</td>
            </tr>
			
			<tr>
                <td><b>State</b></td>
                <td>{{ $employees->state}}</td>
            </tr>
			
            <tr>
                <td><b>Zip Code</b></td>
                <td>{{ $employees->zip }}</td>
            </tr>
			
			<tr>
                <td><b>Email Address</b></td>
                <td>{{ $employees->email }}</td>
            </tr>
			
			<tr>
                <td><b>Work Phone No.</b></td>
                <td>{{ $employees->work_phone }}</td>
            </tr>
			
			<tr>
                <td><b>Mobile Phone No.</b></td>
                <td>{{ $employees->mobile_phone }}</td>
            </tr>
			
            </tbody>
        </table>
    </div>
@endsection

