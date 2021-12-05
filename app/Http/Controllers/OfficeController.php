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
    

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }

    
    public function update(Request $request)
    {
        // FROM OFFICE SITE
        $office = Office::find(Auth::user()->office_id);

        $office->status = $request->input('status');

        $office->save();
        
        return back()->with('success', 'Event Updated');
    }

}
