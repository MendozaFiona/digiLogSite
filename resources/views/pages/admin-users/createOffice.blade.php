@extends('layouts/register-data')
@php
    use App\Models\Office;
@endphp
@section('register-content')
<div class="au-card recent-report">
    <h5 class="title-2">Add Office User</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div>
            {!! Form::open(['action' => 'App\Http\Controllers\UserController@storeOfficeUser', 'method' => 'POST']) !!}

                <div class="form-group">
                    <div class="pl-4 row">
                        {{Form::label('name', 'Office Name')}}
                    </div>
                    
                    <div class="pl-4 row">
                        {{Form::select('name',
                            Office::officesArray(),
                            ['class' => "form-control row w-100 center-block"])
                    }}
                    </div>
                    
                </div>

                <div class="form-group">
                    {{Form::label('username', 'Username')}}
                    {{Form::text('username', '', ['class' => "form-control", 'placeholder' => "Username"])}}
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