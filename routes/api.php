<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampusVisitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('add_visitor', CampusVisitController::class)->only(['store']);
Route::apiResource('get_offices/{building_num}', CampusVisitController::class)->only(['index']);
Route::get('get_places', [CampusVisitController::class, 'getPlaces']);
Route::get('get_coordinates/{name}', [CampusVisitController::class, 'getCoordinates']);