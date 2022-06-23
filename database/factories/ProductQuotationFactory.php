<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductQuotationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quantity = $this->faker->randomNumber(2, true);
        $unit_price = $this->faker->randomFloat(2, 80, 300);
        $total_price = $quantity * $unit_price;
        return [
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'total_price' => $total_price,
            //'quotation_id',
            'product_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
        ];
    }
}
