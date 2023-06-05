<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('product_color',function(Blueprint $table){
            $table->increments('id');
            // $table->foreignId('pruduct_id')->Unsigned();
            // $table->foreign('product_id')->references('id')->on('products');
            $table->string('color');
            $table->foreignId('product_id')
            ->nullable()
            ->constrained('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
