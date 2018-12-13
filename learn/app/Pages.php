<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Pages extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'countviews';

    protected $fillable = [
        'key', 'name', 'count'
    ];
}