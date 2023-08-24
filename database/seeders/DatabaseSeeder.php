<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $num =1;
      /*   \App\Models\User::factory(10)->create();
        Shop::factory(5)->create();*/
        Category::factory(6)->create();
        $this->call(
            [
                UserSeeder::class,
              /*  ShopSeeder::class*/
            ]
        );

       /*  Product::factory(3)->create([
             'shop_id' => $num++
         ]);*/


        // \App\Models\UserController::factory()->create([
        //     'name' => 'Test UserController',
        //     'email' => 'test@example.com',
        // ]);
    }
}
