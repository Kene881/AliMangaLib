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

    protected $with = [
        'comments'
    ];

    function genre(){
        return $this->belongsTo(Genre::class);
    }

    function comments() {
        return $this->hasMany(Comment::class);
    }
}
