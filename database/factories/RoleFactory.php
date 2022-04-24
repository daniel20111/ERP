<?php

namespace Database\Factories;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Role::class;

    public function definition()
    {
        return [
            //
            'name_role'=>$this->faker->jobTitle(),
            'description_role'=>$this->faker->text()
        ];
    }
}
