<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->id();

            $table->decimal('unit_price');
            $table->integer('quantity');
            $table->decimal('total_price');

            $table->foreignId('sale_id')->constrained('sales');
            $table->foreignId('product_id')->constrained('products');

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
        Schema::dropIfExists('product_sales');
    }
}
