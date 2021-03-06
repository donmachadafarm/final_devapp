<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;


class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Order::all();
      $convs = json_encode($data);

      return view ('salesinvoice.show',['data'=> json_decode($convs,true)]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $orderid = Order::pluck('id','id')
      // ->get($request->input('prodid'));

      //dd($orderid);
      Order::where('id',$request->input('prodid'))
      ->update(array('status'=>'For Delivery'));

      $data = Order::all();
      $convs = json_encode($data);

      return view ('salesinvoice.show',['data'=> json_decode($convs,true)]);
    }
    public function finalizeInvoice(Request $request){

      //product deets -> name,quantity,totalprice,status
      //push changes if not paid
      //stock will change and inventory
      //button will not show if not paid
      $product = Product::pluck('price','id')
      ->get($request->input('product'));

      $quantity = Order::pluck('quantity','products_id')
      ->get($request->input('product'));
      // $quantity = DB::table('orders')->pluck('quantity','products_id')->where('products_id','=',$request->input('product'))->get();
      $payment = $product * $quantity;

      $prod = Product::pluck('name','id')
      ->get($request->input('product'));

      $stat = Order::pluck('status','products_id')
      ->get($request->input('product'));

      // $proid = Product::pluck('id')
      // ->get($request->input('product'));

      $d['id'] = $request->input('order');
      $d['productQuantity'] = $quantity;
      $d['productPrice'] = $product;
      $d['payment'] = $payment;
      $d['name'] = $prod;
      $d['stat'] = $stat;


      // dd($d);

      $convs = json_encode($d);
      return view('salesinvoice.finalizeIV',['d'=> json_decode($convs,true)]);
      // ->with($prodprice, $product)->with($prodquan, $quantity)->with($cost, $payment)->with($prod, $prod);
      // dd($product,$quantity,$payment);
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
