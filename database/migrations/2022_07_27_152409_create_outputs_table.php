<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sale_id')->constrained();
            $table->foreignId('seller_id')->references('id')->on('users');
            $table->foreignId('branch_id')->constrained();
            $table->dateTime('date_request');

            $table->boolean('approved');
            $table->foreignId('approved_by')->nullable()->references('id')->on('users');
            $table->dateTime('aprroved_date')->nullable();

            $table->boolean('delivered');
            $table->foreignId('delivered_by')->nullable()->references('id')->on('users');
            $table->dateTime('delivered_date')->nullable();

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
        Schema::dropIfExists('outputs');
    }
}
