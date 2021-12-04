@extends('layouts/header')
    @php
        use App\Models\CampusVisit;
        use App\Models\Office;
    @endphp
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
                                        <a href="/">Scan QR Code</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--danger" style = "background-color: #FDB417">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="/officeVisits">View All Visits</a>
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
                        <div class="au-card-inner">
                            
                            <div class="container w-75 pb-5 pt-5 text-center" style = "background-color: #f6cf659a; border-radius: 20px;">
                                <div class="text-left pl-5 pb-2">
                                    <h3 class="pl-5 pt-2">{{ CampusVisit::name($visit->visit_id) }}</h3>
                                    <div class="row pt-4 pl-5">
                                        <div class="col">
                                            Campus Visit ID: {{$visit->visit_id}}
                                        </div>
                                        <div class="col">
                                            Mobile No: {{ CampusVisit::contact($visit->visit_id) }}
                                        </div>  
                                    </div>
                                    <div class="row pt-2 pl-5">
                                        <div class="col">
                                            Campus Time In: {{ CampusVisit::timeIn($visit->visit_id) }}
                                        </div>
                                        <div class="col">
                                            Visit Purpose: {{ CampusVisit::purpose($visit->visit_id) }}
                                        </div>  
                                    </div>
                                    <div class="row pt-4">
                                        <div class="container w-75 text-center" style = "background-color: #ffffffd3; border-radius: 20px;">
                                            <div class="row pl-5 pt-3">
                                                Office: {{ Office::office($visit->office_id) }}
                                            </div>
                                            <div class="row pl-5 pb-3">
                                                Office Time In: {{ $visit->time_in }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</div>  
@endsection