@extends('layouts/view-users')

@section('view-content')
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
                    {{Form::label('password', 'Password')}}
                    {{ Form::password('password', array('id' => 'password', "class" => "form-control", "placeholder" => "Password")) }}
                </div>

                <div class="form-group">
                    {{Form::label('confirm', 'Confirm Password')}}
                    {{ Form::password('confirm', array('id' => 'password', "class" => "form-control", "placeholder" => "Confirm Password")) }}
                </div>

                {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg pull-right"])}}
    
            {!! Form::close() !!}  
            
        </div>
    </div>
</div>
@endsection