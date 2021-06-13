<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Checks if the necessary parameters exist
        if (!$request->name || !$request->region_name)
            return response('ERROR: Invalid parameters! Must contain [name] [region_name]', 400);

        // Equals to true if the region exists and has a number (e.g. Room 3)
        $exists = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->exists();

        // Returns an error if the region couldn't be found
        if (!$exists) return response('ERROR: Region not found!', 400);

        // Finds the region_id
        $region_id = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->first()->id;

        // Finds the sensor
        $sensor = DB::table('sensors')
            ->where('region_id', $region_id)
            ->where('name', $request->name)
            ->first();

        // Returns an error if the sensor couldn't be found
        if (!$sensor) return response('ERROR: Sensor not found!', 400);

        // Returns the sensor's data
        return $sensor->value;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the Request
        if (!$request->name || !$request->region_name || $request->value === null)
            return response('ERROR: Invalid parameters! Must contain [name] [region_name] [value]', 400);

        if (!is_numeric($request->value)) return response('ERROR: [value] parameter must be a number!', 400);

        // Equals to true if the region exists
        $exists = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->exists();

        if (!$exists) return response('ERROR: Region not found!', 400);

        // Finds the region_id
        $region_id = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->first()->id;

        // Finds the sensor id
        $sensor = DB::table('sensors')
            ->where('region_id', $region_id)
            ->where('name', $request->name)
            ->first();

        if (!$sensor) return response('ERROR: Sensor not found!');

        // Stores the sensor's data from the database
        $sensor = Sensor::find($sensor->id);

        // Updates the sensor's value with the request's value
        $sensor->value = $request->value;

        // Saves the new value into the database
        return $sensor->save();
    }
}
