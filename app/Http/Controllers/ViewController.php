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
use Illuminate\Support\Facades\DB;


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
        $dateArray = explode(" ", $dateRange);

        $nameQuery = $request->query('name');
        $officeQuery = $request->query('office');

        $startTime = date("H:i:s", strtotime($dateArray[1]));
        $endTime = date("H:i:s", strtotime($dateArray[4]));

        $startDate = date($dateArray[0]);
        $endDate = date($dateArray[3]);

        $start = $startDate." ".$startTime;
        $end = $endDate." ".$endTime;

        $visitsQuery = CampusVisit::whereBetween(DB::raw("CONCAT(date, ' ', time_in)"), [$start, $end]);

        if($officeQuery != "-1"){
            $officesArray = Office::officesArray();
            $officeName =  $officesArray[$officeQuery];

            $officeID = Office::where('name', $officeName)->value('id');
            
            $officeVisits = OfficeVisit::where('office_id', $officeID)->pluck('visit_id')->all();      

            $visitsQuery = $visitsQuery->whereIn('id', $officeVisits);
        }

        if($nameQuery != null){
            $visitsQuery = $visitsQuery->where('name', 'LIKE', '%'.$nameQuery.'%');
        }

        $visits = $visitsQuery->get();
        
        $campusVisits = $visits->all();
        
        return view('pages/admin-users/viewVisitsAll')->with('campusVisits', $campusVisits)->with('startDate', $startDate)
            ->with('endDate', $endDate)->with('nameQuery', $nameQuery)->with('officeQuery', $officeQuery)
            ->with('startTime', $startTime)->with('endTime', $endTime);
    }

    public function showVisit($id)
    {
        $visit = CampusVisit::find($id);
        return view('pages/admin-users/viewSpecificVisit')->with('visit', $visit);
    }
}
