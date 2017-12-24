<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('/', 'DashboardController@index');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function(){
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', 'CreateJobOrderController@show');

//Route::post('createjoborder', ['as' => 'joborder', 'uses' => 'CreateJobOrderController@store']);
Route::post('createjoborder',function(){

    $order_item = Order_item::create([
        'name' => Input::get('order_items')
    ]);

    $order = new Order([
        'name' => Input::get('orders')
    ]);

    // purchaseorder hasmany order
    // order belongsto purchaseorder
    // purchaseorder = order_items
    // inventory hasmany products
    // products belongsto inventory
    $order_item->orders()->save($orders);

});

//Route::get('createjoborder', 'CreateJobOrderController@viewProducts');
Route::post('createjoborder', 'CreateJobOrderController@store');
Route::get('purchaseorder', 'PurchaseOrderController@viewProducts');
Route::post('purchaseorder', 'PurchaseOrderController@store');
//Route::get('createjoborder', 'CreateJobOrderController@test');

Route::resource('salesreport', 'SalesReportController');
//Route::resource('createsalesinvoice','SalesInvoiceController');
Route::resource('joborder', 'CreateJobOrderController');
Route::resource('purchaseorder', 'PurchaseOrderController');
Route::resource('orderstatus', 'PurchaseOrderStatusController');
Route::resource('payment','PaymentsController');
Route::resource('salesinvoice','SalesInvoiceController');
Route::resource('delivery','DeliveryReceiptsController');
Route::resource('inventory', 'InventoriesController');
Route::resource('ingredient', 'IngredientsController');
Route::post('finalize','PaymentsController@finalizePayment');
Route::post('finalized','PaymentsController@store');
Route::post('finalizeIV','SalesInvoiceController@finalizeInvoice');
Route::post('finalizeSIV','SalesInvoiceController@store');
//Route::get('test/register', array('uses'=>'TestController@create'));
//Route::resource('ordershandler','OrdersHandlerController');
Auth::routes();
