@extends('layouts/header')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">Edit User</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div>
            {!! Form::open(['action' => ['App\Http\Controllers\UserController@update', $user->id], 'method' => 'PUT']) !!}

                <div class="form-group">
                    {{Form::label('username', 'Username')}}
                    {{Form::text('username', $user->username, ['class' => "form-control", 'placeholder' => "username"])}}
                </div>

                <div class="form-group">
                    {{Form::label('role_id', 'Role ID')}}
                    {{Form::select('role_id', ['1', '2'], "", ['class' => "form-control"])}}
                </div>

                {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg pull-right"])}}
    
            {!! Form::close() !!}  
            
        </div>
    </div>
</div>
@endsection