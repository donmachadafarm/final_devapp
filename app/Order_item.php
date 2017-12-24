<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $fillable = [
        'id', 
        'customer_name', 
        'customer_contactNo'
    ];

    public function inventory(){
        return $this->belongsTo('App\Inventory');
    }

    public function ingredient(){
        return $this->belongsTo('App\Ingredient');
    }

    public function order(){
        return $this->hasMany('App\Order');
    }

    public function stock(){
        return $this->belongsTo('App\Stock');
    }

    public static function createSalesInvoice(){
        return static::orderBy('id', 'desc')
        ->groupBy('type')
        ->get();
    }
    public $timestamps = false;
}
