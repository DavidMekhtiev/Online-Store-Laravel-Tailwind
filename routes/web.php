<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//Katalog
Route::get('/games/{id}', [GameController::class, 'gameById'])->name('games.id');
Route::post('/games/find', [GameController::class, 'find'])->name('games.find');
Route::post('/games/jernes', [GameController::class, 'gamesByGenre'])->name('games.jenres');

//Users
Route::get('/admin/users', [UserController::class, 'getUsers'])->name('admin.users.table');
Route::get('/admin/users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/update/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

//Jenres
Route::get('/admin/jenres', [JenreController::class, 'getJenres'])->name('admin.jenres.table');
Route::get('/admin/jenres/edit/{jenre}', [JenreController::class, 'edit'])->name('admin.jenres.edit');
Route::put('/admin/jenres/update/{jenre}', [JenreController::class, 'update'])->name('admin.jenres.update');
Route::delete('/admin/jenres/delete/{jenre}', [JenreController::class, 'destroy'])->name('admin.jenres.destroy');
Route::get('/admin/jenres/create/form', [JenreController::class, 'goToCreatePage'])->name('admin.jenres.create.form');
Route::post('/admin/jenres/create', [JenreController::class, 'create'])->name('admin.jenres.create');

//Games
Route::get('/admin/games', [GameController::class, 'allGames'])->name('admin.games.table');
Route::get('/admin/games/edit/{game}', [GameController::class, 'edit'])->name('admin.games.edit');
Route::put('/admin/games/update/{game}', [GameController::class, 'update'])->name('admin.games.update');
Route::delete('/admin/games/delete/{game}', [GameController::class, 'destroy'])->name('admin.games.destroy');
Route::get('/admin/games/create/form', [GameController::class, 'goToCreatePage'])->name('admin.games.create.form');
Route::post('/admin/games/create', [GameController::class, 'create'])->name('admin.games.create');

//Account
Route::get('/account', [UserController::class, 'getAccount'])->name('account');
Route::get('/account/cart', [UserController::class, 'getCart'])->name('account.cart');
Route::get('/account/cart/buy', [UserController::class, 'buyGames'])->name('account.cart.buy');
Route::delete('/account/cart/delete/{id}', [UserController::class, 'deleteFromCart'])->name('account.cart.delete');
Route::get('/account/cart/add/{id}', [UserController::class, 'addToCart'])->name('account.cart.add');
Route::get('/account/history', [UserController::class, 'getHistory'])->name('account.history');