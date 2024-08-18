<?php

use App\Http\Controllers\ApiController;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/check', [ApiController::class,'check']);
Route::post('/appointment/update', [ApiController::class,'appointment_date']);
Route::post('/doctor/check/available', [ApiController::class,'check_doctor_available']);
