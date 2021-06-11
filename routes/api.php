<?php

use App\Http\Controllers\SensorController;
use App\Http\Controllers\UploadController;
use App\Models\Sensor;
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

Route::get('/', [SensorController::class, 'show']);

Route::post('/', [SensorController::class, 'update']);

Route::post('/upload', [UploadController::class, 'upload']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
