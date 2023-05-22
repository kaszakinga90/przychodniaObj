<?php

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
    return view('welcome');
});

use App\Http\Controllers\Przychodnia;
Route::get('/', Przychodnia::class);

use App\Http\Controllers\LoginRegisterController;
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

use App\Http\Controllers\PatientController;
Route::controller(PatientController::class)->group(function() {
    Route::get('/patients/{patient}/edit', 'edit')->name('patients.edit');
    Route::post('/patients/{patient}', 'update')->name('patients.update');
    Route::delete('/patients/{patient}', 'destroy')->name('patients.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
