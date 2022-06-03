<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 

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

//Event A
Route::get('v1/show/', [App\Http\Controllers\API\EventAController::class, 'index']);
Route::post('v1/create/', [App\Http\Controllers\API\EventAController::class, 'create']);
Route::put('v1/update/{id}', [App\Http\Controllers\API\EventAController::class, 'update']);
Route::put('v1/delete/{id}', [App\Http\Controllers\API\EventAController::class, 'destroy']);


//Event B

Route::get('v2/show/', [App\Http\Controllers\API\EventBController::class, 'index']);
Route::post('v2/create/', [App\Http\Controllers\API\EventBController::class, 'create']);
Route::put('v2/update/{id}', [App\Http\Controllers\API\EventBController::class, 'update']);
Route::put('v2/delete/{id}', [App\Http\Controllers\API\EventBController::class, 'destroy']);