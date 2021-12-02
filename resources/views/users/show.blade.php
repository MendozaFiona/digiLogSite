@extends('layouts/header')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View User</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-hover table-top-countries">
                <tbody>
                
                    <tr>
                        <td>Username</td>
                        <td>{{$user->username}}</td>
                    </tr>
                    <tr>
                        <td>Student ID</td>
                        <td>{{$user->student_id}}</td>
                    </tr>
                    <tr>
                        <td>User Role</td>
                        <td>{{$user->role_id}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        {!!Form::open(['action' => ['App\Http\Controllers\UserController@destroy', $user->id], 'method' => 'DELETE'])!!}
            {{Form::submit('Delete User', ['class' => "btn btn-danger btn-lg pull-left"])}}
        {!!Form::close() !!}

        <a href="/users/{{$user->id}}/edit" class="btn btn-warning btn-lg pull-right">Edit User</a>

        </div>
</div>
@endsection