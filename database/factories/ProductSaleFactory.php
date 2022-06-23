<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_id = $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $product = Product::where('id', '=', $product_id)->with('prices')->get();
        $unit_price = $product[0]->prices[0]->price;
        $quantity = $this->faker->randomNumber(2, true);
        $total_price = $quantity * $unit_price;
        return [
            'product_id' => $product_id,
            'unit_price' => $unit_price,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ];
    }
}
