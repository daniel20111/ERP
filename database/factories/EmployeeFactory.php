<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'names_employee' => $this->faker->name(),
            'last_name_employee' => $this->faker->lastName(),
            'CI_employee' => $this->faker->phoneNumber(),
            'birth_date_employee' => $this->faker->date(),
            'branch_id' => Branch::factory()
        ];
    }
}
