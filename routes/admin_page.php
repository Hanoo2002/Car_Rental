<?php

use App\Http\Controllers\General_controller;
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
    Route::get('/Add', [Admin_controller::class, 'add']);
    Route::get('/Update', [Admin_controller::class, 'update']);
    Route::get('/Users', [Admin_controller::class, 'users']);
    Route::post('/add_car', [Admin_controller::class, 'add_car'])->name('add_car');
// the register btn
    Route::get('/register_admin_btn', [Admin_controller::class, 'register']);
// the register form
    Route::post('/register_admin', [Admin_controller::class, 'register_admin'])->name('register_admin');

    Route::get('/search_user', [Admin_controller::class, 'search'])->name('search_user');
    Route::get('/original_page', [Admin_controller::class, 'originalPage'])->name('original_page');
    Route::get('/View', [Admin_controller::class, 'view_tab']);

    Route::get('/search_car', [Admin_controller::class, 'search_car_admin'])->name('search_car');
    Route::get('/back_car', [Admin_controller::class, 'originalPage_car'])->name('back_car');

    Route::post('/update_car', [Admin_controller::class, 'update_car'])->name('update_car');
    Route::post('/delete_car', [Admin_controller::class, 'delete_car'])->name('delete_car');

    // tab1
    Route::get('/Reservations', [Admin_controller::class, 'Reservations']);
    Route::post('/Reservations_apply', [Admin_controller::class, 'Reservations_apply']);

    // tab2
    Route::get('/carReservation', [Admin_controller::class, 'carReservation']);
    Route::post('/carReservations_apply', [Admin_controller::class, 'carReservations_apply']);
    
    // tab3
    Route::get('/carStatus', [Admin_controller::class, 'carStatus']);
    Route::post('/carStatus_apply', [Admin_controller::class, 'carStatus_apply']);

    // tab4
    Route::get('/customerReservation', [Admin_controller::class, 'customerReservation']);
    Route::post('/customerReservation_apply', [Admin_controller::class, 'customerReservation_apply']);

    // tab5
    Route::get('/payements', [Admin_controller::class, 'payements']);
    Route::post('/payements_apply', [Admin_controller::class, 'payements_apply']);

    Route::get('/add_office', [Admin_controller::class, 'add_office']);
    Route::post('/add_office_apply' ,[Admin_controller::class, 'add_office_apply']);
        
