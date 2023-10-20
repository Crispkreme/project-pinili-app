<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntityController;

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
});

Route::group(['controller' => EntityController::class], function () {
    Route::get('/create/representative', 'createRepresentative')->name('create.representative');
    Route::post('/store/representative', 'storeRepresentative')->name('store.representative');
    Route::get('/all/representative', 'index')->name('all.representative');
    Route::get('/edit/representative/{id}', 'editRepresentative')->name('edit.representative');
    Route::get('/update/representative/{id}', 'updateRepresentative')->name('update.representative');
    Route::get('/update/status/active/entity/{id}', 'updateEntityActiveStatus')->name('update.status.active.entity');
    Route::get('/update/status/not/active/entity/{id}', 'updateEntityNotActiveStatus')->name('update.status.notactive.entity');
});
