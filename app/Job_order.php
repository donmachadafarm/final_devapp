<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Job_order extends Model
{
    protected $fillable = ['id','customer_name','customer_contactNo']; 

    public static function createJobOrder(){
        return static::orderBy('id', 'desc')
        ->groupBy('type')
        ->get();
    }

    public function job_order_item(){
        return $this->has('Apps\Job_order_item');
    }

    public static function createOrder()
    {

        $lastTrackID = $orders::orderBy('trackID', DESC)->pluck('trackID')->first();
        $plucked = $order_types->pluck('walkin_type');
        $plucked2 = $job_orders->pluck('id');
        

        $customer_name = Input::get('customer_name');
        $customer_contact = Input::get('customer_contactNo');
        $issued_date= date("Y-m-d");
        $accessed_date= date("Y-m-d");
        $accessed_by = Input::get('user_id');
        $status = "Pending";
        $trackID = $lastTrackID + 1;
        $ordertype = $plucked->all();
        $job_id = $plucked2->all();


        $query = "INSERT INTO orders (customer_name, customer_contactNo,issued_date, accessed_date, accessed_by, status, trackID) 
                               VALUES (?, ?, ?, ?, ?, ?, ?)";
        foreach ($order as $orders) {
            $values = [$customer_name,$customer_contact,$issued_date,$accessed_date,$accessed_by,$status, $trackID];
            DB::insert($query, $values);
        }
        return back()->with('message','Features add successfully!');
    }

    public $timestamps = false;
}
