<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function(Blueprint $table) {
		    $table->increments('id');
		    $table->integer('products_id')->unsigned();
		    $table->integer('product_count');
		    $table->date('date_accessed');
		    $table->string('accessed_by', 45);
		});

    }

    /**
     * Reverse the migrations.
     *
     * @return voids
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
