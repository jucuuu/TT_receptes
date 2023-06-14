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
        Schema::create('keyword_ingredient_recipe', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('recipe_id');
            $table->bigInteger('keyword_ingredient_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyword_ingredient_recipe');
    }
};
