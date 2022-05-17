<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntryOrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entry_order_id' => $this->faker->numberBetween(1, 5),
            'product_id' => $this->faker->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(10, 100),
        ];
    }
}
