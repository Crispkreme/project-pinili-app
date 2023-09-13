<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\EntityController;
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
Route::group(['controller' => AdminController::class], function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/create/user', 'createUser')->name('create.user');
    Route::post('/store/user', 'storeUser')->name('store.user');
    Route::get('/all/user', 'getAllUser')->name('all.user');
    Route::get('/edit/user/{id}', 'editUser')->name('edit.user');
});
Route::group(['controller' => EntityController::class], function () {
    Route::get('/create/representative', 'createRepresentative')->name('create.representative');
    Route::post('/store/representative', 'storeRepresentative')->name('store.representative');
    Route::get('/all/representative', 'index')->name('all.representative');
    Route::get('/edit/representative/{id}', 'editRepresentative')->name('edit.representative');
    Route::get('/update/representative/{id}', 'updateRepresentative')->name('update.representative');
});
Route::group(['controller' => CompanyController::class], function () {
    Route::get('/create/company', 'createCompany')->name('create.company');
    Route::post('/store/company', 'storeCompany')->name('store.company');
    Route::get('/all/company', 'index')->name('all.company');
    Route::get('/edit/company/{id}', 'editCompany')->name('edit.company');
    Route::post('/update/company/{id}', 'updateCompany')->name('update.company');
});
Route::group(['controller' => DistributorController::class], function () {
    Route::get('/create/distributor', 'createDistributor')->name('create.distributor');
    Route::post('/store/distributor', 'storeDistributor')->name('store.distributor');
    Route::get('/all/distributor', 'index')->name('all.distributor');
    Route::get('/edit/distributor/{id}', 'editDistributor')->name('edit.distributor');
    Route::post('/update/distributor/{id}', 'updateDistributor')->name('update.distributor');
});
