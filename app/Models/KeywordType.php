<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function recipes() {
        return $this->belongsToMany(Recipe::class, 'keyword_type_recipe', 'recipe_id', 'keyword_type_id');
    }
}
