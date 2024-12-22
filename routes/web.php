<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\OrderController;
/* Start Admin */

Auth::routes();
Route::get('/admin/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/users', [HomeController::class, 'users'])->name('admin_users');
Route::get('/admin/techer', [HomeController::class, 'techer'])->name('admin_techer');
Route::post('/admin/techer/story', [HomeController::class, 'techer_story'])->name('admin_techer_story');
Route::put('/admin/techer/update/{id}', [HomeController::class, 'techer_update'])->name('admin_techer_update');
Route::get('/admin/cours', [HomeController::class, 'cours'])->name('admin_cours');
Route::get('/admin/cours/{id}', [HomeController::class, 'cours_show'])->name('admin_cours_show');
Route::post('/admin/cours/story', [HomeController::class, 'cours_story'])->name('admin_cours_story');
Route::put('/admin/cours/update/image/{id}', [HomeController::class, 'cours_image_update'])->name('admin_image_update');
Route::put('/admin/cours/update/all/{id}', [HomeController::class, 'cours_update_all'])->name('admin_all_update');
Route::post('/admin/cours/item/story', [HomeController::class, 'cours_item_story'])->name('admin_cours_item_story');
Route::delete('/admin/cours/item/delete/{id}', [HomeController::class, 'cours_item_delete'])->name('admin_cours_item_delete');
Route::get('/admin/cours/item/show/{id}', [HomeController::class, 'cours_item_show'])->name('admin_cours_item_show');
Route::put('/admin/cours/item/show/story', [HomeController::class, 'cours_item_update'])->name('admin_cours_item_show_update');

Route::get('/admin/contact', [HomeController::class, 'contact'])->name('admin_contact');
Route::post('/admin/contact/create', [HomeController::class, 'contact_create'])->name('admin_contact_create');
Route::put('/admin/contact/update/{id}', [HomeController::class, 'contact_update'])->name('admin_contact_update');



/* Start End */

Route::get('/', [OnlineController::class, 'index'])->name('user_home');
Route::get('/home', [OnlineController::class, 'index'])->name('user_home');
Route::get('/techer', [OnlineController::class, 'techer'])->name('user_techer');
Route::get('/contact', [OnlineController::class, 'contact'])->name('user_contact');
Route::post('/contact_add', [OnlineController::class, 'message_add'])->name('user_contact_add');
Route::get('/cours', [OnlineController::class, 'cours'])->name('user_cours');
Route::get('/cours_show/{id}', [OnlineController::class, 'user_cours_show'])->name('user_cours_show');

Route::get('/kirish', [UserController::class, 'login'])->name('user_login');
Route::post('/kirish', [UserController::class, 'login_post'])->name('login_post');

Route::get('/registr', [UserController::class, 'registr'])->name('user_registr');
Route::post('/registr/post', [UserController::class, 'register_post'])->name('register_post');

Route::get('/confirm', [UserController::class, 'confirm_email'])->name('confirm_email');



/* Cours  CoursController  */
Route::get('/lessin_show/{id}', [CoursController::class, 'lessin_show'])->name('lessin_show');

Route::get('/my_cours', [CoursController::class, 'my_cours'])->name('my_cours');
Route::get('/my_cours_show/{id}', [CoursController::class, 'my_cours_show'])->name('my_cours_show');
Route::get('/my_cours_show_item/{cours_id}/{item_id}', [CoursController::class, 'my_cours_show_item'])->name('my_cours_show_item');


Route::get('/paymart/{id}', [OrderController::class, 'paymart'])->name('paymart');
