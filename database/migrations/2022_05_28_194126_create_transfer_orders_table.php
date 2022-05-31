<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_orders', function (Blueprint $table) {
            $table->id();

            $table->boolean('sent');
            $table->boolean('received');

            $table->foreignId('transfer_id')->constrained('transfers');
            $table->foreignId('send_by')->nullable()->constrained('users');
            $table->timestamp('send_date')->nullable();
            
            $table->foreignId('received_by')->nullable()->constrained('users');
            $table->timestamp('received_date')->nullable();
            

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
        Schema::dropIfExists('transfer_orders');
    }
}
