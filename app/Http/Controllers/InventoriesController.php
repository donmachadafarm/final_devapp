<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Product;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $inventories = \App\Inventory::all();
        // $products = \App\Product::viewProduct();
        $products = \App\Product::all();

        //return $inventories-all();

        // return view('inventory.show', compact('inventories', 'products'));

          //return $inventories-all();
        //   $results = collect();
          
        // $results = collect();
          
      

        // foreach ($inventories as $inventory){
        //     $results->push($inventory);
            
        // }
        //   foreach ($products as $product){
        //     $results->push($product);
        // }
        //$products = Product:: all();

        
          return view('inventory.show', compact('inventories', 'products'))
          ->with('product', $products)
          ->with('inventory',$inventories);

    }

    // public function test($id) {
    //     $quotes = Persona::with('quotes')->find($id)->quotes;
    //     return View::make('quotes.index')->with('quotes', $quotes);
    // }

    public function viewProducts()
    {
        //$products = \App\Product::where('id','=',0)->get();
        $allproducts = \App\Product::pluck('name','id')->all();
        // $data = \App\Product::all();
        // $convs = json_encode($data);

        $data = \App\Inventory::all();
        $convs = json_encode($data);
        
        $products = \App\Product::with('name');

        return view ('inventory.show',['data'=> json_decode($convs,true)]);
        //dd ($products,$allproducts);
    }

    public function test($id) {
        $quotes = Persona::with('quotes')->find($id)->quotes;
        return View::make('quotes.index')->with('quotes', $quotes);
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
        //
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
