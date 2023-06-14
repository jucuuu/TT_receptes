<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'steps', 'user_id'];
    public function ingredients() {
        return $this->hasMany(KeywordIngredient::class);
    }
    public function types() {
        return $this->hasMany(KeywordType::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function users() {
        return $this->belongsTo(User::class, 'name');
    }
    public function pictures() {
        return $this->hasMany(Picture::class);
    }
}