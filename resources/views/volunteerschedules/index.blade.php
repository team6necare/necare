@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Volunteer Schedule Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('vschedule-create')
	            <a class="btn btn-success" href="{{ route('volunteerschedules.create') }}"> Create a New Schedule for Volunteer</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered table-hover">
		<tr>
		    <th>Volunteer Ref No</th>
			<th>Volunteer Last Name</th>
			<th>First Name</th>
			<th>Valid From</th>		
			<th>Valid To</th>
			<th>Sun am</th>		
			<th>Sun pm</th>		
			<th>Mon am</th>
			<th>Mon pm</th>	
			<th>Tue am</th>
			<th>Tue pm</th>	
			<th>Wed am</th>
			<th>Wed pm</th>	
			<th>Thu am</th>
			<th>Thu pm</th>	
			<th>Fri am</th>	
			<th>Fri pm</th>	
			<th>Sat am</th>	
			<th>Sat pm</th>	
			<th width="280px">Action</th>
		</tr>
		
		@foreach ($volunteerschedules as $key => $volunteerschedule)

		  <tr>  
                <td>{{ $volunteerschedule->volunteer->volunteer_refno }}</td>
				<td>{{ $volunteerschedule->volunteer->last_name }}</td>
				<td>{{ $volunteerschedule->volunteer->first_name }}</td>			
				<td>{{ $volunteerschedule->valid_from}}</td>
				<td>{{ $volunteerschedule->valid_to}}</td>
				<td>{{ $volunteerschedule->sunday_morning}}</td>
				<td>{{ $volunteerschedule->sunday_afternoon}}</td>
				<td>{{ $volunteerschedule->monday_morning}}</td>
				<td>{{ $volunteerschedule->monday_afternoon}}</td>
				<td>{{ $volunteerschedule->tuesday_morning}}</td>
				<td>{{ $volunteerschedule->tuesday_afternoon}}</td>
				<td>{{ $volunteerschedule->wednesday_morning}}</td>
				<td>{{ $volunteerschedule->wednesday_afternoon}}</td>
				<td>{{ $volunteerschedule->thursday_morning}}</td>
				<td>{{ $volunteerschedule->thursday_afternoon}}</td>
				<td>{{ $volunteerschedule->friday_morning}}</td>
				<td>{{ $volunteerschedule->friday_afternoon}}</td>
				<td>{{ $volunteerschedule->saturday_morning}}</td>
				<td>{{ $volunteerschedule->saturday_afternoon}}</td>	
			
			<td>
            
			<a class="btn btn-info" href="{{ route('volunteerschedules.show',$volunteerschedule->id) }}">Show</a>
			
			@permission('vschedule-edit')
				<a class="btn btn-primary" href="{{ route('volunteerschedules.edit',$volunteerschedule->id) }}">Edit</a>
			@endpermission
			
			@permission('vschedule-delete')
				{!! Form::open(['method' => 'DELETE','route' => ['volunteerschedules.destroy', $volunteerschedule->id],'style'=>'display:inline']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			@endpermission
        	

			</td>
		  </tr>
		@endforeach
	</table>
	
	{!! $volunteerschedules->render() !!}
@endsection