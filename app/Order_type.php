<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_type extends Model
{
    public static function createOrderType(){
        return static::orderBy('id', 'desc')
        ->groupBy('type')
        ->get();
    }

    public $timestamps = false;
}
