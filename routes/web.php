<?php

use App\Http\Controllers\UserController;
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
 // from bootstrap install

// routes for views/pages display
//Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

// routes for user transactions
Route::group(['middleware' => ['preventBackHistory']],function(){
    Auth::routes();

    Route::group(['middleware' => ['admin']], function () {
        Route::resources([
            'users' => UserController::class,
        ]);

        Route::get('/admins', [App\Http\Controllers\UserController::class, 'admin'])->name('view-admin');

        Route::get('/createOfficeUser', [App\Http\Controllers\UserController::class, 'createOfficeUser'])->name('create-office');
        Route::get('/createAdminUser', [App\Http\Controllers\UserController::class, 'createAdminUser'])->name('create-admin');

        Route::post('/storeOfficeUser', [App\Http\Controllers\UserController::class, 'storeOfficeUser'])->name('store-office');
        Route::post('/storeAdminUser', [App\Http\Controllers\UserController::class, 'storeAdminUser'])->name('store-admin');
 
    });
    
    Route::resources([
        'officeVisits' => OfficeVisitController::class,
    ]);

    Route::resources([
        'offices' => OfficeController::class,
    ]);
    
    Route::post('/officeVisitsCode', [App\Http\Controllers\OfficeVisitController::class, 'storeCode'])->name('store-code');
    
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
