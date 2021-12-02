<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\OfficeVisit;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OfficeVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officeVisits = OfficeVisit::all();
        return view('pages/viewOfficeVisits')->with('officeVisits', $officeVisits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeVisit  $officeVisit
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeVisit $officeVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeVisit  $officeVisit
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeVisit $officeVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeVisit  $officeVisit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeVisit $officeVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeVisit  $officeVisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeVisit $officeVisit)
    {
        //
    }
}
