<?php

use App\Http\Controllers\Clerk\ClerkController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientCheckupController;
use App\Http\Controllers\DrugClassController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PettyCashController;
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
    Route::get('/edit/patient/{id}', 'editPatient')->name('edit.patient');
    Route::post('/update/patient/{id}', 'updatePatient')->name('update.patient');
    Route::get('/patient/prescription/history/{id}', 'patientPrescriptionHistory')->name('patient.prescription.history');
});

Route::group(['controller' => PatientCheckupController::class], function () {
    Route::get('/patient/checkup', 'getAllPatientCheckup')->name('all.patient.checkup');
    Route::get('/patient/history/{id}', 'patientHistory')->name('patient.history');
    Route::get('/patient/update/checkup/status/{id}', 'updatePatientCheckupStatus')->name('patient.update.checkup.status');
    Route::post('/store/patient/followup/checkup', 'storePatientFollowupCheckup')->name('store.patient.followup.checkup');
    Route::post('/update/checkup/status/{id}', 'updateCheckupStatus')->name('update.checkup.status');
    Route::get('/patient/followup/checkup/{id}', 'createPatientFollowupCheckup')->name('create.patient.followup.checkup');
});

Route::group(['controller' => DrugClassController::class], function () {
    Route::get('/create/drug/class', 'createDrugClass')->name('create.drug.class');
    Route::post('/store/drug/class', 'storeDrugClass')->name('store.drug.class');
    Route::get('/all/drug/class', 'index')->name('all.drug.class');
    Route::get('/edit/drug/class/{id}', 'editDrugClass')->name('edit.drug.class');
    Route::post('/update/drug/class/{id}', 'updateDrugClass')->name('update.drug.class');
});

Route::group(['controller' => ProductController::class], function () {
    Route::get('/create/product', 'createProduct')->name('create.product');
    Route::post('/store/product', 'storeProduct')->name('store.product');
    Route::get('/all/product', 'index')->name('all.product');
    Route::get('/edit/product/{id}', 'editProduct')->name('edit.product');
    Route::post('/update/product/{id}', 'updateProduct')->name('update.product');
    Route::get('/get/product/data/{id}', 'getSpecificProductData')->name('get.specific.product.data');
    Route::get('/get/laboratory/data/{id}', 'getSpecificLaboratoryData')->name('get.specific.laboratory.data');
});

Route::group(['controller' => PettyCashController::class], function () {
    Route::get('/petty/cash', 'index')->name('petty.cash');
    Route::get('create/petty/cash', 'createPettyCash')->name('create.petty.cash');
    Route::post('store/petty/cash', 'storePettyCash')->name('store.petty.cash');
    Route::get('edit/petty/cash/{id}', 'editPettyCash')->name('edit.petty.cash');
    Route::post('update/petty/cash/{id}', 'updatePettyCash')->name('update.petty.cash');
});