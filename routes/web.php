<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    if (Auth::check())
    {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role_id == 2) {
            return redirect()->route('cashier.dashboard');
        } elseif (Auth::user()->role_id == 3) {
            return redirect()->route('checker.dashboard');
        } elseif (Auth::user()->role_id == 4) {
            return redirect()->route('office.dashboard');
        } else {
            dd('error page');
        }
    }
});

Route::get('/404', function () {
    return view('404');
})->name('404');

require __DIR__.'/auth.php';
