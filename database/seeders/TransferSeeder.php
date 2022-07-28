<?php

namespace Database\Seeders;

use App\Models\ProductTransfer;
use App\Models\Transfer;
use Illuminate\Database\Seeder;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transfer::factory()->count(20)->has(ProductTransfer::factory()->count(3))->create();
    }
}
