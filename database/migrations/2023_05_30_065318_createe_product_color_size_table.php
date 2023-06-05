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
        Schema::create('product_color_size', function (Blueprint $table) {
            $table->id();


            $table->foreignId('product_color_size_product_size_id')
            ->nullable()
            ->constrained('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');



            $table->foreignId('product_color_size_product_color_id')
            ->nullable()
            ->constrained('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');






            $table->integer('quantity');
            $table->decimal('price_tow',10,2)->nullable();
            $table->decimal('descound',10,2)->nullable();
            $table->integer('status')->default(1);

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
