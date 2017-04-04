@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Volunteer Schedule</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('volunteerschedules.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
            @if ($volunteerschedules->volunteer_id == $volunteers->id)
                
		    <tr>
                <td><b>Volunteer Last Name</b></td>
                <td>{{ $volunteers->last_name}}</td>
            </tr>

            <tr>
                <td><b>Volunteer First Name</b></td>
                <td>{{ $volunteers->first_name}}</td>
            </tr>
            @endif


            <tr>
                <td><b>Valid From</b></td>
                <td>{{ date($volunteerschedules->valid_from)}}</td>
            </tr>

            <tr>
                <td><b>Valid To</b></td>
                <td>{{ $volunteerschedules->valid_to}}</td>
            </tr>
			
            <tr>
                <td><b>Sunday Morning</b></td>
                <td>{{ $volunteerschedules->sunday_morning }}</td>
            </tr>
			
            <tr>
                <td><b>Monday Morning</b></td>
                <td>{{ $volunteerschedules->monday_morning }}</td>
            </tr>

			 <tr>
                <td><b>Tuesday Morning </b></td>
                <td>{{ $volunteerschedules->tuesday_morning }}</td>
            </tr>
			
             <tr>
                <td><b>Wednesday Morning</b></td>
                <td>{{ $volunteerschedules->wednesday_morning }}</td>
            </tr>
			
			<tr>
                <td><b>Thursday Morning</b></td>
                <td>{{ $volunteerschedules->thursday_morning }}</td>
            </tr>
			
			<tr>
                <td><b>Friday Morning</b></td>
                <td>{{ $volunteerschedules->friday_morning }}</td>
            </tr>
			
			<tr>
                <td><b>Saturday Morning</b></td>
                <td>{{ $volunteerschedules->saturday_morning }}</td>
            </tr>


            <tr>
                <td><b>Sunday Afternoon</b></td>
                <td>{{ $volunteerschedules->sunday_afternoon }}</td>
            </tr>
            

            <tr>
                <td><b>Monday Afternoon</b></td>
                <td>{{ $volunteerschedules->monday_afternoon}}</td>
            </tr>

            <tr>
                <td><b>Tuesday Afternoon</b></td>
                <td>{{ $volunteerschedules->tuesday_afternoon }}</td>
            </tr>

            <tr>
                <td><b>Wednesday Afternoon</b></td>
                <td>{{ $volunteerschedules->wednesday_afternoon }}</td>
            </tr>

            <tr>
                <td><b>Thursday Afternoon</b></td>
                <td>{{ $volunteerschedules->thursday_afternoon }}</td>
            </tr>

            <tr>
                <td><b>Friday Afternoon</b></td>
                <td>{{ $volunteerschedules->friday_afternoon }}</td>
            </tr>

            <tr>
                <td><b>Saturday Afternoon</b></td>
                <td>{{ $volunteerschedules->saturday_afternoon }}</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection

