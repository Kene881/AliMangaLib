<?php


use App\Http\Controllers\ForumControllers\ForumController;
use Illuminate\Support\Facades\Route;

Route::resource('forums', ForumController::class)
    ->except('index','show')
    ->middleware('auth');

Route::resource('forums', ForumController::class)
    ->only('index', 'show');


