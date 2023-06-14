<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment'];
    public function recipes() {
        return $this->belongsTo(Recipe::class);
    }
    public function users() {
        return $this->belongsTo(User::class);
    }
    public function pictures() {
        return $this->hasMany(Picture::class);
    }
}
