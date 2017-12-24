<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Order;


class Purchase_order extends Model
{
    protected $fillable = ['id', 'customer_name', 'customer_contactNo'];

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public $timestamps = false;
    
    
}
