@extends('layouts/view-visits')

@php
    use App\Models\CampusVisit;
    use App\Models\Office;
    use Carbon\Carbon; 
@endphp

@section('visit-content')

    <div class="au-card recent-report">
        <h5 class="title-2">View All Visits</h5>
    </div>

    <div class="au-card au-card-top-countries m-b-40">

        <div class="row">
            <div class="col">
                <div class="container text-left" style="background-color: #">

                    @php
                        $this_date = request()->input('date');
                        if($nameQuery == null){
                            $nameQuery = "";
                        }
                    @endphp
                    
                    {!! Form::open(array('url' => url('/viewAllVisits?date=').$this_date, 'method' => 'get')) !!}

                    <div class="row">

                        <div class="col md-6">
                            <div class="form-group">
                                <div class="row">
                                    {{Form::label('name', 'Search Name')}}
                                </div>
                                <div class="row">
                                    {{Form::text('name', $nameQuery, ['class' => "form-control", 'placeholder' => "Name"])}}
                                </div>
                            </div>
                        </div>
                        <div class="pl-2 col md-6">
                            <div class="form-group">
                                <div class="row">
                                    {{Form::label('office', 'Office Name')}}
                                </div>
                                
                                <div class="row" style="font-size: 14px;">
                                    {{Form::select('office',
                                        [-1 => "All", 'Office Names' => Office::officesArray()],
                                        $officeQuery,
                                        ['class' => "form-control",])
                                }}
                                </div>
                                
                            </div>
                        </div>

                    </div>

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

            <div class="col pt-5">
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
                        @if(count($campusVisits) > 0)
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">Visit Date</th>
                                    <th class="text-center">Time In</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Plate No.</th>
                                </tr>
                            </thead>

                            <p class="text-center">Number of Visits: {{count($campusVisits)}}</p>

                            <tbody>
        
                            
                                @foreach($campusVisits as $campusVisit)
                                    @php
                                        if($campusVisit->plate_num == null){
                                            $category = "On Foot";
                                            $platenum = "N/A";
                                        } else {
                                            $category = "With Vehicle";
                                            $platenum = $campusVisit->plate_num;
                                        }
                                    @endphp
                                
                                    <tr onclick="window.location='/campusVisits/{{$campusVisit->id}}'">
                                        <td class="text-center">{{$campusVisit->name}}</td>
                                        <td class="text-center">{{ $campusVisit->contact }} </td>
                                        <td class="text-center">{{$campusVisit->date}}</td>
                                        <td class="text-center">{{$campusVisit->time_in}}</td>
                                        <td class="text-center">{{$category}}</td>
                                        <td class="text-center">{{$platenum}}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        @else 
                            <p class="text-center">No Visits to Display for This Date</p>
                        @endif
        
                            
                        
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection