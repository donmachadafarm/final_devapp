<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public static function viewIngredient()
    {
        return static::orderBy('id', 'desc')
        ->groupBy('name')
        ->get();
    }
    
    public function product_ingredients(){
        return $this->has('App\Product_ingredient');
    }

    public $timestamps = false;
}
