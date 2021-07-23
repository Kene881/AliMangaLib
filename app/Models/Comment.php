<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content'
    ];

    function comment() {
        return $this->morphTo();
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
