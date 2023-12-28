<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
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


Route::get('/Add',[Admin::class,'add']);
Route::post('/add_car',[Admin::class,'add_car'])->name('add_car');
// Route::get('/register',[CustomAuthController::class,'register']);
// Route::post('/register_user',[CustomAuthController::class,'registerUser'])->name('register_user');
// Route::get('/admin_profile',[CustomAuthController::class,'adminProfile']);
// Route::get('/user_profile',[CustomAuthController::class,'userProfile']);