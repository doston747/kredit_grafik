<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graph_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('credit_product_id');
            $table->integer('claim_client_id');
            $table->integer('ordering');
            $table->integer('paid');
            $table->float('loan',16);
            $table->date('month');
            $table->float('total_loan',32);
            $table->float('percent_loan',32);
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
        Schema::dropIfExists('graph_clients');
    }
};
