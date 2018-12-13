<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category')->delete();
        
        \DB::table('category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'category_name' => 'Fantasi',
                'created_at' => '2018-07-04 23:49:23',
                'updated_at' => '2018-07-04 23:49:24',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 2,
                'category_name' => 'Komedi',
                'created_at' => '2018-07-04 23:49:39',
                'updated_at' => '2018-07-04 23:49:39',
            ),
        ));
        
        
    }
}