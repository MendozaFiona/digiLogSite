<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\User;
use App\Models\Office;
use App\Models\Admin;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\UrlGenerator;

class UserController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    
    public function index() // show all users
    {
        $users = User::all();
        return view('pages/admin-users/viewOffices')->with('users', $users); // pagesctrlr is not used!
        // perform an additional layout for user information
    }

    public function admin() // show all users
    {
        $users = User::all();
        return view('pages/admin-users/viewAdmins')->with('users', $users); // pagesctrlr is not used!
        // perform an additional layout for user information
    }

    public function createAdminUser() // for Registration, acquire input
    {
        // maybe wont be used
        return view('pages/admin-users/createAdmin');
    }


    public function storeAdminUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            // user_id is automatically generated
            'name' => 'required|min:4',
            'username' => 'required|min:4|max:15|unique:users,username',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $admin = new Admin;

        $init = "ADMIN";
        $year = substr(date("Y"), -2);
        $date_time_spec = date("m"."d"."h"."i"."s");
            
        $id = $init.$year.$date_time_spec;

        $admin->id = $id;
        $admin->name = $request->input('name');

        $admin->save();

        $user = new User;

        $user->admin_id = $id;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = 1;

        $user->save();

        return Redirect::back()->with('success', 'Admin Registration Successful');

    }

    public function createOfficeUser() // for Registration, acquire input
    {
        return view('pages/admin-users/createOffice');
    }

    public function storeOfficeUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            // user_id is automatically generated
            'name' => 'required',
            'username' => 'required|min:4|max:15|unique:users,username',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        $user = new User;

        $offices_array = Office::officesArray();
        $office_name =  $offices_array[$request->input('name')];

        $office_id = Office::select('id')->where('name', $office_name)->first();
        
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->office_id = $office_id->id;
        $user->role_id = 2;

        $user->save();

        return Redirect::back()->with('success', 'Office Registration Successful');

    }

    
    public function show($id) //show a specific User
    {
        $user = User::find($id);
        return view('users/show')->with('user', $user);
    }


    public function edit($id) // edits profile, receives edit info from user
    {
        $user = User::where('id', $id)->first();
        return view('users/edit')->with('user', $user);
    }

    
    public function update(Request $request, $id) // update db, receives from editUser
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(),[
            'username' => 'required|min:4|max:15|unique:users,username,'.$id,
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        dd($user->id);

        if($user->id == 1){
            return redirect('/admins')->with('success', 'User Updated');
        } else {
            return redirect('/users')->with('success', 'User Updated');
        }
    }

    
    public function destroy($id) //delete User
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/users')->with('success', 'User Deleted');
    }
}
