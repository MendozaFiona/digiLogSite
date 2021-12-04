<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\User;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
            'name' => 'required',
            'username' => 'required|min:4',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
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
            'username' => 'required|min:4',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
    }


    public function store(Request $request) // stores register info to db, receives from createUser
    {
        // SHOULD BE EDITED
        $validator = Validator::make($request->all(),[
            // user_id is automatically generated
            'username' => 'required',
            'password' => 'required',
            'user_role' => 'required',
            'student_id' => 'required', 
        ]);

        if($validator->fails()){

            $errors = $validator->errors(); // detects errors and stores in individual variables
            $err = array(
                // ff. stores detected errors for each field in ther $err array
                'username' => $errors->first('username'),
                'password' => $errors->first('password'),
                'user_role' => $errors->first('user_role'),
                'student_id' => $errors->first('student_id'),
            );

            return response()->json(array(
                'message' => 'Cannot process request. Input errors.',
                'errors' => $err
            ), 422);

        }

        $user = new User;

        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));

        $user->student_id = $request->input('student_id');
        
        $user->save();
        
        return response()->json(array(
            'message' => 'Registration Successful',
            'user' => $user
        ), 201);
    }

    
    public function show($id) //show a specific User
    {
        // I DONT THINK WE NEED TO USE THIS
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

        $this->validate($request, [
            'username' => 'required',
            'role_id' => 'required',
        ]);

        $user->username = $request->input('username');
        $user->role_id = $request->input('role_id');

        $user->save();
        
        return redirect('/users')->with('success', 'User Updated');
    }

    
    public function destroy($id) //delete User
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/users')->with('success', 'User Deleted');
    }
}
