<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\Office;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    
    public function index($building_num)
    {
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

   
    public function create()
    {
        return view('pages/admin-users/createOffice');

    }


    public function store(Request $request)
    {
        // not used
    }

    
    /*public function show($id)
    {
        $office = Office::where('office_id', $office_id)->first();
        return view('offices/show')->with('office', $office);

        // maybe used for registering
    }*/

    
    public function edit($id)
    {
        // not used
    }

    
    public function update(Request $request)
    {
        $office = Office::find(Auth::user()->office_id);

        $office->status = $request->input('status');

        $office->save();
        
        return back()->with('success', 'Event Updated');
    }

    
    public function destroy($id)
    {
        // not used
    }
}
