<?php

use App\Http\Controllers\Manga\CommentController;
use App\Http\Controllers\Profile\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Manga\Manga;
use App\Models\News\News;

Route::get('/', function () {
    $mangas = Manga::query()
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

    $news = News::query()
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    return view('pages.index', [
        'mangas' => $mangas,
        'news' => $news
    ]);
});

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
