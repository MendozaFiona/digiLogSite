<?php

namespace App\Http\Controllers;

use App\Models\CampusVisit;
use App\Models\Office;
use App\Models\OfficeVisit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class ViewController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function viewToday()
    {
        $visits = CampusVisit::where('date', Carbon::today()->format('Y-m-d'))->get();
        $campusVisits = $visits->all();
        return view('pages/admin-users/viewTodayVisits')->with('campusVisits', $campusVisits);
    }

    public function viewAll(Request $request)
    {
        $dateRange = $request->query('date');
        $dateArray = explode(" - ", $dateRange);

        $nameQuery = $request->query('name');
        $officeQuery = $request->query('office');

        $startDate = date($dateArray[0]);
        $endDate = date($dateArray[1]);

        if($officeQuery == "-1"){
            $visits = CampusVisit::whereBetween('date', [$startDate, $endDate])->get();
        } else {
            $officesArray = Office::officesArray();
            $officeName =  $officesArray[$officeQuery];

            dd($officeName);

            $officeID = Office::select('id')->where('name', $officeName)->first();
            dd($officeID);
            
            $officeVisits = OfficeVisit::where('office_id', $officeID)->get();      
            dd($officeVisits);
            $visitsArray = $officeVisits->pluck('visit_id')->all();

            $visits = CampusVisit::whereBetween('date', [$startDate, $endDate])->whereIn('id', $visitsArray)->get();
        }
        
        $campusVisits = $visits->all();
        
        return view('pages/admin-users/viewVisitsAll')->with('campusVisits', $campusVisits)->with('startDate', $startDate)
            ->with('endDate', $endDate);
    }

    public function showVisit($id)
    {
        $visit = CampusVisit::find($id);
        return view('pages/admin-users/viewSpecificVisit')->with('visit', $visit);
    }
}
