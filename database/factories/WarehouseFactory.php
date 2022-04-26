<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_warehouse' => $this->faker->streetName(),
            //'branch_id' => Branch::factory()->count(3)->create()
        ];
    }
}
