<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->string('type_branch');
            $table->string('address');
            $table->string('city');
            $table->string('nit_company');
            $table->integer('number_invoice');
            $table->string('auth_code');
            $table->dateTime('date');
            $table->string('nit_client');
            $table->string('client');
            $table->decimal('total');
            $table->decimal('fc_base');
            $table->string('literal');
            $table->text('quote');

            $table->foreignId('sale_id')->constrained();

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
        Schema::dropIfExists('invoices');
    }
}
