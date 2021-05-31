<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;

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

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/', function () {
        $sensors = Sensor::all(); // Receives every sensor from the database
        return view('dashboard/index', compact('sensors')); // Shows the dashboard with the sensors' data
    })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/logs', function () {
        $sensors = Sensor::all(); // Receives every sensor from the database
        return view('dashboard/logs', compact('sensors')); // Shows the dashboard with the sensors' data
    })
    ->name('logs');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/register', function () {
    return view('auth/register');
})->name('register');
