@extends('layouts/header')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="jumbotron container" style= "margin-top: 40px; background-color: #fffff">
                        <h2 class="display-4 text-light">Manage Data</h2>
                        <div class="row justify-content-center align-self-center" >
                            <div class="col-sm-5">
                                <div class="card text-center" style= "background-color: #191851" >
                                    <div class="card-header">
                                        User
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <a href="/offices/create" class="btn btn-primary btn-lg btn-block" style = "background-color: #FDB417">Register Data</a>
                                        <a href="/users" class="btn btn-primary btn-lg btn-block" style = "background-color: #FDB417">View User</a>
                                    </div>
                                </div>

                                <div class="card text-center" style= "background-color: #191851" >
                                    <div class="card-header">
                                        Visitors
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <a href="#" class="btn btn-primary btn-lg btn-block" style = "background-color: #FDB417">Today</a>
                                        <a href="#" class="btn btn-primary btn-lg btn-block" style = "background-color: #FDB417">All Visit</a>
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