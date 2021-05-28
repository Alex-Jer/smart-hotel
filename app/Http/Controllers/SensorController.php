<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Log;
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
            return 'ERROR: Invalid parameters! Must contain [name] [region_name] [value]';

        $sensor = [
            'name' => $request->name,
            'value' => $request->value,
        ];

        // Equals to true if the region exists and has a number (e.g. Room 3)
        $exists = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->exists();

        if (!$exists) return 'ERROR: Region not found!';

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
        if (!$request->region_number && !$region_id) return 'ERROR: Region not found!';

        // Pushes the region_id into the array
        if ($region_id) $sensor['region_id'] = $region_id->id;

        // $exists = DB::table('sensors')
        //     ->where('region_id', $sensor['region_id'])
        //     ->where('name', $request->name)
        //     ->first();

        // dd($exists);

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
        if (!$request->name || !$request->region_name || !$request->type)
            return 'ERROR: Invalid parameters! Must contain [name] [region_name] [type]';


        // Equals to true if the region exists and has a number (e.g. Room 3)
        $exists = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->exists();

        // Returns an error if the region couldn't be found
        if (!$exists) return 'ERROR: Region not found!';

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

        // Returns the sensor's data
        return $sensor->updated_at . ';' . $sensor->value;
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
     * @param  \App\Models\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensor $sensor)
    {
        // Validate the Request
        if (!$request->name || !$request->region_name || !$request->value)
            return 'ERROR: Invalid parameters! Must contain [name] [region_name] [value]';

        if (!is_numeric($request->value)) return 'ERROR: [value] parameter must be a number!';

        // Equals to true if the region exists
        $exists = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->exists();

        if (!$exists) return 'ERROR: Region not found!';

        // Finds the region_id
        $region_id = DB::table('regions')
            ->where('name', $request->region_name)
            ->where('number', $request->region_number)
            ->first()->id;

        // Finds the sensor id
        $id = DB::table('sensors')
            ->where('region_id', $region_id)
            ->where('name', $request->name)
            ->first()->id;

        if (!$id) return 'ERROR: Sensor not found!';

        // Stores the sensor's data from the database
        $sensor = Sensor::find($id);

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
