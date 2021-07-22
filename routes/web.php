<?php

use App\Http\Controllers\Manga\CommentController;
use App\Http\Controllers\Profile\UserController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'pages.index');

//$files = Storage::files('public/manga/Claymore');
//dd($files);
# Profile pages
Route::resource('users', UserController::class)
    ->middleware(['auth', 'verified'])
    ->only('edit', 'update');

Route::resource('users', UserController::class)
    ->middleware(['auth'])->only('show');

Route::delete('users/{user}/image', [UserController::class, 'deleteImage'])
    ->middleware(['auth', 'verified'])
    ->name('users.deleteImage');

# Comments
Route::resource('comments', CommentController::class)
    ->middleware(['auth', 'verified'])
    ->only('store');

Route::post('comments/{comment}/reply/store', [CommentController::class, 'replyStore'])
    ->name('replies.store');

Route::resource('comments', CommentController::class)
    ->middleware(['auth', 'verified'])
    ->only('destroy');
