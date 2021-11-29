<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// using CampusVisit model
use App\Models\CampusVisit;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CampusVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus_visits = CampusVisit::all();
        return view('pages/campus-visits')/*->with('events', $events)*/;
        // with is only used if there are passed arguments
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // not used since we arent creating campus visits in the site
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'contact' => 'required',
        ]);

        if($validator->fails()){

            $errors = $validator->errors();
            $err = array(
                'name' => $errors->first('name'),
                'contact' => $errors->first('contact'),
            );

            return response()->json(array(
                'message' => 'Cannot process request. Input errors.',
                'errors' => $err
            ),422);

        }

        $campus_visit = new CampusVisit;

        $v_type = $request->input('vehicle_type');
        $p_num = $request->input('plate_num');

        $date_now = date("Y/m/d");
        $time_now = date("h:i:s");

        $campus_visit->name = $request->input('name');
        $campus_visit->contact = $request->input('contact');

        if($v_type != null){
            $campus_visit->vehicle_type = $v_type;
            $campus_visit->plate_num = $p_num;
        }

        $campus_visit->date = $date_now;
        $campus_visit->time_in = $time_now;

        $campus_visit->save();

        return response()->json(array(
            'message' => 'Successfully saved!'
        ), 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // this part here is for the site
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // only for timeout but we removed that 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // maybe in the future?
    }
}
