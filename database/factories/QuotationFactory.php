<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuotationFactory extends Factory
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
            'name_quotation' => $this->faker->lastName(),
            'price_quotation' => $this->faker->randomFloat(2, 500, 5000),
            'date_quotation' => $this->faker->dateTimeThisYear(),
            'expiration_date' => $this->faker->dateTimeThisMonth(),
            'user_id' => $user_id,
            'branch_id' => $branch_id,
        ];
    }
}
