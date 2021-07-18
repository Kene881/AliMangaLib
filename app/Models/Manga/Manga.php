<?php

namespace App\Models\Manga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image_path', 'genre_id'
    ];

    function genre(){
        return $this->belongsTo(Genre::class);
    }

    function chapters(){
        return $this->hasMany(Chapter::class);
    }
}
