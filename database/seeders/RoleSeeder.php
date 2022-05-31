<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory()->count(10)->create();
        //Role::factory()->count(5)->has(Module::factory()->count(3))->create();
        $role = Role::create([
            'name_role' => 'Administrador',
            'description_role' => 'Acceso total',
        ]);
        $role->modules()->attach(1);
        $role->modules()->attach(2);
        $role->modules()->attach(3);
        $role->modules()->attach(4);
        $role->modules()->attach(5);
        $role->modules()->attach(6);
        $role->modules()->attach(7);
        $role->modules()->attach(8);
        $role->modules()->attach(9);
    }
}
