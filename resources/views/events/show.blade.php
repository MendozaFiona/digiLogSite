@extends('layouts/header')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View Event</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-hover table-top-countries">
                <tbody>
                
                    <tr>
                        <td>Event Name</td>
                        <td>{{$event->event_name}}</td>
                    </tr>
                    <tr>
                        <td>Event Date</td>
                        <td>{{$event->event_date}}</td>
                    </tr>
                    <tr>
                        <td>Event Description</td>
                        <td>{{$event->event_desc}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        @if(Auth::user()->role_id == 1)
            {!!Form::open(['action' => ['App\Http\Controllers\EventController@destroy', $event->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Event', ['class' => "btn btn-danger btn-lg pull-left"])}}
            {!!Form::close() !!}

            <a href="/events/{{$event->id}}/edit" class="btn btn-warning btn-lg pull-right">Edit Event</a>
        @endif
    </div>
</div>
@endsection