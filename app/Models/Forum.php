<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Forum extends Model
{
    protected $fillable = [
        'title','likes','views','description'
    ];
    protected $attributes = [
        'likes' => 0,
        'views' => 0,

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }
}
