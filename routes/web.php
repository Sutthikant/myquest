<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class);


Route::resource('users', UserController::class) -> only('index', 'show');

Route::resource('quests', QuestController::class);



