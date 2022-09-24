<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = $this->faker->numberBetween($min=10, $max=300);
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(5),
            'price' => $price,
            'slug' => $this->faker->word()
        ];
    }
}
