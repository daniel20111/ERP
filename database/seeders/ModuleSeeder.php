<?php

namespace Database\Seeders;

use Database\Factories\ModuleFactory;
use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name_module' => 'Inicio',
            'icon_module' => '0xf05a0',
            'route_module' => 'homepage',
        ]);
        Module::create([
            'name_module' => 'Productos',
            'icon_module' => '0xe185',
            'route_module' => 'product',
        ]);
        Module::create([
            'name_module' => 'Inventarios',
            'icon_module' => '0xe349',
            'route_module' => 'inventory',
        ]);
        Module::create([
            'name_module' => 'Facturación',
            'icon_module' => '0xe481',
            'route_module' => 'billing',
        ]);
        Module::create([
            'name_module' => 'Empleados',
            'icon_module' => '0xe61e',
            'route_module' => 'employee',
        ]);
        Module::create([
            'name_module' => 'Sucursales',
            'icon_module' => '0xf05a0',
            'route_module' => 'branch',
        ]);
        Module::create([
            'name_module' => 'Ingresos',
            'icon_module' => '0xf05a0',
            'route_module' => 'entry',
        ]);
        Module::create([
            'name_module' => 'Orden de Ingreso',
            'icon_module' => '0xf05a0',
            'route_module' => 'product_entry',
        ]);
        Module::create([
            'name_module' => 'Orden de Traspaso',
            'icon_module' => '0xf05a0',
            'route_module' => 'product_request',
        ]);
    }
}
