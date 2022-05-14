<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->string('name_product');
            // $table->string('image_product');
            // $table->string('length_product');
            // $table->string('height_product');
            // $table->string('weight_product');
            // $table->integer('units_box_product');
            // $table->string('brand_product');
            // $table->string('origin_product');

            $table->string('model_product');
            $table->string('description_product')->nullable();
            $table->string('url_image_product')->nullable();
            $table->string('format_product');
            $table->string('code_product')->nullable();
            $table->string('family_product')->nullable();
            $table->string('finish_product')->nullable();
            $table->string('brand_product')->nullable();
            $table->string('origin_product')->nullable();
            $table->string('unit_measure_product')->nullable();

            $table->integer('units_box_product')->nullable();
            $table->float('area_box_product')->nullable();
            $table->integer('boxes_pallet_product')->nullable();
            $table->float('area_pallet_product')->nullable();
            $table->float('weight_box_product')->nullable();
            $table->float('weight_pallet_product')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
