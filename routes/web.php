<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TodayController;

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


Route::get('/', [AppointmentController::class,'index']);
Route::delete('/appointments/{appointment}', [AppointmentController::class,'destroy']);
Route::get('/today', [TodayController::class,'index']);
Route::get('/appointments/create', [AppointmentController::class,'create']);
Route::post('/appointments', [AppointmentController::class,'store']);

Route::get('/doctors', [DoctorController::class,'index']);
Route::get('/doctors/create', [DoctorController::class,'create']);
Route::get('/doctors/{doctor}/edit', [DoctorController::class,'edit']);
Route::post('/doctors', [DoctorController::class,'store']);
Route::put('/doctors/{doctor}', [DoctorController::class,'update']);
Route::delete('/doctors/{doctor}', [DoctorController::class,'destroy']);

