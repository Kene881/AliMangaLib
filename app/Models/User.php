<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Models\ForumModels\Forum;
use BenSampo\Enum\Enum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'avatar_path',
        'name',
        'email',
        'password',
        'sex',
        'about'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        'role'
    ];

    function forums(): HasMany {
        return $this->hasMany(Forum::class);
    }

    function comments() {
        return $this->hasMany(Comment::class);
    }

    function role(){
        return $this->belongsTo(Role::class);
    }

    function hasRole($role){
        if(!$this->role) return false;

        $role = is_array($role) ? $role : func_get_args();

        return (new UserRole($this->role->name))->in($role);
    }
}
