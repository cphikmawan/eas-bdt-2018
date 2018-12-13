<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = 'category';
 	protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'category_name',
    ];
    protected $dates = ['deleted_at'];

    public function buku()
    {
        return $this->hasMany('App\Books','id_kategori');
    }
}
