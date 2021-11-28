<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\Office;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OfficeController extends Controller
{
    
    public function index()
    {
        //$office = Office::select('id', 'name')->get();
        //eturn view('pages/viewEvents')->with('$office', $office);

       // return view('pages/viewEvents')->with('admins', $admins);

        $offices = Office::all();
        return view('pages/viewEvents')->with('offices', $offices);
    }

   
    public function create()
    {
        return view('pages/createOffice');

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required', // please put a restriction on format! including in the view page!
            'password' => 'required',
        ]);

        $office = new Office;

        $office->name = $request->input('name');
        $office->event_desc = $request->input('username');
        $office->event_date = $request->input('password');
        
        $office->save();
        
        return redirect('/admins')->with('success', 'Event Added');
    }

    
    public function show($id)
    {
        $event = Event::where('id', $id)->first();
        return view('events/show')->with('event', $event);
    }

    
    public function edit($id)
    {
        $event = Event::where('id', $id)->first();
        return view('events/edit')->with('event', $event);
    }

    
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $this->validate($request, [
            'event_name' => 'required',
            'event_date' => 'required|date_format:Y-m-d|after:today', 
            'event_desc' => 'required',
        ]);

        $event->event_name = $request->input('event_name');
        $event->event_desc = $request->input('event_desc');
        $event->event_date = $request->input('event_date');

        $event->save();
        
        return redirect('/events')->with('success', 'Event Updated');
    }

    
    public function destroy($id)
    {
        $event = Event::find($id);

        $event->delete();

        return redirect('/events')->with('success', 'Event Deleted');
    }
}
