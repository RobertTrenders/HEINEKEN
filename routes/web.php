<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
//BACKEND
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ParticipantController as AdminParticipantController;
//FRONTEND
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ParticipantController;
use App\Http\Controllers\frontend\AgeController;
use App\Http\Controllers\frontend\TermsController;
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
    return redirect('/home');
});

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Auth::routes();
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//BACKEND
Route::prefix('admin')->group(function () {

    Route::middleware(['auth'])->group(function () {

        //DASHBOARD
        Route::resource('dashboard', DashboardController::class);

        //PARTICIPANTS
        Route::resource('participant_list', AdminParticipantController::class);
        Route::get('get_participants', [AdminParticipantController::class, 'getParticipants'])->name('get_participants');
        Route::get('participant_export', [AdminParticipantController::class, 'export'])->name('participant_export');
    });
});


//FRONTEND

Route::middleware(['checkguest'])->group(function () {
    Route::middleware(['age'])->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('register', [ParticipantController::class, 'create'])->name('register');
        Route::post('register_store', [ParticipantController::class, 'store'])->name('register_store');
        Route::get('register_store', function () {
            return redirect()->route('home');
        })->name('register_store');
    });

    Route::get('age', [AgeController::class, 'index'])->name('age');
    Route::post('age_store', [AgeController::class, 'store'])->name('age_store');
});

Route::get('terms', [TermsController::class, 'index'])->name('terms');
