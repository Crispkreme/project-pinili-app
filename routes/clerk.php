<?php

use App\Http\Controllers\Clerk\ClerkController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientCheckupController;
use Illuminate\Support\Facades\Route;

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
Route::group(['controller' => ClerkController::class], function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::group(['controller' => PatientController::class], function () {
    Route::get('/patient', 'getPatient')->name('all.patient');
    Route::get('/create/patient', 'addPatient')->name('create.patient');
    Route::post('/store/patient', 'storePatient')->name('store.patient');
});

Route::group(['controller' => PatientCheckupController::class], function () {
    Route::get('/patient/checkup', 'getAllPatientCheckup')->name('all.patient.checkup');
});