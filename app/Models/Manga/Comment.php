<?php

namespace App\Models\Manga;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    protected $with = [
        'user'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function manga() {
        return $this->belongsTo(Manga::class);
    }
}
