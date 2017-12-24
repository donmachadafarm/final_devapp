<?php

namespace App\Http\Controllers;

use DB;
//use App\Job_Order;
use App\Order;
use App\Product;
use App\Inventory;
use App\Job_order;
use App\Stock;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateJobOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roles = \App\Product::all();
        // $selectedRole = \App\Product::first()->products_id;
        // //$roles = \App\Product::lists('name', 'id');

        // return view('joborder.show', compact('roles', 'selectedRole'));

        $products = Product::where('id','=',0)->get();
        $allproducts = Product::pluck('name','id')->all();
        $data = Product::all();
        $convs = json_encode($data);

        return view ('joborder.show',['data'=> json_decode($convs,true)]);

    }


    // public function manageCategory()
    // {
    //     $categories = category::where ('parent_id','=',0)->get();
    //     $allCategories = category::pluck('title','id')->all();
    //     $data = category::all();
    //     $convs = json_encode($data);

    //     return view ('content.categoryTreeView',compact('categories','allCategories'));

    // }

    public function viewProducts()
    {
        //$products = Product::where('id','=',0)->get();
        //$allproducts = Product::pluck('name','id')->all();
        $data = Product::all();
        $convs = json_encode($data);

        return view ('joborder.show',['data'=> json_decode($convs,true)]);
        //dd ($products,$allproducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // $roles = \App\Product::all();
        // $selectedRole = \App\Product::first()->products_id;
        // //$roles = \App\Product::lists('name', 'id');

        // return view('joborder.show', compact('roles', 'selectedRole'));


        //$inventories = new Inventory;
        // $inventories = Inventory::where('id','=',$request->input('stock'))
        // ->pluck()
        // ->get();

        //$inventory = Inventory::where('id','=',$request->input('product'))->get();
        // $inventorycount = Inventory::pluck('product_count','id')->all();

        // $inventory = Inventory::where('id','=',$request->input('product'))->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $stock = new Stock;

        $stock->products_id = $request->input('product');
        $stock->product_count = $request->input('stock');
        $stock->date_accessed = Carbon::today();
        $stock->accessed_by = Auth::user()->name;

        // Auth::user()->username;
        $stock->save();

        $inventories = Inventory::pluck('product_count','id')
        ->get($request->input('product'));
        $addCount = $request->input('stock');
        $finCount = $addCount + $inventories;

        Inventory::where('products_id',$request->input('product'))->update(array(
            'product_count'=>$finCount,));

        return redirect('joborder');
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
