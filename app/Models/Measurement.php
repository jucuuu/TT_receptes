<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short'];

    public function recipes() {
        return $this->belongsToMany(Recipe::class);
    }
}
