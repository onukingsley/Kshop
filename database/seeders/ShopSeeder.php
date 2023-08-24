<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::factory()->count(10)
            ->hasProduct(20)
            ->create();

        Shop::factory()->count(5)
            ->hasProduct(8)
            ->create();
        Shop::factory()->count(8)
            ->hasProduct(15)
            ->create();
    }
}
