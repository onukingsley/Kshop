<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_name' => fake()->word(),
/*            'user_id' => fake()->randomElement([14,8,3,4,15,6,27]),*/
            'description' => ' Inventore est tempore corrupti. Ipsum ut laboriosam et pariatur autem laudantium amet',
            'address' => fake()->address(),
            'email' => fake()->unique()->email(),
            'phone_no' => fake()->phoneNumber(),
        ];
    }
}
