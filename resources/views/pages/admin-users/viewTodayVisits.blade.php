@extends('layouts/view-visits')

@php
    use App\Models\CampusVisit;
@endphp

@section('visit-content')

    <div class="au-card recent-report">
        <h5 class="title-2">View Today's Visits</h5>
    </div>

    <div class="au-card au-card-top-countries m-b-40">
        <div class="row">
            <div class="container text-right">
                <div class="col">
                    <input type="button" class="btn btn-secondary" value="Save Table as PDF" onclick="printDiv()">
                </div>
                <div class="col">
                    <input type="button" class="btn btn-secondary" value="Export Table to Sheet" onclick="exportTableToExcel()">
                </div>
            </div>
        </div>

        <div id="pdfprint">

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
                    <table id="tblData" class="table table-hover table-top-countries">
                        @if(count($campusVisits) > 0)
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time In</th>
                                    <th class="text-center">Destination</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Plate #</th>
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
                                        <td class="text-center">{{$campusVisit->destination}}</td>
                                        <td class="text-center">{{$category}}</td>
                                        <td class="text-center">{{$platenum}}</td>
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

@endsection