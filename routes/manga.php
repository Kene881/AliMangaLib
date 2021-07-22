<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manga\MangaController;
use App\Http\Controllers\Manga\GenreController;
use \App\Http\Controllers\Manga\FilterManga;
use App\Http\Controllers\Manga\ChapterController;

Route::resource('manga', MangaController::class);
Route::post('filter', FilterManga::class)
    ->name('filter');

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

//    Route::put('{manga}', [ChapterController::class, 'update'])
//        ->name('update');//todo

    Route::get('show/{chapter}', [ChapterController::class, 'show'])
        ->name('show');//yes

    Route::get('{chapter}/{manga}/edit', [ChapterController::class, 'edit'])
        ->name('edit');//yes

    Route::delete('/{chapter}', [ChapterController::class, 'destroy'])
        ->name('destroy');//yes
});

//|        | GET|HEAD  | manga                           | manga.index                     | App\Http\Controllers\Manga\MangaController@index                               | web
//|
//|        | POST      | manga                           | manga.store                     | App\Http\Controllers\Manga\MangaController@store                               | web
//|
//|        | GET|HEAD  | manga/create                    | manga.create                    | App\Http\Controllers\Manga\MangaController@create                              | web
//|
//|        | GET|HEAD  | manga/{manga}                   | manga.show                      | App\Http\Controllers\Manga\MangaController@show                                | web
//|
//|        | PUT|PATCH | manga/{manga}                   | manga.update                    | App\Http\Controllers\Manga\MangaController@update                              | web
//|
//|        | DELETE    | manga/{manga}                   | manga.destroy                   | App\Http\Controllers\Manga\MangaController@destroy                             | web
//|
//|        | GET|HEAD  | manga/{manga}/edit              | manga.edit

