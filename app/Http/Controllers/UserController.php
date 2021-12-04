<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\User;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function index() // show all users
    {
        $users = User::all();
        return view('pages/admin-users/viewOffices')->with('users', $users); // pagesctrlr is not used!
        // perform an additional layout for user information
    }


    public function create() // for Registration, acquire input
    {
        $validator = Validator::make($request->all(),[
            // user_id is automatically generated
            'username' => 'required',
            'password' => 'required',
            'user_role' => 'required',
            'student_id' => 'required', // either should be filled
            //'teacher_id' => 'required_without:student_id', // either should be filled
            //teacher is automatically added in seeding
        ]);

        if($validator->fails()){

            $errors = $validator->errors(); // detects errors and stores in individual variables
            $err = array(
                // ff. stores detected errors for each field in ther $err array
                'username' => $errors->first('username'),
                'password' => $errors->first('password'),
                'user_role' => $errors->first('user_role'),
                'student_id' => $errors->first('student_id'),
                //'teacher_id' => $errors->first('teacher_id'),
                /* since in the org there's only one teacher,
                automatically added as user */
            );

            return response()->json(array(
                'message' => 'Cannot process request. Input errors.',
                'errors' => $err
            ), 422);

        }

        $user = new User;

        $user->username = $request->input('username');
        // this is to hash the user password in the database
        $user->password = Hash::make($request->input('password'));
        /* NOTE:
            role_id will automatically be 2 for member registration,
            only one teacher/moderator will be 1 for admin
        */

        //$user->user_role = $request->input('role_id');
        //registering only takes a member roles = 2

        //$teacher_check =  $request->input('teacher_id');

        /* NOTE:
            Please add finding corresponding student_id/teacher_id in their
            respective tables! If id not found, return an error response!
        */

        /* NOTE:
            to not store anything if teacher_id is null
            ff. only required if there can be multiple teachers
            uncomment if you want a teacher input in registration
        */

        /*if($teacher_check != null){
            $user->teacher_id = $request->input('teacher_id');
            $user->role_id = '1';
        } else {
            $user->student_id = $request->input('student_id');
            $user->role_id = '2';
        }*/

        $user->student_id = $request->input('student_id');
        
        $user->save();
        
        return response()->json(array(
            'message' => 'Registration Successful',
            'user' => $user
        ), 201);

    }


    ///////////////////////////////////////////////

//     public function createAdmin() // for Registration, acquire input
//     {
//         $validator = Validator::make($request->all(),[
//             // user_id is automatically generated
//             'username' => 'required',
//             'password' => 'required',
//             'user_role' => 'required',
//             'student_id' => 'required', // either should be filled
//             //'teacher_id' => 'required_without:student_id', // either should be filled
//             //teacher is automatically added in seeding
//         ]);

//         if($validator->fails()){

//             $errors = $validator->errors(); // detects errors and stores in individual variables
//             $err = array(
//                 // ff. stores detected errors for each field in ther $err array
//                 'username' => $errors->first('username'),
//                 'password' => $errors->first('password'),
//                 'user_role' => $errors->first('user_role'),
//                 'student_id' => $errors->first('student_id'),
//                 //'teacher_id' => $errors->first('teacher_id'),
//                 /* since in the org there's only one teacher,
//                 automatically added as user */
//             );

//             return response()->json(array(
//                 'message' => 'Cannot process request. Input errors.',
//                 'errors' => $err
//             ), 422);

//         }

//         $user = new User;

//         $user->username = $request->input('username');
//         // this is to hash the user password in the database
//         $user->password = Hash::make($request->input('password'));
//         /* NOTE:
//             role_id will automatically be 2 for member registration,
//             only one teacher/moderator will be 1 for admin
//         */

//         //$user->user_role = $request->input('role_id');
//         //registering only takes a member roles = 2

//         //$teacher_check =  $request->input('teacher_id');

//         /* NOTE:
//             Please add finding corresponding student_id/teacher_id in their
//             respective tables! If id not found, return an error response!
//         */

//         /* NOTE:
//             to not store anything if teacher_id is null
//             ff. only required if there can be multiple teachers
//             uncomment if you want a teacher input in registration
//         */

//         /*if($teacher_check != null){
//             $user->teacher_id = $request->input('teacher_id');
//             $user->role_id = '1';
//         } else {
//             $user->student_id = $request->input('student_id');
//             $user->role_id = '2';
//         }*/

//         $user->student_id = $request->input('student_id');
        
//         $user->save();
        
//         return response()->json(array(
//             'message' => 'Registration Successful',
//             'user' => $user
//         ), 201);

//     }
// //////////////////////////////////////////////////////////////////////////////////////////////////

    public function store(Request $request) // stores register info to db, receives from createUser
    {
        //
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
