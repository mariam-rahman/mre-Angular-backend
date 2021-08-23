<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubstocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('substocks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('purchase_id');
            $table->integer('qty');
            $table->integer('remaining_qty');
            $table->integer('stock_id');
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
        Schema::dropIfExists('substocks');
    }
}
