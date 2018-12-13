<?php

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_users')->delete();
        
        \DB::table('role_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'role_code' => 'A01',
                'role_name' => 'Administrator',
                'created_at' => '2018-07-04 14:36:48',
                'updated_at' => '2018-07-04 14:36:48',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'role_code' => 'L01',
                'role_name' => 'Librarian',
                'created_at' => '2018-07-04 16:13:10',
                'updated_at' => '2018-07-04 16:13:10',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'role_code' => 'U01',
                'role_name' => 'User',
                'created_at' => '2018-07-04 16:13:10',
                'updated_at' => '2018-07-04 16:13:10',
            ),
        ));
        
        
    }
}