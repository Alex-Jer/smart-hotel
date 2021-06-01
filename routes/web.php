<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;
use App\Models\Region;

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
        $regions = Region::orderBy('name')->orderBy('number')->get(); // Receives every region from the database
        return view('dashboard/index', compact('sensors', 'regions')); // Shows the dashboard with the sensors' and region's data
    })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/logs/{region}/{number?}', function ($region, $number = null) {
        $regions = Region::orderBy('name')->orderBy('number')->get(); // Receives every region from the database

        // Equals to true if the region exists and has a number (e.g. Room 3)
        $exists = DB::table('regions')
            ->where('name', $region)
            ->where('number', $number)
            ->exists();

        // Returns an error if the region couldn't be found
        if (!$exists) return 'ERROR: Region not found!';

        // Finds the region_id
        $region_id = DB::table('regions')
            ->where('name', $region)
            ->where('number', $number)
            ->first()->id;

        $sensors = DB::table('sensors')
            ->where('region_id', $region_id)
            ->get();

        return view('dashboard/logs', compact('sensors', 'regions')); // Shows the dashboard with the sensors' data
    })->name('logs');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/register', function () {
    return view('auth/register');
})->name('register');
