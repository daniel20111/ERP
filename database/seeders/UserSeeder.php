<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->state(['role_id' => 1])->create();
        User::factory()->state(['role_id' => 2])->create();
        User::factory()->state(['role_id' => 3, 'employee_id' => Employee::factory()->state(['branch_id' => 2])])->create();
        User::factory()->state(['role_id' => 4])->create();
        User::factory()->state(['role_id' => 5, 'employee_id' => Employee::factory()->state(['branch_id' => 2])])->create();
        User::factory()->state(['role_id' => 6, 'employee_id' => Employee::factory()->state(['branch_id' => 2])])->create();

        User::factory()->state(['role_id' => 3, 'employee_id' => Employee::factory()->state(['branch_id' => 3])])->create();
        User::factory()->state(['role_id' => 5, 'employee_id' => Employee::factory()->state(['branch_id' => 3])])->create();
        User::factory()->state(['role_id' => 6, 'employee_id' => Employee::factory()->state(['branch_id' => 3])])->create();

        User::factory()->state(['role_id' => 3, 'employee_id' => Employee::factory()->state(['branch_id' => 4])])->create();
        User::factory()->state(['role_id' => 5, 'employee_id' => Employee::factory()->state(['branch_id' => 4])])->create();
        User::factory()->state(['role_id' => 6, 'employee_id' => Employee::factory()->state(['branch_id' => 4])])->create();
    }
}
