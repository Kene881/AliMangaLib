<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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

        $this->uploadImage($user, $request);

        return redirect()->route('users.show', $user);
    }

    function deleteImage(User $user) {
        //$this->authorize('update', $user);

        $this->removeImage($user);
        $user->update([
            'avatar_path' => null
        ]);

        return back();
    }

    function uploadImage(User $user, UserRequest $request) {
        if (!$request->hasFile('avatar_path'))
            return;

        # store image in /storage/app/public/posts
        $path = $request->file('avatar_path')->store('public/users');

        if ($path === false)
            throw ValidationException::withMessages([
                'avatar_path' => 'Sorry, server error. Image path problem'
            ]);

        $this->removeImage($user);
        $user->update(['avatar_path' => $path]);
    }

    function removeImage(User $user): bool {
        if (!$user->avatar_path)
            return false;
        return Storage::delete($user->avatar_path);
    }
}
