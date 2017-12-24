<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Inventory::class, function (Faker $faker) {
    static $password;
    $products = App\Stock::pluck('products_id')->toArray();
    $productcount = App\Stock::pluck('product_count')->toArray();

    return [
        'products_id' => $faker->unique()->randomElement($products),
        'product_count' => $faker->randomElement($productcount),
        'date_accessed' => $faker->date($format = 'Y-m-d'),
        'accessed_by'=> $faker->randomElement($array = array ('sales', 'finance', 'admin'), $count = 1),

    ];
});

$factory->define(App\Stock::class, function (Faker $faker) {
    static $password;

    $products = App\Product::pluck('id')->toArray();
    
        return [
        'products_id' => $faker->randomElement($products),
        'product_count' => $faker->numberBetween($min = -300, $max = 300),
        'date_accessed' => $faker->date($format = 'Y-m-d'),
        'accessed_by' => $faker->randomElement($array = array ('sales', 'finance', 'admin'))

    ];
});



$factory->define(App\Order_item::class, function (Faker $faker) {
    static $password;

    $stocks = App\Stock::pluck('id')->toArray();
    $orders = App\Order::pluck('id')->toArray();
    $ingredients = App\Ingredient::pluck('id')->toArray();

    return [
        'stocks_id' => $faker->randomElement($stocks),
        'orders_id' => $faker->randomElement($orders),
        'ingredients_id' => $faker->randomElement($ingredients),
    ];
});

$factory->define(App\Order_type::class, function (Faker $faker) {
    static $password;

    return [
        'type' => $faker->numberBetween($min = 1, $max = 2),
    ];
});

$factory->define(App\Ingredient::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->randomElement($array = array ('Coconut', 'Petal', 'Water','Oil','Extract'))
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    //static $password;

    return [
       
        'name'=> $faker->unique()->randomElement($array = array ('Soap', 'Shampoo', 'Lotion', 'Detergent', 'Repellent')),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 4),
        'uom'=> $faker->randomElement($array = array ('Bottle/s', 'Box/es', 'mL', 'L')),
        
    ];
});


$factory->define(App\Product_ingredient::class, function (Faker $faker) {
    static $password;

    return [
        'ingredients_id' => function(){
            return factory(App\Ingredient::class)->create()
            ->id;
        },
        'products_id' => function(){
            return factory(App\Product::class)->create()
            ->id;
        },
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'usertype'=> $faker->randomElement($array = array ('sales', 'finance', 'admin'), $count = 1),
        'password' => $password ?: $password = bcrypt('secret'),
        // 'remember_token' => str_random(10),
        
       // 'id' => $faker->unique()->randomDigit,
        
    ];
});