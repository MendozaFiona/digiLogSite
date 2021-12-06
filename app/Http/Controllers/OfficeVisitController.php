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
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class OfficeVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }
    
    public function index()
    {
        // FROM OFFICE SITE: VIEW
        $officeVisits = OfficeVisit::all();
        return view('pages/office-users/viewOfficeVisits')->with('officeVisits', $officeVisits);
    }

    public function storeCode(Request $request)
    {
        // FROM OFFICE SITE
        $name = $request->name;
        
        $officeVisit = new OfficeVisit;

        $visitID = CampusVisit::select('id')->where('name', $name)->where('date', Carbon::today()->format('Y-m-d'))->orderBy('time_in', 'desc')->first();

        if($visitID == null){
            return response()->json(array(
                'message' => 'Cannot process request. Input errors.',
                'error' => '404 resource not found'
            ), 404);
        } else {
            $officeVisit->visit_id = $visitID->id;
            $officeVisit->office_id = Auth::user()->office_id;
            $officeVisit->date = date("Y/m/d");
            $officeVisit->time_in = date("h:i:s A");

            $officeVisit->save();

            return redirect('/')->with('success', 'Office Visit Successfully Added');
        }
    }

    public function store(Request $request)
    {
        // FROM OFFICE SITE
        $nameID = $request->input('name');

        $validator = Validator::make($request->all(),[
            'name' => 'required|gt:-1',
        ]);

        if($validator->fails()) {
            return Redirect::back()->with('message', 'Please Select Name');
        }

        $namesArray = CampusVisit::namesArray();

        $name = $namesArray[$nameID];

        $officeVisit = new OfficeVisit;

        $visitID = CampusVisit::select('id')->where('name', $name)->orderBy('time_in', 'desc')->first();
        
        $officeVisit->visit_id = $visitID->id;
        $officeVisit->office_id = Auth::user()->office_id;
        $officeVisit->date = date("Y/m/d");
        $officeVisit->time_in = date("h:i:s A");

        $officeVisit->save();

        return back()->with('message', 'Office Visit Successfully Added');

    }

    public function show($id)
    {
        // FROM OFFICE SITE
        $visit = OfficeVisit::where('id', $id)->first();
        return view('pages/office-users/viewSpecificVisit')->with('visit', $visit);
    }

}
