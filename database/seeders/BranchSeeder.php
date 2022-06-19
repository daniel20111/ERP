<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Section;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::factory()->has(Warehouse::factory()->count(4)->has(Section::factory()->count(3)))->state(['type_branch' => 'Casa Matriz'])->create();
        Branch::factory()->count(3)->has(Warehouse::factory()->count(4)->has(Section::factory()->count(3)))->create();
    }
}
