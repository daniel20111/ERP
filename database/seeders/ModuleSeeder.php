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
            'name_module' => 'Dashboard',
            'icon_module' => '0xe1b1',
            'route_module' => 'dashboard',
        ]);
        
        Module::create([
            'name_module' => 'Usuarios',
            'icon_module' => '0xe61f',
            'route_module' => 'users',
        ]);
        Module::create([
            'name_module' => 'Productos',
            'icon_module' => '0xe1ae',
            'route_module' => 'products',
        ]);
        Module::create([
            'name_module' => 'Inventarios',
            'icon_module' => '0xe349',
            'route_module' => 'inventory',
        ]);
        Module::create([
            'name_module' => 'Almacenes',
            'icon_module' => '0xf05a0',
            'route_module' => 'warehouses',
        ]);
        Module::create([
            'name_module' => 'Cotizaciones',
            'icon_module' => '0xe0eb',
            'route_module' => 'quotations',
        ]);
        Module::create([
            'name_module' => 'Ventas',
            'icon_module' => '0xe4d8',
            'route_module' => 'sales',
        ]);
        Module::create([
            'name_module' => 'Facturas',
            'icon_module' => '0xf311',
            'route_module' => 'invoices',
        ]);

        Module::create([
            'name_module' => 'Inicio',
            'icon_module' => '0xe1b1',
            'route_module' => 'home',
        ]);
    }
}
