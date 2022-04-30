<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name_product' => $this->faker->colorName(),
        'image_product' => $this->faker->url(),
        'length_product' => $this->faker->randomNumber(),
        'height_product' => $this->faker->randomNumber(),
        'weight_product' => $this->faker->randomNumber(),
        'units_box_product' => $this->faker->randomNumber(),
        'brand_product' => $this->faker->company(),
        'origin_product' => $this->faker->country()
        ];
    }
}
