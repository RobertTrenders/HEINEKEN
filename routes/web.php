<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
//BACKEND
use App\Http\Controllers\admin\DashboardController;

//FRONTEND
use App\Http\Controllers\frontend\HomeController;

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

Route::get('/', function () {
    return redirect('/admin/dashboard');
});

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Auth::routes();
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//BACKEND
Route::prefix('admin')->group(function () {

    Route::middleware(['auth'])->group(function () {

        Route::resource('dashboard', DashboardController::class);
    });
});


//FRONTEND

Route::get('home', [HomeController::class, 'index'])->name('home');
