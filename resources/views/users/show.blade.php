@extends('layouts/view-users')

@section('view-content')
<div class="au-card recent-report">
    <h5 class="title-2">View User</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="container w-75" style="background-color: #D5D8DB; border-radius: 20px;">
            <div class="table-responsive">
                <table class="table table-hover table-top-countries">
                    <tbody>
                    
                        <tr>
                            <td class="text-center">Username</td>
                            <td class="text-center">{{$user->username}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">User ID</td>
                            <td class="text-center">{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">User Role</td>
                            <td class="text-center">{{$user->role_id}}</td>
                        </tr>
                        @if ($user->role_id == 1)
                            <tr>
                                <td class="text-center">Admin ID</td>
                                <td class="text-center">{{$user->admin_id}}</td>
                            </tr>
                        @endif
                        @if ($user->role_id == 2)
                            <tr>
                                <td class="text-center">Office ID</td>
                                <td class="text-center">{{$user->office_id}}</td>
                            </tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container w-75 pt-3">
            <div class="col pl-5">
                {!!Form::open(['action' => ['App\Http\Controllers\UserController@destroy', $user->id], 'method' => 'DELETE'])!!}
                    {{Form::submit('Delete User', ['class' => "btn btn-danger btn-lg pull-left"])}}
                {!!Form::close() !!}
            </div>
    
            <div class="col pr-5">
                <a href="/users/{{$user->id}}/edit" class="btn btn-warning btn-lg pull-right">Edit User</a>
            </div>

        </div>

        </div>
</div>
@endsection