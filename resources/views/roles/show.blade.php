@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
            
            <tr>
                <td><b>Name</b></td>
                <td>{{ $role->display_name }}</td>
            </tr>
            <tr>
                <td><b>Description</b></td>
                <td>{{ $role->description }}</td>
            </tr>
            <tr>
                <td><b>Permissions</b></td>
                <td>@if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->display_name }}</label>
                    @endforeach
                @endif</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection

