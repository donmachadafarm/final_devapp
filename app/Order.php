<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order_item;
use Illuminate\Http\Request;
use App\Product;


class Order extends Model
{
    protected $fillable = ['id', 'customer_name', 'customer_contactNo'];

    public function order_item(){
        return $this->has('App\Order_item');
    }

    public function job_order(){
        return $this->hasOne('App\Job_order');
    }

    public function product(){
      return $this->hasOne('App\Product');
    }

    public function saveOrder($r){
        DB::table('orders')->insert($r);
      }

    public function viewInventory(){

    }

    public static function jobOrder()
    {
        return Product::orderBy('id', 'desc')
        ->join('inventories', 'products.id', 'inventories.products_id')
        ->join('stocks', 'stocks.products_id', '=', 'products.id')
        ->select('products.id', 'stocks.product_count', 'inventories.product_count')
        ->get();
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

    public static function checkPending()
    {
        return static::orderBy('id', 'desc')
        ->where('status', '=', 'Pending')
        ->get();

        // return Order_item::orderBy('id', 'desc')
        // ->join('order_items', 'orders.id', 'order_items.orders_id')
        // ->where('orders.status', '=', 'Pending')
        // ->select('orders.id', 'order_items.id')
        // ->paginate(10);

    }

    public $timestamps = false;
}
