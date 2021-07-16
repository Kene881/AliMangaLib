<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manga\MangaController;
use App\Http\Controllers\Manga\GenreController;

Route::resource('manga', MangaController::class);
Route::resource('genre', GenreController::class);
