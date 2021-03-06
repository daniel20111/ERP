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
        //Quotation::factory()->count(50)->has(ProductQuotation::factory()->count(3))->create();
        Sale::factory()->count(100)->has(ProductSale::factory()->count(4))->create();
    }
}
