<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/edit/user', 'getAllUser')->name('edit.user');
});
