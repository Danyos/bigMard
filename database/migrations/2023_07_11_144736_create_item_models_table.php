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
        Schema::create('item_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             $table->string('count')->default(1);
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->longText('description');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->dateTime('auction_end_time')->nullable();
//            $table->integer('category_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_models')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_models');
    }
};
