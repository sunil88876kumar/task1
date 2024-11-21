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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->string('category')->nullable();
            $table->boolean('is_purchasable')->default(1);
            $table->boolean('is_published')->default(0);
            $table->string('image')->nullable();
            $table->integer('rating')->default(0);
            $table->dateTime('available_from')->nullable();
            $table->dateTime('available_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
