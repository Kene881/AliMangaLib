
<?php

use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\News\Admin\NewsController;

Route::resource('news', NewsController::class);
