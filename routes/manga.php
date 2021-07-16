<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manga\MangaController;

Route::resource('manga', MangaController::class);
