<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordIngredient extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    // M:M relationship with Recipe::class needed
    public function recipes() {
        return $this->belongsToMany(Recipe::class, 'keyword_ingredient_recipe', 'recipe_id', 'keyword_ingredient_id');
    }
}
