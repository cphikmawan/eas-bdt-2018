<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use SoftDeletes;
    
    protected $table = 'books';
 	protected $primaryKey = 'id';
    protected $fillable = [
        'book_id',
        'book_name',
        'book_publisher',
        'book_author',
        'book_published',
        'book_price',
        'book_stock',
        'category_id',
    ];
    protected $dates = ['deleted_at'];

    public function kategori()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
