<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();

        Schema::table('inventories', function (Blueprint $table) {
          $table->foreign('products_id')
              ->references('id')->on('products');
        });

        Schema::table('orders', function (Blueprint $table) {
          $table->foreign('ordertype')
  		        ->references('id')->on('order_types');
          $table->foreign('products_id')
  		        ->references('id')->on('products');
        });
        //
        // Schema::table('job_order_items', function (Blueprint $table) {
        //   $table->foreign('stocks_id')
        //       ->references('id')->on('stocks');
        //   $table->foreign('job_orders_id')
        //       ->references('id')->on('job_orders');
        // });

        Schema::table('order_items', function (Blueprint $table) {
          $table->foreign('orders_id')
              ->references('id')->on('orders');
          $table->foreign('inventories_id')
              ->references('id')->on('inventories');
          $table->foreign('stocks_id')
              ->references('id')->on('stocks');
        });

        Schema::table('product_ingredients', function (Blueprint $table) {
          $table->foreign('products_id')
              ->references('id')->on('products');
          $table->foreign('ingredients_id')
              ->references('id')->on('ingredients');
        });

        Schema::table('stocks', function (Blueprint $table) {
          $table->foreign('products_id')
              ->references('id')->on('products');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('migrations');
    }
}
