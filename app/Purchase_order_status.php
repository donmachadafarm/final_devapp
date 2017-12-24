<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_order_status extends Model
{
    //protected $fillable = ['id', 'customer_name', 'customer_contactNo'];
    
    public function order(){
        return $this->belongsTo('App\Order');
    }
}
