<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



//PUBLIC route
Route::get('/', \App\Http\Controllers\WelcomeController::class);

Route::resource('users', \App\Http\Controllers\UserController::class)->only('index', 'show');
Route::resource('activities', \App\Http\Controllers\ActivityController::class)->only('index');

Route::get('/quests', [\App\Http\Controllers\QuestController::class, 'index'])->name('quests.index');
Route::get('/quests/{id}', [\App\Http\Controllers\QuestController::class, 'show'])->name('quests.show');



//USER route
Route::redirect('/dashboard', 'quests')->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::resource('quests', \App\Http\Controllers\User\QuestController::class);
    Route::resource('activities', \App\Http\Controllers\User\ActivityController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
