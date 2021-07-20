<?php

use App\Http\Controllers\Profile\UserController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'pages.index');

# Profile pages
Route::resource('users', UserController::class)
    ->middleware(['auth', 'verified'])
    ->only('edit', 'update');

Route::resource('users', UserController::class)
    ->middleware(['auth'])->only('show');

Route::delete('users/{user}/image', [UserController::class, 'deleteImage'])
    ->middleware(['auth', 'verified'])
    ->name('users.deleteImage');
