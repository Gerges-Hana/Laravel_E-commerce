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
        Schema::create('order_detelles', function (Blueprint $table) {
            $table->id();
            // $table->integer('order_id')->unsigned();
            // $table->foreign('order_id')->references('id')->on('orders');
            // $table->foreign('product_color_size_id')->references('id')->on('product_color_size');

            $table->foreignId('product_color_size_id')
            ->nullable()
            ->constrained('product_color_size')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('order_id')
            ->nullable()
            ->constrained('orders')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->integer('quantity');
            $table->decimal('price',10,2)->nullable();
            $table->decimal('diccound',10,2)->nullable();


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
