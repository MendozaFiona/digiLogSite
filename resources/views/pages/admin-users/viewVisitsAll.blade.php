@extends('layouts/view-visits')

@php
    use App\Models\CampusVisit;
@endphp

@section('visit-content')

    <div class="au-card recent-report">
        <h5 class="title-2">View All Visits</h5>
    </div>

    <div class="au-card au-card-top-countries m-b-40">

        <div class="container text-left" style="background-color: #">
            {!! Form::open(['action' => 'App\Http\Controllers\UserController@storeOfficeUser', 'method' => 'POST']) !!}
            <div class="row">

                <div class="form-group">
                    <div class="input-group">
                        {{ Form::label('date', 'Pick Date: ', ['class' => 'pr-3'] ) }}
                        {{ Form::text('date', null, ['class' => 'form-control datepicker pl-2',  'id' =>"datepick"]) }}
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>


                <div class="text-left pl-4">
                    {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg pull-right"])}}
                </div>

            </div>    
            {!! Form::close() !!}  
        </div>

        <p id="datenow" class="text-center"></p>

        <script>
            n =  new Date();
            y = n.getFullYear();
            m = n.getMonth();
            d = n.getDate();
            w = n.getDay();

            monthsArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                'August', 'September', 'October', 'November', 'December'];

            weekArray = ['Sunday', 'Monday', 'Tuesday', 'Wednesday',
                'Thursday', 'Friday', 'Saturday', 'Sunday']
            document.getElementById("datenow").innerText = weekArray[w] + " | " + monthsArray[m] + " " + d + ", " + y;
        </script>

        <div class="au-card-inner">
            <div class="table-responsive">
                <table class="table table-hover table-top-countries">
                    @if(count($campusVisits) > 0)
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Visit ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Time In</th>
                            </tr>
                        </thead>

                        <p class="text-center">Number of Visits: {{count($campusVisits)}}</p>

                        <tbody>
    
                        
                            @foreach($campusVisits as $campusVisit)
                            <!--include if(date == today here)-->
                            
                                        <tr onclick="window.location='/campusVisits/{{$campusVisit->id}}'">
                                            <td class="text-center">{{$campusVisit->id}}</td>
                                            <td class="text-center">{{ CampusVisit::name($campusVisit->id) }} </td>
                                            <td class="text-center">{{$campusVisit->time_in}}</td>
                                            <!--access db here to display other details such as name, time in, etc.-->
                                        </tr>

                            @endforeach
                        </tbody>
                    @else 
                        <p class="text-center">No Visits to Display for Today</p>
                    @endif
    
                        
                    
                </table>
            </div>
        </div>
    </div>

@endsection