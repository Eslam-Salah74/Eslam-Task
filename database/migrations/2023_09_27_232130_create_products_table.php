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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_id')->nullaple()->constrained('shipingrates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullaple();
            $table->string('price')->nullaple();
            $table->double('vat')->nullaple();
            $table->double('discount')->nullaple();
            $table->string('weight')->nullaple();
            $table->double('sale_price')->nullaple();
            $table->double('shipping_rate')->nullaple();
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
        Schema::dropIfExists('products');
    }
};
