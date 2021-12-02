@extends('layouts/header')

@section('content')
    <div class="main-content">
        @if(Auth::user()->role_id == 1)
            @include('pages/adminLogged')
        @endif

        @if(Auth::user()->role_id == 2)
            @include('pages/officeLogged')
        @endif
        
    </div>
@endsection