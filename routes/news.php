<?php

use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\News\NewsController;

Route::resource('news', NewsController::class);
