<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\OfficeVisit;
use App\Models\CampusVisit;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
    public function storeCode(Request $request)
    {
        $name = $request->name;
        
        $officeVisit = new OfficeVisit;

        $visitID = CampusVisit::select('id')->where('name', $name)->orderBy('time_in', 'desc')->first();
        
        $officeVisit->visit_id = $visitID->id;
        $officeVisit->office_id = Auth::user()->office_id;
        $officeVisit->date = date("Y/m/d");
        $officeVisit->time_in = date("h:i:s");

        $officeVisit->save();

        return redirect('/')->with('success', 'Office Visit Successfully Added');
    }

    public function store(Request $request)
    {
        $nameID = $request->input('name');

        $namesArray = CampusVisit::namesArray();

        $name = $namesArray[$nameID];

        $officeVisit = new OfficeVisit;

        $visitID = CampusVisit::select('id')->where('name', $name)->orderBy('time_in', 'desc')->first();
        
        $officeVisit->visit_id = $visitID->id;
        $officeVisit->office_id = Auth::user()->office_id;
        $officeVisit->date = date("Y/m/d");
        $officeVisit->time_in = date("h:i:s");

        $officeVisit->save();

        return back()->with('success', 'Office Visit Successfully Added');

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
