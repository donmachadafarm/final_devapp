<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Product;

class Inventory extends Model
{
    public static function viewInventory()
    {
        return static::orderBy('products_id', 'desc')
        ->latest('product_count')
        ->groupBy('products_id')
        ->get();
    }
    

    public function order_items(){
        return $this->has('App\Order_item');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    public $timestamps = false;

   
}
