<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Product::factory()->count(10)->has(Price::factory())->create();

        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/vvaC00mh.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/V1IRFAM.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/6PCpDaA.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/JGqtowb.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/HYRLYxu.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/q2KgjLT.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/WozJdSi.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/6HVvi68.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/ZwzrR7k.jpg'])->create();
        Product::factory()->has(Price::factory())->state(['url_image_product' => 'https://i.imgur.com/rz3H05q.jpg'])->create();

    }
}
