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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('name', 24);
            $table->float('price',8,2);
            $table->foreignId('currencie_id');
            $table->integer('api_status');
            $table->string('api_sale_url',255)->nullable();
            $table->string('api_sale_id',255)->nullable();
            $table->string('api_sale_code',255)->nullable();
            $table->string('api_transaction_id',255)->nullable();
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
        Schema::dropIfExists('sales');
    }
};
