<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\ProductSale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::factory()->count(200)->has(ProductSale::factory()->count(4))->create();
    }
}
