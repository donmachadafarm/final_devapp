<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Product;
use App\Stock;
use DB;

class ViewInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $stocks = stock::orderBy('product_id', 'desc')
        ->latest()
        ->groupBy('product_id')
        ->get();
       
        $stocks = stock::orderBy('product_id', 'desc')
        ->latest()
        ->groupBy('product_id')
        ->get();

        
        $inventories = stock::orderBy('product_id', 'desc')
        ->latest('product_count')
        ->groupBy('product_id')
        ->get();
        $products = product:: all();


        // // $data = DB::table('products')
        
        // // ->join('inventories', 'products.product_id', '=', 'inventories.productID')
        // // ->orderBy('products.product_id', 'desc')
        // // ->groupBy('products.product_id')
        // // ->get();

        // // return view('inventory.index')
        // // ->with('all', $data);
        

        return view('inventory.index')
        ->with('inventory', $inventories)
        ->with('product', $products)
        ->with('stock', $stocks);

       
        



    }

   public function insertInventory() {
        
        
    }


    public function subtractInventory()
    {
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('inventory.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $stocks = stocks::all();
        

        $new = new inventory;
        $new->inventory_id = "6";
        $new->productID = "1";
        $new->product_count = '45';
        $new->date_accessed = "2017-11-28";
        $new->accessed_by = "admin";
        $new->save();

        return redirect('/inventory');
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
