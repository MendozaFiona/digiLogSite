@extends('layouts/header')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">Edit Event</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div>
            {!! Form::open(['action' => ['App\Http\Controllers\EventController@update', $event->id], 'method' => 'PUT']) !!}
        
                <div class="form-group">
                    {{Form::label('event_name', 'Event Name')}}
                    {{Form::text('event_name', $event->event_name, ['class' => "form-control", 'placeholder' => "event name"])}}
                </div>

                <div class="form-group">
                    {{Form::label('event_date', 'Event Date')}}
                    {{Form::text('event_date', $event->event_date, ['class' => "form-control", 'placeholder' => "event date"])}}
                </div>

                <div class="form-group">
                    {{Form::label('event_desc', 'Event Description')}}
                    {{Form::textarea('event_desc', $event->event_desc, ['class' => "form-control", 'placeholder' => "event description"])}}
                </div>

                {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg pull-right"])}}
    
            {!! Form::close() !!}  
            
        </div>
    </div>
</div>
@endsection