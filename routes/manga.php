<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manga\MangaController;
use App\Http\Controllers\Manga\GenreController;
use \App\Http\Controllers\Manga\FilterManga;
use App\Http\Controllers\Manga\ChapterController;

Route::resource('manga', MangaController::class)
    ->only('index', 'show');

Route::post('filter', FilterManga::class)
    ->name('filter');

Route::prefix('chapter')
    ->name('chapter.')
    ->group(function (){

    Route::get('{manga}', [ChapterController::class, 'index'])
        ->name('index');//yes

    Route::get('show/{chapter}', [ChapterController::class, 'show'])
        ->name('show');//yes
});
