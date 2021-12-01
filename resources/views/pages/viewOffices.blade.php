@extends('layouts/adminviewuser')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View All Events</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-hover table-top-countries">
                <thead class="thead-dark">
                    <tr>
                        <th>Event ID</th>
                        <th>Event Name</th>
                        <!-- <th>Event Date</th>
                        <th>Event Description</th> -->
                    </tr>
                </thead>

                <tbody>

                    @if(count($offices) > 0)
                        @foreach($offices as $office)
                                <tr onclick="window.location='/offices/{{$office->id}}'">
                                    <td>{{$office->office_id}}</td>
                                    <td>{{$office->username}}</td>
                                    <!-- <td>{{$event->event_date}}</td>
                                    <td>{{$event->event_desc}}</td> -->
                                </tr>
                        @endforeach
                    @else 
                        <tr>
                            <td>No events yet</td>
                        </tr>
                    @endif

                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection