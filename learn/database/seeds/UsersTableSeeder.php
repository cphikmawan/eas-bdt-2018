<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Cahya Putra Hikmawan',
                'email' => 'cp.hikmawan@gmail.com',
                'password' => '$2y$10$PHo1WdFo5.nkwDzk9b3NK.4qudRw2pTRbYu0tjx1Td2POC20JYHWi',
                'role_id' => 0,
                'remember_token' => 'TnDKnWVxkM2EQzLJcgcOchPN9yqaNpWpGWaK8D4dAIIp71YoQfoKbkLVPYGh',
                'created_at' => '2018-07-04 14:36:48',
                'updated_at' => '2018-07-04 14:36:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cahya Putra Hikmawan',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$9CBSg3Xjj9auuQ2SJFIVz.FZU8OvR2DynpWfqTb53EV916duh4Gcu',
                'role_id' => 1,
                'remember_token' => 'qgfFXDysHBmTJMTVrfMaGuPYV54IIseJnwV03sJCyhW8EqA5boNV0wM51F9V',
                'created_at' => '2018-07-04 16:13:10',
                'updated_at' => '2018-07-04 16:13:10',
            ),
        ));
        
        
    }
}