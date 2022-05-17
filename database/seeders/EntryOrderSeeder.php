<?php

namespace Database\Seeders;

use App\Models\EntryOrder;
use App\Models\Product;
use Illuminate\Database\Seeder;

class EntryOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //EntryOrder::factory()->count(4)->hasAttached(Product::factory()->count(4), ['quantity' => random_int(1, 100)])->create();
        //EntryOrder::factory()->hasProducts(4)->create();
        EntryOrder::factory()->count(5)->create();
    }
}
