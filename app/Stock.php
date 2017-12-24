<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Product;
use DB;

class Stock extends Model
{
    //
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function orderItem()
    {
        return $this->belongsTo('App\Order_item');
    }


    public function jobOrderItem()
    {
        return $this->belongsTo('App\Job_order_item');
    }

    public function Product()
    {
        return $this->hasMany('App\Product');
    }


    public static function viewStocks()
    {
        return static::orderBy('products_id', 'desc')
        ->update('product_count')
        ->groupBy('products_id')
        ->get();

    }

    public static function updateInventory()
    {
        // return Product::orderBy('id', 'desc')
        // ->join('inventories', 'products.id', 'inventories.products_id')
        // ->join('stocks', 'stocks.products_id', '=', 'products.id')
        // ->select('products.id', 'stocks.product_count', 'inventories.product_count')
        // ->get();
    }


}
