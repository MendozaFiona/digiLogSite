@extends('layouts/header')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">   

                <div class="row">

                    <div class="col-lg-4">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">                   
                            <div class="au-task js-list-load">
                                <div class="au-task__item au-task__item--danger" style = "background-color: #FDB417">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="/offices/create">Add Office</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="au-task__item au-task__item--danger" style = "background-color: #FDB417">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="/admins/create">Add Admin</a>
                                        </h5>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        @include('inc.messages')
                        @yield('register-content')
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
@endsection