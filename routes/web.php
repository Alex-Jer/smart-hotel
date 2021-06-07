<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;
use App\Models\Region;
use App\Models\Log;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/', function () {
        $sensors = Sensor::all(); // Receives every sensor from the database
        $regions = Region::orderBy('name')->orderBy('number')->get(); // Receives every region from the database
        return view('dashboard/index', compact('sensors', 'regions')); // Shows the dashboard with the sensors' and region's data
    })->name('dashboard');

    Route::get('/logs/{region}/{number?}', function ($regionName, $number = null) {
        $regions = Region::orderBy('name')->orderBy('number')->get(); // Receives every region from the database

        // Equals to true if the region exists
        $exists = Region::where('name', $regionName)->where('number', $number)->exists();

        // Returns an error if the region couldn't be found
        if (!$exists) return 'ERROR: Region not found!';

        // Finds the region
        $region = Region::where('name', $regionName)->where('number', $number)->first();

        // Stores the sensors from the specified region
        $sensors = Sensor::where('region_id', $region->id)->get();

        // Creates an array with the ID of every sensor belonging to the specified region
        $sensorsIdArray = $sensors->pluck('id')->toArray();

        // Stores the logs from every sensor from the specified region
        $logs = Log::whereIn('sensor_id', $sensorsIdArray)->orderBy('created_at', 'desc')->get();

        return view('dashboard/logs', compact('sensors', 'regions', 'region', 'logs')); // Shows the dashboard with the sensors' data
    })->name('logs');

    Route::get('/regions/{region}/{number?}', function ($regionName, $number = null) {
        // Receives every region from the database
        $regions = Region::orderBy('name')->orderBy('number')->get();

        // Equals to true if the region exists
        $exists = DB::table('regions')
            ->where('name', $regionName)
            ->where('number', $number)
            ->exists();

        // Returns an error if the region couldn't be found
        if (!$exists) return 'ERROR: Region not found!';

        // Finds the region
        $region = DB::table('regions')
            ->where('name', $regionName)
            ->where('number', $number)
            ->first();

        // Stores the sensors from the specified region
        $sensors = Sensor::where('region_id', $region->id)->get();

        // Creates an array with the ID of every sensor belonging to the specified region
        $sensorsIdArray = $sensors->pluck('id')->toArray();

        // Stores the logs from every sensor from the specified region
        $logs = DB::table('sensors')
            ->whereIn('id', $sensorsIdArray)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard/regions', compact('sensors', 'regions', 'region')); // Shows the dashboard with the sensors' data
    })->name('regions');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/profile', function () {
        $regions = Region::orderBy('name')->orderBy('number')->get();
        return view('profile/show', compact('regions'));
    })->name('profile');
});


Route::get('/register', function () {
    return view('auth/register');
})->name('register');
