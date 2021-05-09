<?php

use App\Http\Controllers\SensorController;
use App\Models\Sensor;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('api/{sensor}', function (Sensor $sensor) {
//     return view('api', [
//         'sensor' => $sensor,
//     ]);
// });

// Route::get('api', [SensorController::class, 'show']);

// Route::post('api', function () {
//     return view('api');
// });

// Route::post('api', [SensorController::class, 'store']);

// Route::get('/api/{region}/{sensor}', function () {
//     return view('api');
// });

// Route::get('/api', function (Sensor $sensor) {
//     return view('api', [
//         'sensor' => $sensor,
//     ]);
// });

// Route::get('/api/{region}/{sensor}', 'SensorController@show');
