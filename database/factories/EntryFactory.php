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
        return [
            'quantity_entry' => $this->faker->randomNumber(),
            'supplier_entry' => $this->faker->company(),
            'note_entry' => $this->faker->paragraph(),
            'product_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
