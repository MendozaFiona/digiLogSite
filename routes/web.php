<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

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

Auth::routes(); // from bootstrap install

// routes for views/pages display
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
//Route::get('/register', [App\Http\Controllers\PagesController::class, 'register'])->name('register');
//Route::get('/view-events', [App\Http\Controllers\PagesController::class, 'viewEvents'])->name('view-events');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes for user transactions
Route::resources([
    'users' => UserController::class,
]);


Route::resources([
    'events' => EventController::class,
]);

Route::resources([
    'attendance' => AttendanceController::class,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/attendance/{id}', [App\Http\Controllers\AttendanceController::class, 'createAttendance'])->name('create-attendance');
