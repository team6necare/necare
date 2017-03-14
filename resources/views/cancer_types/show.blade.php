@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show CancerType</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cancer_types.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
            
            <tr>
                <td><b>Name</b></td>
                <td>{{ $cancer_types->name}}</td>
            </tr>
            <tr>
                <td><b>Description</b></td>
                <td>{{ $cancer_types->description }}</td>
            </tr>
            
            </tbody>
        </table>
    </div>
@endsection

