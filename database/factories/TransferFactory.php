<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = $this->faker->randomElement([3, 7, 10]);
        $branchId = Employee::where('id', '=', 3)->first('branch_id')->branch_id;

        return [
            'branch_id' => $branchId,
            'user_id' => $userId,
            'verified' => false,
            'date' => $this->faker->dateTimeThisYear(),
        ];
    }
}
