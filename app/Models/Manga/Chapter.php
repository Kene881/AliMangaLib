<?php

namespace App\Models\Manga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'manga_id',
    ];

    function manga(){
        return $this->belongsTo(Manga::class);
    }
}
