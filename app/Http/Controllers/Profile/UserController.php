<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('pages.profiles.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('pages.profiles.form', [
            'user' => $user
        ]);
    }

    function update(UserRequest $request, User $user) {
        $user->fill($request->validated());
        $user->save();

        return redirect()->route('users.show', $user);
    }
}
