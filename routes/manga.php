<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manga\MangaController;
use App\Http\Controllers\Manga\GenreController;
use \App\Http\Controllers\Manga\FilterManga;

Route::resource('manga', MangaController::class);
Route::post('filter', FilterManga::class)
    ->name('filter');

Route::resource('genre', GenreController::class);
