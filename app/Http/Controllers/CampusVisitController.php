<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// using CampusVisit model
use App\Models\CampusVisit;
use App\Models\Office;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CampusVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($building_num)
    {
        // FROM PHONE
        $offices = DB::table('office')->where('building_num',  '=', $building_num)->get();
        
        if($offices == NULL){
            return response()->json(array(
                'message' => 'Building does not exist'
            ), 404);
        }

        if($offices->isEmpty()){
            return response()->json(array(
                'message' => 'No offices found'
            ), 204);
        }

        return $offices;
    }
    

    public function store(Request $request)
    {
        // FROM PHONE
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'contact' => 'required|min:11|starts_with:09',
            'destination' => 'required',
        ]);

        if($validator->fails()){

            $errors = $validator->errors();
            $err = array(
                'name' => $errors->first('name'),
                'contact' => $errors->first('contact'),
                'destination' => $errors->first('destination'),
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
        $time_now = date("H:i:s");

        $campus_visit->name = $request->input('name');
        $campus_visit->contact = $request->input('contact');
        $campus_visit->destination = $request->input('destination');

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

    public function getPlaces(){
        $offices = DB::table('office')->select('name')->get();
        $buildings = DB::table('building')->select('name')->get();

        $merge = $buildings->merge($offices);
        $places = $merge->all();

        return $places;
    }

    public function getCoordinates($name){

        $coordinates = DB::table('building')
            ->select(array('latitude', 'longitude', 'id', 'name'))
            ->where('name', $name)->get();

        if($coordinates->isEmpty()){
            $bldgID = DB::table('office')->where('name', $name)
                ->value('building_num');
            
            $coordinates = DB::table('building')
                ->select(array('latitude', 'longitude', 'id', 'name'))
                ->where('id', $bldgID)->get();

        }

        return $coordinates;

    }
 
}
