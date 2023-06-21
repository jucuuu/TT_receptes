<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Type;
use App\Models\Ingredient;
use App\Models\Measurement;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover', 'user_id', 'description', 'type_tags',
        'ingredient_tags', 'steps'];

    public function scopeFilter($query, array $filters) {
        if ($filters['ttag'] ?? false) {
            $query->where('type_tags', 'like', '%'. request('ttag'). '%');
        }
        if ($filters['itag'] ?? false) {
            $query->where('ingredient_tags', 'like', '%'. request('itag'). '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%'. request('search'). '%')
                  ->orWhere('description', 'like', '%'. request('search'). '%')
                  ->orWhere('type_tags', 'like', '%'. request('search'). '%')
                  ->orWhere('ingredient_tags', 'like', '%'. request('search'). '%')
                  ->orWhere('steps', 'like', '%'. request('search'). '%');
        }
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function sortComments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ingredients() {
        return $this->belongsToMany(Ingredient::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function measurements() {
        return $this->belongsToMany(Measurement::class);
    }
}
