<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_controller;
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


Route::get('/Add',[Admin_controller::class,'add']);
Route::get('/Update',[Admin_controller::class,'update']);
Route::post('/add_car',[Admin_controller::class,'add_car'])->name('add_car');
// the register btn
Route::get('/register_admin_btn',[Admin_controller::class,'register']);
// the register form
Route::post('/register_admin',[Admin_controller::class,'register_admin'])->name('register_admin');