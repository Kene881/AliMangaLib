<?php

use App\Http\Controllers\Profile\UserController;
use App\Http\Controllers\ForumControllers\ForumController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'pages.index');

//$files = Storage::files('public/manga/Claymore');
//dd($files);
# Profile pages
Route::resource('users', UserController::class)
    ->middleware(['auth', 'verified'])
    ->only('edit', 'show', 'update');
