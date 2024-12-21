<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OnlineController;
/* Start Admin */

Auth::routes();
Route::get('/admin/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/techer', [HomeController::class, 'techer'])->name('admin_techer');
Route::post('/admin/techer/story', [HomeController::class, 'techer_story'])->name('admin_techer_story');
Route::put('/admin/techer/update/{id}', [HomeController::class, 'techer_update'])->name('admin_techer_update');
Route::get('/admin/cours', [HomeController::class, 'cours'])->name('admin_cours');
Route::post('/admin/cours/story', [HomeController::class, 'cours_story'])->name('admin_cours_story');



/* Start End */

/* Start User */
Route::get('/', [OnlineController::class, 'index'])->name('user_home');
Route::get('/home', [OnlineController::class, 'index'])->name('user_home');
Route::get('/techer', [OnlineController::class, 'techer'])->name('user_techer');
Route::get('/cours', [OnlineController::class, 'cours'])->name('user_cours');
