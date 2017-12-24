<?php

namespace App;
use App\Inventory;
use App\Product;
use App\Stock;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function order(){
      return $this->belongsTo('App\Order');
    }
    
    public static function viewProducts()
    {
        return static::orderBy('id', 'desc')
        ->groupBy('name')
        ->get();
    }

    public function inventory(){
        return $this->belongsTo('App\Inventory');
    }

    public function product_ingredients(){
        return $this->has('App\Product_ingredient');
    }

    public function stock(){
        return $this->belongsTo('App\Stock');
    }

    public static function viewProduct()
    {
        return static::orderBy('id', 'desc')
        ->get();
    }

    public $timestamps = false;
}
