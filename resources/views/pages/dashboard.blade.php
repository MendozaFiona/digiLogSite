@extends('layouts/header')

@section('content')
    <div class="main-content">
        @if(Auth::user()->role_id == 1)
            @include('pages/admin-users/adminHome')
        @endif

        @if(Auth::user()->role_id == 2)
            @include('pages/office-users/scanOfficeVisit')
        @endif
        
    </div>
@endsection