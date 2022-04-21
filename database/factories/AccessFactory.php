<?php

namespace Database\Factories;

use App\Models\Access;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected  $model = Access::class;

    public function definition()
    {
        return [
            //
            'module_name'=>$this->faker->text(),
        ];
    }
}
