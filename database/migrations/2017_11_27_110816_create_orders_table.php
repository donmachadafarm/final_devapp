<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
		    $table->increments('id');
		    $table->string('customer_name', 45);
		    $table->string('customer_contactNo', 11);
		    $table->date('issued_date');
		    $table->string('accessed_by', 45);
		    $table->string('status', 45);
		    $table->string('trackID', 45);
		    $table->integer('ordertype')->unsigned()->nullable();
        $table->integer('products_id')->unsigned()->nullable();
        $table->integer('quantity');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
