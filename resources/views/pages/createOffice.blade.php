@extends('layouts/originaladmin')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">Create Event</h5>
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
                    {{Form::text('username', '', ['class' => "form-control", 'placeholder' => "event date"])}}
                </div>

                <div class="form-group">
                    {{Form::label('event_desc', 'Password')}}
                    {{Form::textarea('event_desc', '', ['class' => "form-control", 'placeholder' => "event description"])}}
                </div>

                {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg pull-right"])}}
    
            {!! Form::close() !!}  
            
        </div>
    </div>
</div>
@endsection