<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_order_item extends Model
{
    public function job_order(){
        return $this->belongsTo('App\Job_order');
    }

    public function stock(){
        return $this->belongsTo('App\Stock');
    }

    public $timestamps = false;
}
