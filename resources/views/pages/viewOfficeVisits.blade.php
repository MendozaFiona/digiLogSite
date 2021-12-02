@extends('layouts/header')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">   

            <div class="row">

                <div class="col-lg-4">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">                   
                        <div class="au-task js-list-load">
                            <div class="au-task__item au-task__item--danger" style = "background-color: #D5D8DB">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="/">Scan QR Code</a> <!--route unchanged yet-->
                                    </h5>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--danger" style = "background-color: #FDB417"> <!--route unchanged yet-->
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="/officeVisits">View All Visits</a>
                                    </h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
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
                            document.getElementById("date").innerHTML = weekArray[w] + " | " + monthsArray[m] + " " + d + ", " + y;
                        </script>

                        <div class="au-card-inner">
                            <div class="table-responsive">
                                <table class="table table-hover table-top-countries">
                                    @if(count($officeVisits) > 0)
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Visit ID</th>
                                                <th class="text-right">Name</th>
                                            </tr>
                                        </thead>

                                        <p class="text-center">Number of Visits: {{count($officeVisits)}}</p>

                                        <tbody>
                    
                                        
                                            @foreach($officeVisits as $officeVisit)
                                            <!--include if(date == today here)-->
                                                @if($officeVisit->date ==  Carbon\Carbon::today()->format('Y-m-d'))
                                            
                                                    @if($officeVisit->office_id == Auth::user()->office_id)
                                                        <tr onclick="window.location='/officeVisits/{{$officeVisit->id}}'">
                                                            <td>{{$officeVisit->id}}</td>
                                                            <td class="text-right">test</td>
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