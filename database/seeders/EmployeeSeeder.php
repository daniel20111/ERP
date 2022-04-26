<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Employee::factory()->count()->for(
        //    User::factory()->for(Role::factory()->has(Module::factory()->count(3))))->create();
        Employee::factory()->count(3)->create();
    }
}
