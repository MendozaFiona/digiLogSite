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
        $dateArray = explode("+", $dateRange);

        $nameQuery = $request->query('name');
        $officeQuery = $request->query('office');

        dd($dateArray);

        $startTime = date($dateArray[1]);
        $endTime = date($dateArray[4]);

        dd($startTime);

        $startDate = date($dateArray[0]);
        $endDate = date($dateArray[3]);

        $visitsQuery = CampusVisit::whereBetween('date', [$startDate, $endDate]);

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
            ->with('endDate', $endDate)->with('nameQuery', $nameQuery)->with('officeQuery', $officeQuery);
    }

    public function showVisit($id)
    {
        $visit = CampusVisit::find($id);
        return view('pages/admin-users/viewSpecificVisit')->with('visit', $visit);
    }
}
