<?php

namespace Database\Seeders;

use App\Models\ProductQuotation;
use App\Models\Quotation;
use Database\Factories\QuotationFactory;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quotation::factory()->count(30)->has(ProductQuotation::factory()->count(3))->create();
    }
}
