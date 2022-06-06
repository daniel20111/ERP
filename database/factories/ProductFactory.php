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
        /* 'name_product' => $this->faker->colorName(),
        'image_product' => $this->faker->url(),
        'length_product' => $this->faker->randomNumber(),
        'height_product' => $this->faker->randomNumber(),
        'weight_product' => $this->faker->randomNumber(),
        'units_box_product' => $this->faker->randomNumber(),
        'brand_product' => $this->faker->company(),
        'origin_product' => $this->faker->country() */

        'model_product' => $this->faker->colorName(),
        'description_product' => $this->faker->paragraph(),
        'url_image_product' => $this->faker->url(),
        'format_product' => $this->faker->randomElement(['40x40', '60x60', '80x80']),
        'code_product' => $this->faker->countryCode(),
        'family_product' => $this->faker->freeEmail(),
        'finish_product' => $this->faker->randomElement(),
        'brand_product' => $this->faker->company(),
        'origin_product' => $this->faker->country(),
        'unit_measure_product' => $this->faker->randomElement(),

        'units_box_product' => $this->faker->randomNumber(),
        'area_box_product' => $this->faker->randomNumber(),
        'boxes_pallet_product' => $this->faker->randomNumber(),
        'area_pallet_product' => $this->faker->randomNumber(),
        'weight_box_product' => $this->faker->randomNumber(),
        'weight_pallet_product' => $this->faker->randomNumber(),

        ];
    }
}
