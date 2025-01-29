<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/login', [LoginController::class, 'login']);

// Route::post('/dashboard', return view('dashboard'));

Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');

// Show the edit form for a specific user
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Update the user data
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');



Route::get('/', function () {
    return view('welcome');
});
