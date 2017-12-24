<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Inventory;
use App\Order_Type;

use Carbon\Carbon;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;


class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$status = \App\Order::checkPending();
        // $products = \App\Product::where('id','=',0)->get();
        // $allproducts = \App\Product::pluck('name','id')->all();
        // $data = \App\Product::all();
        // $convs = json_encode($data);

        $data = \App\Product::all();
        $convs = json_encode($data);

        $type = \App\Order_Type::all();
        $convs1 = json_encode($type);

        return view ('purchaseorder.show',['data'=> json_decode($convs,true),'type'=>json_decode($convs1,true)]);
        //dd($type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function addMore()
    {
        return view("addMore");
    }

    public function addMorePost(Request $request)
    {
        $rules = [];

        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            foreach($request->input('name') as $key => $value) {
                TagList::create(['name'=>$value]);
            }

            return response()->json(['success'=>'done']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function viewProducts()
    {

        //dd ($products,$allproducts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function(){
    //     $job_order = App\Order::order()->id;
    //     $name = $request->input('cusName');
    //     $num = $request->input('cusNum');
    //     $stock = $request->input('stock');
    //     $product = $request->input('product');
    //     $date = $request->input('date');
    //     $status = ('Pending');

    //     $order_data = array(
    //     'customer_name' => $name,
    //     'customer_contactNo' =>$num,
    //     'issued_date'=>$date,
    //     'status'=>$status
    //  );
    // DB::table('orders')->insert($order_data);

    // return view('hi');
    // }

    public function store(Request $request)
    {
        $order = new Order;

        $order->customer_name = $request->input('cusName');
        $order->customer_contactNo = $request->input('cusNum');
        //$order->products_id = $request->input('product');
        $order->issued_date = Carbon::today();
        $order->trackID = time() . rand(10*45, 100*98);
        $order->ordertype =  $request->input('cusType');
        $order->status = 'Pending';
        $order->accessed_by = Auth::user()->name;
        $order->products_id = $request->input('product');
        $order->quantity = $request->input('productCount');
        //$order->ordertype = $request->input('cus_type');
        //$order->trackID = uuID('###');

        $inventories = Inventory::pluck('product_count','id')
        ->get($request->input('product'));

        $order->save();

        return redirect('purchaseorder');
    }

    public function Calvin2(){
        $input = $request->all();

                //$var = $index['cusName'];
                // $order = new Order;
                // $order->customer_name = $input('cusName');
                // $order->customer_contactNo = $input('cusNum');
                // $order->issued_date = $input('date');
                // $order->status = 'Pending';
                // $order->save();

                // return view('hi');

                //$request = Request::all();
                // $condition = $request['customer_name'];
                // foreach ($condition as $key => $condition) {
                   // $order = new Order;
                    // $order->issued_date = $request['product'][$key];
                    // $order->obtainedmarks = $request['stock'][$key];
                    //$student->save();
                    // echo 'Hi';
                    // dd($order);
                // }

                $ordershandler = new Orders_Handler;

                $ordershandler->orders_id = $input['product'];
                $ordershandler->customer_name = $input['cusName'];
                $ordershandler->customer_number = $input['cusNum'];
                $ordershandler->customer_type = $input['cusType'];
                $ordershandler->products_id = $input['product'];
                $ordershandler->quantity = $input['stock'];
                $ordershandler->status = 'Pending';

                $ordershandler->save();

                return 'hi';
    }

    public function Calvin(){
            $request = Request::all();
            $condition = $request['name'];
            foreach ($condition as $key => $condition) {
                $student = new User;
                $student->name = $request['name'][$key];
                $student->fname = $request['fname'][$key];
                $student->rollno = $request['rollno'][$key];
                $student->obtainedmarks = $request['obtainedmarks'][$key];
                $student->totalmarks = $request['totalmarks'][$key];
                $student->percentage = $request['percentage'][$key];
                //$student->save();
                echo 'Hi';
                //dd($student);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
