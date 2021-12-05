<?php

namespace App\Http\Controllers;

use App\Models\CampusVisit;

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

    public function viewAll()
    {

        // TO BE CHANGED
        $visits = CampusVisit::where('date', Carbon::today()->format('Y-m-d'))->get();
        $campusVisits = $visits->all();
        return view('pages/admin-users/viewVisitsAll')->with('campusVisits', $campusVisits);
    }

    public function showVisit($id)
    {
        $visit = CampusVisit::find($id);
        return view('pages/admin-users/viewSpecificVisit')->with('visit', $visit);
    }
}
