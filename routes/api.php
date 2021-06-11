<?php

use App\Http\Controllers\SensorController;
use App\Http\Controllers\ActuatorController;
use App\Http\Controllers\UploadController;
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

Route::get('/sensor', [SensorController::class, 'show']);

Route::post('/sensor', [SensorController::class, 'update']);

Route::get('/actuator', [ActuatorController::class, 'show']);

Route::post('/actuator', [ActuatorController::class, 'update']);

Route::post('/upload', [UploadController::class, 'upload']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
