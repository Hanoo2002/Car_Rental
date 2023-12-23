<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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


Route::get('/',[CustomAuthController::class,'login']);
Route::get('/register',[CustomAuthController::class,'register']);
Route::post('/register_user',[CustomAuthController::class,'registerUser'])->name('register_user');
Route::post('/login_user',[CustomAuthController::class,'loginUser'])->name('login_user');