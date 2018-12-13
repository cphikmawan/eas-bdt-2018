<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('books')->delete();
        
        \DB::table('books')->insert(array (
            0 => 
            array (
                'id' => 1,
                'book_id' => 1,
                'book_name' => 'Komet',
                'book_publisher' => 'PT Gramedia Pustaka Utama',
                'book_author' => 'Tere Liye',
                'book_published' => '2018-07-04',
                'book_price' => '95000.00',
                'book_stock' => 10,
                'category_id' => 1,
                'created_at' => '2018-07-04 23:46:33',
                'updated_at' => '2018-07-04 23:46:35',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'book_id' => 2,
                'book_name' => 'Bintang',
                'book_publisher' => 'PT Gramedia Pustaka Utama',
                'book_author' => 'Tere Liye',
                'book_published' => '2018-07-04',
                'book_price' => '65000.00',
                'book_stock' => 7,
                'category_id' => 1,
                'created_at' => '2018-07-04 23:46:33',
                'updated_at' => '2018-07-04 23:46:35',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'book_id' => 3,
                'book_name' => 'Marmut',
                'book_publisher' => 'PT Gramedia Pustaka Utama',
                'book_author' => 'Raditya Dika',
                'book_published' => '2018-07-04',
                'book_price' => '40000.00',
                'book_stock' => 15,
                'category_id' => 2,
                'created_at' => '2018-07-04 23:46:33',
                'updated_at' => '2018-07-04 23:46:35',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}