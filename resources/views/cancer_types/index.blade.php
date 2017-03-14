@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Cancer Types Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('cancer_type-create')
	            <a class="btn btn-success" href="{{ route('cancer_types.create') }}"> Create New Cancer Type</a>
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
			<th>Name</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($cancer_types as $key => $cancer_type)
	<tr>
		<td>{{ $cancer_type->name }}</td>
		<td>{{ $cancer_type->description }}</td>
		<td>
            
			<a class="btn btn-info" href="{{ route('cancer_types.show',$cancer_type->id) }}">Show</a>
			@permission('cancer_type-edit')
			<a class="btn btn-primary" href="{{ route('cancer_types.edit',$cancer_type->id) }}">Edit</a>
			@endpermission
			@permission('cancer_type-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['cancer_types.destroy', $cancer_type->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
        	

		</td>
	</tr>
	@endforeach
	</table>
	{!! $cancer_types->render() !!}
@endsection