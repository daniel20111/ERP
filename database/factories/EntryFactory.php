<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $section_id = $this->faker->numberBetween(13, 48);
        $quantity = $this->faker->numberBetween(600, 1000);
        return [
            'quantity_entry' => $quantity,
            'remain_entry' => $quantity,
            'product_id' => $this->faker->numberBetween(1, 10),
            'section_id' => $section_id,
            'entry_order_products_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
