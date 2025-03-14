<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeSourceController;
use App\Http\Controllers\ServiceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/income-sources', [IncomeSourceController::class, 'index']);
Route::get('/services_details', [IncomeSourceController::class, 'index']);

Route::get('/get-services', [ServiceController::class, 'getServicesList']);

Route::resource('services_details', ServiceController::class);
