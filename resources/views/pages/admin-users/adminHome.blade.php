@php
   use Carbon\Carbon; 
@endphp
<div class="section__content section__content--p30">
    <div class="container-fluid"> 
        <div class="row">
            <div class="jumbotron container" style="border:1px solid #738678; background-color: #FFF;">
                <!--<h2 class="display-4 text-light">Manage Data</h2>-->
                <div class="row justify-content-center align-self-center" >
                    <div class="col-sm-5">
                        <div class="card container text-center" style= "background-color: #191851; border-radius: 20px;" >
                            <div class="pt-4 card-header" style="color: #FFF; font-size: 24px;">
                                Manage Data
                            </div>
                            <div class="pt-1 pb-5 card-body">
                                
                                <div class="pt-3">
                                    <a href="/createOfficeUser" class="btn btn-secondary btn-lg btn-block" style = "background-color: #FDB417; border-radius: 20px; font-size: 18px;">Register Data</a>
                                </div>

                                <div class="pt-4">
                                    <a href="/users" class="btn btn-secondary btn-lg btn-block" style = "background-color: #FDB417; border-radius: 20px; font-size: 18px;">View User</a>
                                </div>
                                
                            </div>
                        </div>

                        <div class="card container text-center" style= "background-color: #191851; border-radius: 20px;" >
                            <div class="pt-4 card-header" style="color: #FFF; font-size: 24px;">
                                View Visits
                            </div>
                            <div class="pt-1 pb-5 card-body">

                                @php
                                    $this_date = Carbon::today()->format('Y-m-d');
                                @endphp
                                
                                <div class="pt-3">
                                    <a href="/viewTodayVisits" class="btn btn-secondary btn-lg btn-block" style = "background-color: #FDB417; border-radius: 20px; font-size: 18px;">Today</a>
                                </div>
                                
                                <div class="pt-4">
                                    <a href="{{url('/viewAllVisits?name=&office=-1&date=').$this_date."+-+".$this_date}}" class="btn btn-secondary btn-lg btn-block" style = "background-color: #FDB417; border-radius: 20px; font-size: 18px;">All Visit</a>
                                </div>
                            </div>
                            
                        </div>                                               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>