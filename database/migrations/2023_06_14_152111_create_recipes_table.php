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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description');
            $table->foreignId('user_id')->default(0)->constrained('users')->cascadeOnDelete();
            $table->foreignId('picture_id')->nullable()->constrained('pictures')->cascadeOnDelete();
            $table->string('steps');
            $table->foreignId('keyword_ingredient_id')->nullable()->constrained('keyword_ingredients')->cascadeOnDelete();
            $table->foreignId('keyword_type_id')->nullable()->constrained('keyword_types')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
