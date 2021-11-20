<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// user routes
Route::get('/', [UserController::class, 'getUserData']);
Route::view('create', 'create');
Route::post('create', [UserController::class, 'createUserData']);
Route::get('moreinfo/{id}', [UserController::class, 'UserData']);
Route::get('edit/{id}', [UserController::class, 'getEditData']);
Route::post('edit', [UserController::class, 'editUserData']);
Route::get('delete/{id}', [UserController::class, 'deleteUserData']);
Route::post('search', [UserController::class, 'searchUserData']);

// user login routes
Route::view('register', 'register');
Route::post('register', [loginController::class, 'registerUser']);
Route::view('login', 'login');
Route::post('login', [loginController::class, 'loginUser']);
Route::get('logout', [loginController::class, 'logoutUser']);