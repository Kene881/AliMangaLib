<?php


use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;

Route::resource('forums', ForumController::class)
    ->except('index','show')
    ->middleware('auth');

Route::resource('forums', ForumController::class)
    ->only('index', 'show');


