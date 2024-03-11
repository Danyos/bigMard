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
        Schema::create('item_other_informates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('item_models')->onDelete('cascade');
            $table->longText('imgText')->nullable();
            $table->string('youtubUrl')->nullable();
            $table->string('coverImages')->nullable();
            $table->string('underImages')->nullable();
            $table->string('middle_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_other_informates');
    }
};
