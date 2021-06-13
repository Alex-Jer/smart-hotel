<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\Actuator;
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
        $sensors = Sensor::orderBy('region_id')->get(); // Receives every sensor from the database
        $actuators = Actuator::orderBy('region_id')->get(); // Receives every actuator from the database
        $regions = Region::orderBy('name')->orderBy('number')->get(); // Receives every region from the database
        return view('dashboard/index', compact('sensors', 'actuators', 'regions')); // Shows the dashboard with the sensors', actuators' and regions' data
    })->name('dashboard');

    Route::get('/logs/{region}/{number?}', function ($regionName, $number = null) {
        // Receives every region from the database
        $regions = Region::orderBy('name')->orderBy('number')->get();

        // Equals to true if the region exists
        $exists = Region::where('name', $regionName)->where('number', $number)->exists();

        // Returns an error if the region couldn't be found
        if (!$exists) return 'ERROR: Region not found!';

        // Finds the region
        $region = Region::where('name', $regionName)->where('number', $number)->first();

        // Stores the sensors and actuators from the specified region
        $sensors = Sensor::where('region_id', $region->id)->get();
        $actuators = Actuator::where('region_id', $region->id)->get();

        // Creates an array with the ID of every actuator belonging to the specified region
        $actuatorsIdArray = $actuators->pluck('id')->toArray();

        // Stores the logs from every actuator from the specified region
        $logs = Log::whereIn('actuator_id', $actuatorsIdArray)->orderBy('created_at', 'desc')->get();

        // Shows the dashboard with the sensors' data
        return view('dashboard/logs', compact(
            'sensors',
            'actuators',
            'regions',
            'region',
            'logs'
        ));
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

        // Stores the sensors and actuators from the specified region
        $sensors = Sensor::where('region_id', $region->id)->get();
        $actuators = Actuator::where('region_id', $region->id)->get();

        // Creates an array with the ID of every actuator belonging to the specified region
        $actuatorsIdArray = $actuators->pluck('id')->toArray();

        // Stores the logs from every actuator from the specified region
        $logs = DB::table('actuators')
            ->whereIn('id', $actuatorsIdArray)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard/regions', compact('sensors', 'actuators', 'regions', 'region')); // Shows the dashboard with the sensors' data
    })->name('regions');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/profile', function () {
        $regions = Region::orderBy('name')->orderBy('number')->get();
        return view('profile/show', compact('regions'));
    })->name('profile');

    Route::get('/camera', function () {
        $regions = Region::orderBy('name')->orderBy('number')->get();
        $path = public_path('storage/parking');
        $images = File::allFiles($path);
        foreach ($images as $key => $image) {
            // If the image is bigger than 100kib or the file type isn't either .png or .jpg
            if ($image->getSize() > 1024000 || ($image->getExtension() != 'png' && $image->getExtension() != 'jpg')) {
                unset($images[$key]);
            }
        }
        return view('dashboard/camera', compact('regions', 'images'));
    })->name('camera');

    Route::get('/register', function () {
        return view('auth/register');
    })->name('register');
});
