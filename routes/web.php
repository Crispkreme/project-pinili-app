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
})->name('/');

Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role_id == 2) {
            return redirect()->route('manager.dashboard');
        } elseif (Auth::user()->role_id == 3) {
            return redirect()->route('clerk.dashboard');
        } elseif (Auth::user()->role_id == 4) {
            return redirect()->route('labtech.dashboard');
        } elseif (Auth::user()->role_id == 5) { 
            return redirect()->route('cashier.dashboard');
        } else {
            return view('404');
        }
    }
});

Route::get('/404', function () {
    return view('404');
})->name('404');

require __DIR__.'/auth.php';
