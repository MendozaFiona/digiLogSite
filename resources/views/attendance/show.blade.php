@extends('layouts/header')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">Input Student</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div>
            {!! Form::open(['action' => ['App\Http\Controllers\AttendanceController@createAttendance', $event->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{Form::label('student_id', 'Student ID')}}
                    {{Form::text('student_id', '', ['class' => "form-control", 'placeholder' => "student id"])}}
                </div>

                <div class="form-group">
                    {{Form::label('event_id', 'Event ID')}}
                    {{Form::text('event_id', $event->id, ['disabled' => 'disabled', 'class' => "form-control", 'placeholder' => "event id"])}}
                </div>

                {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg pull-right"])}}
    
            {!! Form::close() !!}  
            
        </div>
    </div>
</div>
@endsection