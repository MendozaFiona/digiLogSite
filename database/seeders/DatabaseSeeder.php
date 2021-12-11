<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Office;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('building')->insert(array(
            array(
                'id' => 1,
                'name' => 'Arts and Culture',
                'latitude' => '8.48625',
                'longitude' => '124.658417',
            ),

            array(
                'id' => 2,
                'name' => 'Guidance Office',
                'latitude' => '8.486306',
                'longitude' => '124.65825',
            ),

            array(
                'id' => 3,
                'name' => 'ITB - 2',
                'latitude' => '8.486028',
                'longitude' => '124.658333',
            ),

            array(
                'id' => 4,
                'name' => 'JLU Unit',
                'latitude' => '8.485833',
                'longitude' => '124.658111',
            ),

            array(
                'id' => 5,
                'name' => 'CEA Building - 1',
                'latitude' => '8.48575',
                'longitude' => '124.657583',
            ),

            array(
                'id' => 6,
                'name' => 'Auto Shop',
                'latitude' => '8.486083',
                'longitude' => '124.657833',
            ),

            array(
                'id' => 7,
                'name' => 'Electrical Shop',
                'latitude' => '8.486278',
                'longitude' => '124.657806',
            ),

            array(
                'id' => 8,
                'name' => 'Sun Cell',
                'latitude' => '8.486472',
                'longitude' => '124.657611',
            ),

            array(
                'id' => 9,
                'name' => 'ICT Building',
                'latitude' => '8.48625',
                'longitude' => '124.657389',
            ),

            array(
                'id' => 10,
                'name' => 'Administration Building',
                'latitude' => '8.486',
                'longitude' => '124.657278',
            ),

            array(
                'id' => 12,
                'name' => 'ROTC Office',
                'latitude' => '8.486639',
                'longitude' => '124.656222',
            ),

            array(
                'id' => 13,
                'name' => 'Drawing Building',
                'latitude' => '8.486583',
                'longitude' => '124.656611',
            ),

            array(
                'id' => 14,
                'name' => 'Finance Center',
                'latitude' => '8.486306',
                'longitude' => '124.656667',
            ),

            array(
                'id' => 15,
                'name' => 'Gym Lobby',
                'latitude' => '8.486167',
                'longitude' => '124.656417',
                
            ),

            array(
                'id' => 16,
                'name' => 'Dr. Ricardo Rotoras Memorial Hall',
                'alt' => 'Gym',
                'latitude' => '8.485806',
                'longitude' => '124.656667',
            ),

            array(
                'id' => 18,
                'name' => 'Alumni Building',
                'latitude' => '8.485361',
                'longitude' => '124.657222',
            ),

            array(
                'id' => 19,
                'name' => 'Science Centrum',
                'latitude' => '8.485083',
                'longitude' => '124.657167',
                
            ),

            array(
                'id' => 20,
                'name' => 'Cafeteria',
                'latitude' => '8.485194',
                'longitude' => '124.656778',
                
            ),

            array(
                'id' => 21,
                'name' => 'Guard House',
                'latitude' => '8.484917',
                'longitude' => '124.656611',
            ),

            array(
                'id' => 23,
                'name' => 'LRC Building',
                'latitude' => '8.486611',
                'longitude' => '124.655778',
            ),

            array(
                'id' => 24,
                'name' => 'Food Trades Building',
                'latitude' => '8.486333',
                'longitude' => '124.655361',
            ),

            array(
                'id' => 25,
                'name' => 'Food Innovation Center',
                'latitude' => '8.486306',
                 'longitude' => '124.655889',
            ),

            array(
                'id' => 26,
                'name' => 'Scholarship Coordinators Office',
                'latitude' => '8.486389',
                'longitude' => '124.656083',
            ),

            array(
                'id' => 27,
                'name' => 'Old Medical Building',
                'latitude' => '8.486',
                'longitude' => '124.655611',                
            ),

            array(
                'id' => 28,
                'name' => 'Science Building',
                'latitude' => '8.485944',
                'longitude' => '124.655889',                
            ),

            array(
                'id' => 29,
                'name' => 'Band Stand',
                'latitude' => '8.485361',
                'longitude' => '124.65575',
            ),

            array(
                'id' => 34,
                'name' => 'Car Care',
                'latitude' => '8.485361',
                'longitude' => '124.655389',
            ),

            array(
                'id' => 35,
                'name' => 'Education Building',
                'latitude' => '8.485806',
                'longitude' => '124.655278',
            ),

            array(
                'id' => 36,
                'name' => 'Student Center',
                'latitude' => '8.486111',
                'longitude' => '124.655139',
            ),

            array(
                'id' => 37,
                'name' => 'Civil Tech. Building',
                'latitude' => '8.4865',
                'longitude' => '124.654917',
            ),

            array(
                'id' => 38,
                'name' => 'Furniture Shop',
                'latitude' => '8.486639',
                'longitude' => '124.654889',
            ),

            array(
                'id' => 41,
                'name' => 'Science Complex',
                'latitude' => '8.485639',
                 'longitude' => '124.656028',
            ),

            array(
                'id' => 42,
                'name' => 'Engineering Complex (A)',
                'latitude' => '8.484861',
                'longitude' => '124.657056',
            ),

            array(
                'id' => 43,
                'name' => 'Engineering Complex (B)',
                'latitude' => '8.484833',
                'longitude' => '124.65675',
            ),
            )
        );

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

        $date_now = date("Y/m/d");
        $time_now = date("H:i:s");

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

        $time_sec = date("H:i:s", (time() + 15));

        DB::table('campusvisit')->insert(
            array(
                'name' => 'Tester A. Debugger',
                'contact' => '09254378651',
                'purpose' => 'going in to debug',
                'date' => $date_now,
                'time_in' => $time_sec,
            ),
        );

        $time_thr = date("H:i:s", (time() + 189));

        DB::table('campusvisit')->insert(
            array(
                'name' => 'Another B. Programmer',
                'contact' => '09789234172',
                'purpose' => 'just programming here',
                'date' => $date_now,
                'time_in' => $time_thr,
            ),
        );

        $time_thr = date("H:i:s", (time() + 347));

        DB::table('campusvisit')->insert(
            array(
                'name' => 'Fiona Glezen Xi P. Mendoza',
                'contact' => '09684365921',
                'purpose' => 'testing purposes',
                'date' => $date_now,
                'time_in' => $time_thr,
            ),
        );

    }
}
