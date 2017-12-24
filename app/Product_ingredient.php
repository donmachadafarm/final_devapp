<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_ingredient extends Model
{
    public function ingredient(){
        return $this->belongsTo('App\Ingredient');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public $timestamps = false;
}
