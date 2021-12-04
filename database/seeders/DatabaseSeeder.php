<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('office')->insert(array(
            array(
                'name' => 'Admission and Scholarship Office',
                'building_num' => '3',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Office of the Student Affairs',
                'building_num' => '3',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Department of Mathematics Education',
                'building_num' => '3',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Department of Science Education',
                'building_num' => '3',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'College of Science and Technology Education',
                'building_num' => '3',
                'floor' => 2,
                'status' => 'offline', 
            ),
            array( 
                'name' => 'Department of Education, Planning and Management',
                'building_num' => '3',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Department of Public/Administration',
                'building_num' => '3',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Department of Teaching Languages',
                'building_num' => '3',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'USTP ROTC',
                'building_num' => '4',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Mindanao University of Science and Technology Employees Multipurpose Cooperative',
                'building_num' => '5',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Office of the Alumni Federation',
                'building_num' => '5',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'JIECEP',
                'building_num' => '5',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Civil and Sanitary Work Section',
                'building_num' => '5',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Career Center and Industrial Relations Office',
                'building_num' => '9',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'IPFDO',
                'building_num' => '9',
                'floor' => 1,
                'status' => 'offline', 
            ),


            array(
                'name' => 'Office of the Dean (CITC) ',
                'building_num' => '9',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Digital Transformation',
                'building_num' => '9',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Document Tracking System Consultation Meeting and Simulation',
                'building_num' => '9',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'E-Display Center',
                'building_num' => '14',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Assessment',
                'building_num' => '14',
                'floor' => 1,
                'status' => 'offline', 
            ),


            array(
                'name' => 'Cashering',
                'building_num' => '14',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Commission on Audit',
                'building_num' => '14',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'NSTP',
                'building_num' => '19',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'IEP-Office',
                'building_num' => '23',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Office of the Registrar',
                'building_num' => '23',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Department of Technology Communication Management',
                'building_num' => '23',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(  
                'name' => 'Communication Arts Languages and Literature',
                'building_num' => '23',
                'floor' => 1,
                'status' => 'offline', 
            ),
            array(  
                'name' => 'Office of the Mechanical & Electrical Works Unit',
                'building_num' => '23',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Extension Services Office',
                'building_num' => '24',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'CSTE',
                'building_num' => '24',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(  
                'name' => 'CAS Accreditation Center',
                'building_num' => '41',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Office of the Social Sciences',
                'building_num' => '41',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Clinic',
                'building_num' => '41',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Department of EST and FST',
                'building_num' => '41',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Office of the Research Director',
                'building_num' => '42',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Research Office',
                'building_num' => '42',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Office of the Dean',
                'building_num' => '43',
                'floor' => 1,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Extension Community Relation Division',
                'building_num' => '43',
                'floor' => 2,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Faculty Office: Electrical Engineering Department',
                'building_num' => '43',
                'floor' => 3,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Computer Engineering Faculty Office',
                'building_num' => '43',
                'floor' => 3,
                'status' => 'offline', 
            ),

            array(
                'name' => 'Director for Publication',
                'building_num' => '43',
                'floor' => 4,
                'status' => 'offline', 
            ),

            array( 
                'name' => 'Office of the School Administration Villanueva Campus',
                'building_num' => '43',
                'floor' => 4,
                'status' => 'offline', 
            ),

        ));

        $init = "ADMIN";
        $year = substr(date("Y"), -2);
        $date_time_spec = date("m"."d"."h"."i"."s");
            
        $id = $init.$year.$date_time_spec;

        DB::table('admin')->insert(array(
            array(
                'id' => $id,
                'name' => 'John T. Riley',
            ),
        ));

        // admin
        DB::table('users')->insert(array(
            array(
                'admin_id' => $id,
                'username' => 'adminuser',
                'password' => Hash::make('adminpass'),
                'role_id' => 1,
            ),
        ));

        $full_year = (int)date("Y");
        $office_id = $full_year * 10000;

        // office
        DB::table('users')->insert(
            array(
                'office_id' => $office_id,
                'username' => '003001ASO',
                'password' => Hash::make('asopassword'),
                'role_id' => 2,
            ),
        );

        $date_now = date("Y/m/d");
        $time_now = date("h:i:s");

        // campusvisit
        DB::table('campusvisit')->insert(
            array(
                'name' => 'Tester A. Debugger',
                'contact' => '09254378651',
                'purpose' => 'my first debug',
                'date' => $date_now,
                'time_in' => $time_now,
            ),
        );

        $time_sec = date("h:i:s", (time() + 15));

        DB::table('campusvisit')->insert(
            array(
                'name' => 'Tester A. Debugger',
                'contact' => '09254378651',
                'purpose' => 'going in to debug',
                'date' => $date_now,
                'time_in' => $time_sec,
            ),
        );

        $time_thr = date("h:i:s", (time() + 189));

        DB::table('campusvisit')->insert(
            array(
                'name' => 'Another B. Programmer',
                'contact' => '09789234172',
                'purpose' => 'just programming here',
                'date' => $date_now,
                'time_in' => $time_thr,
            ),
        );

        $time_thr = date("h:i:s", (time() + 347));

        DB::table('campusvisit')->insert(
            array(
                'name' => 'Fiona Glezen Xi P. Mendoza',
                'contact' => '09684365921',
                'purpose' => 'testing purposes',
                'date' => $date_now,
                'time_in' => $time_thr,
            ),
        );

        $time_ov = date("h:i:s", (time() + 90));

        // officevisit
        DB::table('officevisit')->insert(
            array(
                'visit_id' => '602021000',
                'office_id' => '20210000',
                'date' => $date_now,
                'time_in' => $time_ov,
            ),
        );

    }
}
