<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_branch' => $this->faker->company(),
            'address_branch' => $this->faker->address(),
            'type_branch' => 'Sucursal',
        ];
    }
}
