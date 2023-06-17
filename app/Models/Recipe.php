<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover', 'description', 'type_tags',
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
}
