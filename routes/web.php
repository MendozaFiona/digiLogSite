<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OfficeVisitController;
use Illuminate\Support\Facades\Route;
use App\Models\Model;

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

// routes for user transactions
Route::resources([
    'users' => UserController::class,
]);

/*Route::resources([
    'events' => EventController::class,
]);

Route::resources([
    'attendance' => AttendanceController::class,
]);*/

Route::resources([
    'admins' => AdminController::class,
]);

Route::resources([
    'offices' => OfficeController::class,
]);

Route::resources([
    'officeVisits' => OfficeVisitController::class,
]);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/attendance/{id}', [App\Http\Controllers\AttendanceController::class, 'createAttendance'])->name('create-attendance');
