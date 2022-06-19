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
            'name_role' => 'Administrador del Sistema',
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

        $role = Role::create([
            'name_role' => 'Administrador - Casa Matriz',
            'description_role' => 'Acceso a Dashboard, Usuarios, Productos, Almacenes, Ventas, Facturas',
        ]);
        $role->modules()->attach(1); //dashboard
        $role->modules()->attach(2); //usuarios
        $role->modules()->attach(3); //productos
        //$role->modules()->attach(4); //inventarios
        $role->modules()->attach(5); //almacenes
        //$role->modules()->attach(6); //cotizaciones
        $role->modules()->attach(7); //ventas
        $role->modules()->attach(8); //facturas

        $role = Role::create([
            'name_role' => 'Supervisor - Sucursal',
            'description_role' => 'Acceso a Dashboard, Almacenes, Ventas, Facturacion',
        ]);
        $role->modules()->attach(1);
        //$role->modules()->attach(2);
        //$role->modules()->attach(3);
        //$role->modules()->attach(4);
        $role->modules()->attach(5);
        //$role->modules()->attach(6);
        $role->modules()->attach(7);
        $role->modules()->attach(8);

        $role = Role::create([
            'name_role' => 'Encargado de Inventarios - Casa Matriz',
            'description_role' => 'Acceso a Dashboard, Inventarios',
        ]);
        $role->modules()->attach(1);
        //$role->modules()->attach(2);
        //$role->modules()->attach(3);
        $role->modules()->attach(4);
        //$role->modules()->attach(5);
        //$role->modules()->attach(6);
        //$role->modules()->attach(7);
        //$role->modules()->attach(8);

        $role = Role::create([
            'name_role' => 'Encargado de Inventarios - Sucursal',
            'description_role' => 'Acceso a Dashboard, Inventarios',
        ]);
        $role->modules()->attach(1);
        //$role->modules()->attach(2);
        //$role->modules()->attach(3);
        $role->modules()->attach(4);
        //$role->modules()->attach(5);
        //$role->modules()->attach(6);
        //$role->modules()->attach(7);
        //$role->modules()->attach(8);

        $role = Role::create([
            'name_role' => 'Encargado de Ventas',
            'description_role' => 'Dashboard, Productos, Cotizaciones, Facturas',
        ]);
        $role->modules()->attach(1);
        //$role->modules()->attach(2);
        $role->modules()->attach(3);
        //$role->modules()->attach(4);
        //$role->modules()->attach(5);
        $role->modules()->attach(6);
        $role->modules()->attach(7);
        $role->modules()->attach(8);
    }
}
