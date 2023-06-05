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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('image');
            $table->decimal('price',8,2)->nullable();
            $table->decimal('discount_price',8,2)->nullable();
 

      $table->foreignId('category_id')
      ->nullable()
      ->constrained('categories')
      ->onDelete('cascade')
      ->onUpdate('cascade');
            // $table->integer('category_id')->unsigned();
            // $table->foreignId('category_id')->constrained('categories');
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->softDeletes();

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
