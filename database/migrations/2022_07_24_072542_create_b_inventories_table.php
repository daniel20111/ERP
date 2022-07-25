<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_inventories', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity');
            $table->integer('remain_units');

            $table->foreignId('product_id')->constrained();
            $table->foreignId('section_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_transfer_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_inventories');
    }
}
