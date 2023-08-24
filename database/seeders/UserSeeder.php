<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Database\Factories\ShopFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory(17)
            ->has(Shop::factory()->has(Product::factory()->count(5),'product'),'shop')
            ->create()
        ;
        User::factory()
            ->count(20)
            ->create()
        ;

    }
}
