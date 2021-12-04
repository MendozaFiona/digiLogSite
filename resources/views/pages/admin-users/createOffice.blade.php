@extends('layouts/register-data')

@section('register-content')
<div class="au-card recent-report">
    <h5 class="title-2">Add Office User</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div>
            {!! Form::open(['action' => 'App\Http\Controllers\OfficeController@store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {{Form::label('name', 'Office Name')}}
                    {{Form::text('office_name', '', ['class' => "form-control", 'placeholder' => "Office Name"])}}
                </div>

                <div class="form-group">
                    {{Form::label('username', 'Username')}}
                    {{Form::text('username', '', ['class' => "form-control", 'placeholder' => "Username"])}}
                </div>

                <div class="form-group">
                    {{Form::label('password', 'Password')}}
                    {{Form::textarea('password', '', ['class' => "form-control", 'placeholder' => "Password"])}}
                </div>

                {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg pull-right"])}}
    
            {!! Form::close() !!}  
            
        </div>
    </div>
</div>
@endsection