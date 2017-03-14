@extends('layouts.app')
@section('content')
    <div class="row">
       <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover" >
            <tbody>
          
            
            <tr>
                <td><b>Name</b></td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td><b>Roles</b></td>
                <td>@if(!empty($user->roles))
                    @foreach($user->roles as $v)
                        <label class="label label-success">{{ $v->display_name }}</label>
                    @endforeach
                @endif</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection

