
<?php

use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\News\Admin\NewsController;
use App\Http\Controllers\Manga\Admin\MangaController;

Route::resource('news', NewsController::class);

