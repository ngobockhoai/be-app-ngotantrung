<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 

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


//Public APIs:

//Event A - v1

//Getting the list of registered users from each event:
Route::get('v1/show/', [App\Http\Controllers\API\EventAController::class, 'index']);
//Saving users’ information to database:
Route::post('v1/create/', [App\Http\Controllers\API\EventAController::class, 'create']);
//Unsubscribing users:
Route::put('v1/delete/{id}', [App\Http\Controllers\API\EventAController::class, 'destroy']);


//Event B - v2

//Getting the list of registered users from each event:
Route::get('v2/show/', [App\Http\Controllers\API\EventBController::class, 'index']);
//Saving users’ information to database:
Route::post('v2/create/', [App\Http\Controllers\API\EventBController::class, 'create']);
//Unsubscribing users:
Route::put('v2/delete/{id}', [App\Http\Controllers\API\EventBController::class, 'destroy']);

//Authenticated APIs:
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    //Authorizing:
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);    
});


Route::group(['middleware' => ['jwt.verify']], function() {
    //Modifying user information:
    Route::put('v2/update/{id}', [App\Http\Controllers\API\EventBController::class, 'update']);
    Route::put('v1/update/{id}', [App\Http\Controllers\API\EventAController::class, 'update']);
    //Statistic API:
    Route::post('information/', [App\Http\Controllers\API\EventAController::class, 'show']);
});