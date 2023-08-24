<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->lastName(),
            'category_id' => fake()->randomElement(['1','2','3','4','5','6',]),
            'description' => ' Inventore est tempore corrupti. Ipsum ut laboriosam et pariatur autem laudantium amet',
            'image' => fake()->image(),
            'price' => fake()->numberBetween(50,5000),
            'quantity' => fake()->numberBetween(10,100),
            'discount_price' => fake()->numberBetween(10,30),


        ];
    }
}
