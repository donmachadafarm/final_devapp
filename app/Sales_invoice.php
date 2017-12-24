<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_invoice extends Model
{
    public static function createSalesInvoice(){
        return static::orderBy('id', 'desc')
        ->groupBy('type')
        ->get();
    }
}
