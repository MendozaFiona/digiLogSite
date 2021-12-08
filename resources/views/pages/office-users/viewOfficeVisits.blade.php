@php
   use App\Models\CampusVisit; 
   use App\Models\OfficeVisit; 
   use App\Models\Office; 
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
                                @php
                                    $this_date = Carbon::today()->format('Y-m-d');
                                @endphp
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="{{url('/officeVisits?date=').$this_date."+-+".$this_date}}" style="color: #000;">View All Visits</a>
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
                        <div class="row">
                            <div class="col">
                                <div class="container text-left" style="background-color: #">

                                    @php
                                        $this_date = request()->input('date');
                                    @endphp
                                    
                                    {!! Form::open(array('url' => url('/officeVisits?date=').$this_date, 'method' => 'get')) !!}
                                    
                                    <div class="row">
                        
                                        <div class="form-group">
                                            <div class="input-group">
                                                {{ Form::label('date', 'Pick Date: ', ['class' => 'pr-3'] ) }}
                                                {{ Form::text('date', $startDate." - ".$endDate, ['class' => 'form-control datepicker pl-2',  'id' => "datepick",
                                                    'name' => "date", 'readonly' =>"readonly", ]) }}
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-white">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                        
                        
                                        <div class="text-left pl-4">
                                            {{Form::submit('Go', ['class' => "btn btn-primary btn-lg pull-right"])}}
                                        </div>
                        
                                    </div>    
                                    {!! Form::close() !!}
                        
                                </div>
                            </div>
                            <div class="col">
                                <div class="container text-right">
                                    <div class="col">
                                        <input type="button" class="btn btn-secondary" value="Save Table as PDF" onclick="printDiv()">
                                    </div>
                                    <div class="col">
                                        <input type="button" class="btn btn-secondary" value="Export Table to Sheet" onclick="exportTableToExcel()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $displayStart = date('F d, Y', strtotime($startDate));
                            $displayEnd = date('F d, Y', strtotime($endDate));
                            $startWeekday = date("l", strtotime($startDate));
                            $endWeekday = date("l", strtotime($endDate));
                        @endphp

                        <div id="pdfprint">

                            <p class="text-center">{{$startWeekday}} | {{$displayStart}} : {{$endWeekday}} | {{$displayEnd}}</p>

                            <div class="au-card-inner">
                                <div class="table-responsive">
                                    <table id="tblData" class="table table-hover table-top-countries">
                                        @if(count($officeVisits) > 0)
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">Office</th>
                                                    <th class="text-center">Visit ID</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Time In</th>
                                                </tr>
                                            </thead>

                                            <p class="text-center">Number of Visits: {{count($officeVisits)}}</p>

                                            <tbody>
                        
                                            
                                                @foreach($officeVisits as $officeVisit)
                                                            <tr>
                                                                <td class="text-center">{{ Office::office($officeVisit->office_id) }}</td>
                                                                <td class="text-center">{{$officeVisit->id}}</td>
                                                                <td class="text-center">{{ CampusVisit::name($officeVisit->visit_id) }} </td>
                                                                <td class="text-center">{{$officeVisit->time_in}}</td>
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
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</div>

@endsection