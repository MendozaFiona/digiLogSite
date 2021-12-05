@extends('layouts/header')
@php
   use Carbon\Carbon; 
@endphp
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">                   
                            <div class="au-task js-list-load">
                                <div class="au-task__item au-task__item--primary" style = "background-color: #FDB417">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="/viewTodayVisits" style="color: #000;">View Today's Visits</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="au-task__item au-task__item--primary" style = "background-color: #D5D8DB">
                                    @php
                                        $this_date = Carbon::today()->format('Y-m-d');
                                    @endphp
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="{{url('/viewAllVisits?date=').$this_date}}" style="color: #000;">View All Visits</a>
                                        </h5>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        @include('inc.messages')
                        @yield('visit-content')
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
@endsection