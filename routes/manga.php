<?php

use App\Http\Controllers\Manga\CommentController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manga\MangaController;
use App\Http\Controllers\Manga\GenreController;
use \App\Http\Controllers\Manga\FilterManga;

Route::resource('manga', MangaController::class);
Route::post('filter', FilterManga::class)
    ->name('filter');

# Comments for manga

Route::prefix('manga/{manga}')
    ->middleware(['auth', 'verified'])
    ->group(function() {
        Route::resource('comments', CommentController::class)
            ->only('store');
    });

Route::resource('comments', CommentController::class)
    ->middleware(['auth', 'verified'])
    ->only('destroy');

# -------------------

Route::resource('genre', GenreController::class);
