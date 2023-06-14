<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = ['link'];
    public function recipes() {
        return $this->belongsTo(Recipe::class);
    }
    public function comments() {
        return $this->belongsTo(Comment::class);
    }
}
