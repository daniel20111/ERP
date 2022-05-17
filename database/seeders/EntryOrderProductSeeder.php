<?php

namespace Database\Seeders;

use App\Models\EntryOrderProduct;
use Illuminate\Database\Seeder;

class EntryOrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntryOrderProduct::factory()->count(20)->create();
    }
}
