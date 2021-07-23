<?php

use \Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manga\Admin\MangaController;
use App\Http\Controllers\Manga\GenreController;
use App\Http\Controllers\Manga\ChapterController;

Route::resource('manga', MangaController::class);

Route::resource('genre', GenreController::class);
Route::resource('chapter', ChapterController::class)
    ->only('update');

Route::prefix('chapter')
    ->name('chapter.')
    ->group(function (){

        Route::get('{manga}', [ChapterController::class, 'index'])
            ->name('index');//yes

        Route::get('create/{manga}', [ChapterController::class, 'create'])
            ->name('create');//yes

        Route::post('/', [ChapterController::class, 'store'])
            ->name('store');//yes

        Route::get('show/{chapter}', [ChapterController::class, 'show'])
            ->name('show');//yes

        Route::get('{chapter}/{manga}/edit', [ChapterController::class, 'edit'])
            ->name('edit');//yes

        Route::delete('/{chapter}', [ChapterController::class, 'destroy'])
            ->name('destroy');//yes
    });

