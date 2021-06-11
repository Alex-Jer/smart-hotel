<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the Request
        if (!$request->name || !$request->region_name || !$request->value)
            return response('ERROR: Invalid parameters! Must contain [name] [region_name] [value]');

        $sensor = [
            'name' => $request->name,
            'value' => $request->value,
        ];

        // Equals to true if the region exists and has a number (e.g. Room 3)
        $exists = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->exists();

        if (!$exists) return response('ERROR: Region not found!');

        // Finds the region_id and pushes it into the array
        $region_id = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->first()->id;

        $sensor['region_id'] = $region_id;

        // Finds a region without a number (e.g. Pool)
        $region_id = DB::table('regions')
            ->where('name', $request->region_name)
            ->whereNull('number')
            ->first();

        // If the region needs a number but it wasn't provided (e.g. A room)
        if (!$request->region_number && !$region_id) return response('ERROR: Region not found!');

        // Pushes the region_id into the array
        if ($region_id) $sensor['region_id'] = $region_id->id;

        return Sensor::create($sensor);
    }

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        //
    }
}
