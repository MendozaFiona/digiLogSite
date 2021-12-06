@php
   use App\Models\CampusVisit;
@endphp

<div class="section__content section__content--p30">
    <div class="container-fluid">   

        <div class="row">

            <div class="col-lg-4">
                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">                   
                    <div class="au-task js-list-load">
                        <div class="au-task__item au-task__item--primary" style = "background-color: #FDB417">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="/" style="color: #000;">Scan QR Code</a>
                                </h5>
                            </div>
                        </div>
                        <div class="au-task__item au-task__item--primary" style = "background-color: #D5D8DB">
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
                    <h5 class="title-2">Scan QR Code</h5>
                </div>
            
            
                <div class="au-card au-card-top-countries m-b-40">
                    <div class="au-card-inner">
                        <div class = "text-center">
                           <video id="preview" class = "border border-dark rounded"></video>
                        </div>

                        <div class="container pt-3 pb-5">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                    <a id="endCam" class="btn btn-warning btn-lg btn-block" style = "background-color: #FDB417; color: #000;">TURN OFF CAMERA</a>
                                </div>
                                <div class="col">
                                    <a id="startCam" class="btn btn-primary btn-lg btn-block" style = "background-color: #191851; color: #FFF;">TURN ON CAMERA</a>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>

                        <div class="container w-50 pb-5 pt-5 text-center" style = "background-color: #D5D8DB; border-radius: 20px">
                            <div class="text-center pb-2">
                                <h3>Manual Input</h3>
                            </div>
                            
                            {!! Form::open(['action' => 'App\Http\Controllers\OfficeVisitController@store', 'method' => 'POST']) !!}
                
                                <div class="pt-2 pb-2"></div>    
                                <div class="form-group">
                                    
                                    {{Form::label('name', 'Visitor Name')}}
                                    {{Form::select('name',
                                        [-1 => 'Select Name', 'Visitor Names' => CampusVisit::namesArray()],
                                        ['class' => "form-control row w-100 center-block"])
                                    }}
                                    
                                    
                                </div>

                                <div class="pt-2 pb-2"></div>

                                @if(session()->has('message'))
                                    <script>
                                        alert('{{ session()->get('message') }}');
                                    </script>
                                @endif
                
                                {{Form::submit('Submit', ['class' => "btn btn-primary btn-lg", 'style' => "background-color: #191851",])}}
                    
                            {!! Form::close() !!}  
                            
                        </div>
                                
                        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                        <script type="text/javascript">
                            var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
                            
                            scanner.addListener('scan',function(content){
                                var name = content.split(',').pop();

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                jQuery.ajax({
                                    url: "{{ url('/officeVisitsCode') }}",
                                    method: 'POST',
                                    data: {
                                        name: name,
                                    },
                                    success: function(result){
                                        alert(result);
                                    }});
                            });

                            Instascan.Camera.getCameras().then(function (cameras){
                                if(cameras.length>0){
                                    scanner.start(cameras[0]);
                                    $('[name="options"]').on('change',function(){
                                        if($(this).val()==1){
                                            if(cameras[0]!=""){
                                                scanner.start(cameras[0]);
                                            }else{
                                                alert('No Front camera found!');
                                            }
                                        }else if($(this).val()==2){
                                            if(cameras[1]!=""){
                                                scanner.start(cameras[1]);
                                            }else{
                                                alert('No Back camera found!');
                                            }
                                        }
                                    });
                                }else{
                                    console.error('No cameras found.');
                                    alert('No cameras found.');
                                }
                            }).catch(function(e){
                                console.error(e);
                                alert(e);
                            });

                            document.getElementById("endCam").onclick = function () {
                                scanner.stop();                        
                            };

                            document.getElementById("startCam").onclick = function () { Instascan.Camera.getCameras().then(function (cameras){
                                if(cameras.length>0){
                                    scanner.start(cameras[0]);
                                    $('[name="options"]').on('change',function(){
                                        if($(this).val()==1){
                                            if(cameras[0]!=""){
                                                scanner.start(cameras[0]);
                                            }else{
                                                alert('No Front camera found!');
                                            }
                                        }else if($(this).val()==2){
                                            if(cameras[1]!=""){
                                                scanner.start(cameras[1]);
                                            }else{
                                                alert('No Back camera found!');
                                            }
                                        }
                                    });
                                }else{
                                    console.error('No cameras found.');
                                    alert('No cameras found.');
                                }
                            }).catch(function(e){
                                console.error(e);
                                alert(e);
                            }); };

                        </script>

                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>
