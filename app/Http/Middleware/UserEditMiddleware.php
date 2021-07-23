<?php

namespace App\Http\Middleware;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class UserEditMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->route('user');
        if (auth()->user()->id != $user->id)
            abort(403);

        return $next($request);
    }
}
