<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



//PUBLIC route
Route::get('/', \App\Http\Controllers\WelcomeController::class);

Route::resource('users', \App\Http\Controllers\UserController::class)->only('index', 'show');
Route::resource('quests', \App\Http\Controllers\QuestController::class);



//USER route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
