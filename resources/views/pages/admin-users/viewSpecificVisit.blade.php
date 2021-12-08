@extends('layouts/view-visits')

@php
    use App\Models\Office;
    use App\Models\OfficeVisit;
@endphp

@section('visit-content')
<div class="au-card recent-report">
    <h5 class="title-2">{{ date('F d, Y', strtotime($visit->date)) }}</h5>
</div>


<div class="au-card au-card-top-countries m-b-40">
    <p id="date" class="text-center"></p>
    <div class="au-card-inner">
        
        <div class="container w-75 pb-5 pt-5 text-center" style = "background-color: #f6cf659a; border-radius: 20px;">
            <div class="text-left pl-5 pb-2">
                <h3 class="pl-5 pt-2">{{ $visit->name }}</h3>
                <div class="row pt-4 pl-5">
                    <div class="col">
                        Campus Visit ID: {{$visit->id}}
                    </div>
                    <div class="col">
                        Mobile No: {{ $visit->contact }}
                    </div>  
                </div>
                <div class="row pt-2 pl-5">
                    <div class="col">
                        Campus Time In: {{ $visit->time_in }}
                    </div>
                    <div class="col">
                        Visit Purpose: {{ $visit->purpose }}
                    </div>  
                </div>
                @if ($visit->plate_num != null)
                    <div class="row pt-2 pl-5">
                        <div class="col">
                            Vehicle Type: {{ $visit->vehicle_type }}
                        </div>
                        <div class="col">
                            Plate No.: {{ $visit->plate_num }}
                        </div>  
                    </div>
                @endif

                @foreach (OfficeVisit::visitorOfficeVisits($visit->id) as $officeVisit)

                    <div class="row pt-4">
                        <div class="container w-75 text-center" style = "background-color: #ffffffd3; border-radius: 20px;">
                            <div class="row pl-5 pt-3">
                                Office: {{ Office::office($officeVisit->office_id) }}
                            </div>
                            <div class="row pl-5 pb-3">
                                Office Time In: {{ $officeVisit->time_in }}
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                
            </div>
        </div>

    </div>
</div>
@endsection