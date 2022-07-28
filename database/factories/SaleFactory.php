<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = $this->faker->randomElement([6, 9, 12]);
        $user = User::where('id', '=', $user_id)->with('employee')->get();
        $branch_id = $user[0]->employee->branch_id;
        return [
            'name_sale' => $this->faker->lastName(),
            'nit_sale' => $this->faker->postcode(),
            'user_id' => $user_id,
            'branch_id' => $branch_id,
            'total_sale' => $this->faker->randomFloat(2, 300, 5000),
            'date_sale' => $this->faker->dateTimeThisYear(),
        ];
    }
}
