<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Access;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Access::factory()->times(3)->create();
        //Role::factory()->times(5)->create();

        //Role::factory()->count(5)->has(Access::factory()->count(3))->create();
        $this->call([
            ModuleSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            //EmployeeSeeder::class,
            BranchSeeder::class,
            ProductSeeder::class,
            EntryOrderSeeder::class,
            EntryOrderProductSeeder::class,
            EntrySeeder::class,
            SaleSeeder::class,
        ]);
    }
}
