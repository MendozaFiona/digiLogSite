@php
   use App\Models\CampusVisit; 
   use App\Models\OfficeVisit; 
   use Carbon\Carbon;
@endphp

@extends('layouts/header')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">   

            <div class="row">

                <div class="col-lg-4">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">                   
                        <div class="au-task js-list-load">
                            <div class="au-task__item au-task__item--primary" style = "background-color: #D5D8DB">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="/" style="color: #000;">Scan QR Code</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--primary" style = "background-color: #FDB417">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="/officeVisits" style="color: #000;">View All Visits</a>
                                    </h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @include('pages/sections/statusSection')
                </div>

                <div class="col-lg-8">
                    <div class="au-card recent-report">
                        <h5 class="title-2">View Office Visits</h5>
                    </div>
                
                
                    <div class="au-card au-card-top-countries m-b-40">
                        <p id="date" class="text-center"></p>
                        
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
                            document.getElementById("date").innerText = weekArray[w] + " | " + monthsArray[m] + " " + d + ", " + y;
                        </script>

                        <div class="au-card-inner">
                            <div class="table-responsive">
                                <table class="table table-hover table-top-countries">
                                    @if(count(OfficeVisit::todayOfficeVisits(Carbon::today()->format('Y-m-d'), Auth::user()->office_id)) > 0)
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">Visit ID</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Time In</th>
                                            </tr>
                                        </thead>

                                        <p class="text-center">Number of Visits: {{count(OfficeVisit::todayOfficeVisits(Carbon::today()->format('Y-m-d'), Auth::user()->office_id))}}</p>

                                        <tbody>
                    
                                        
                                            @foreach($officeVisits as $officeVisit)
                                            <!--include if(date == today here)-->
                                                @if($officeVisit->date ==  Carbon::today()->format('Y-m-d'))
                                            
                                                    @if($officeVisit->office_id == Auth::user()->office_id)
                                                        <tr onclick="window.location='/officeVisits/{{$officeVisit->id}}'">
                                                            <td class="text-center">{{$officeVisit->id}}</td>
                                                            <td class="text-center">{{ CampusVisit::name($officeVisit->visit_id) }} </td>
                                                            <td class="text-center">{{$officeVisit->time_in}}</td>
                                                            <!--access db here to display other details such as name, time in, etc.-->
                                                        </tr>
                                                    @endif

                                                @endif
                                            @endforeach
                                        </tbody>
                                    @else 
                                        <p class="text-center">No Visits to Display for Today</p>
                                    @endif
                    
                                        
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</div>

@endsection