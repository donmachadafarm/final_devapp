<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function(Blueprint $table) {
		    //$table->engine = 'InnoDB';

		    $table->increments('id');
		    $table->integer('stocks_id')->unsigned();
        $table->integer('orders_id')->unsigned();
        $table->integer('inventories_id')->unsigned();
        $table->integer('order_quantity')->unsigned();

		    //$table->primary('id')->autoIncrement();

		    // $table->index('stocks_id','stocks_id_idx');
            // $table->index('orders_id','orders_id_idx');
            // $table->index('inventories_id','inventories_id_idx');

            /*
		    $table->foreign('orderitem_orderid')
		        ->references('inventory_id')->on('s');
            */

		    //$table->timestamps();

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
