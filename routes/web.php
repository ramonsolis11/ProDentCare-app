<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecialtyController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('patients', PatientController::class);
Route::resource('payments', PaymentController::class);
Route::resource('roles', RoleController::class);
Route::resource('specialties', SpecialtyController::class);

Route::get('/', function () {
    return view('welcome');
});









