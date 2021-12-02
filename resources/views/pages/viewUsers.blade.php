@extends('layouts/header')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View All Users</h5>
</div>


<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-hover table-top-countries">
                <thead class="thead-dark">
                    <tr>
                        <th>User ID</th>
                        <th class="text-right">Username</th>
                    </tr>
                </thead>

                <tbody>

                    @if(count($users) > 1)
                        @foreach($users as $user)
                            @if($user->role_id != 1)
                                <tr onclick="window.location='/users/{{$user->id}}'">
                                    <td>{{$user->id}}</td>
                                    <td class="text-right">{{$user->username}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @else 
                        <p>No Users</p>
                    @endif

                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection