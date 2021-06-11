<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Actuator;

class ActuatorController extends Controller
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

        // Finds the actuator
        $actuator = DB::table('actuators')
            ->where('region_id', $region_id)
            ->where('name', $request->name)
            ->first();

        // Returns the actuator's data
        return $actuator->value;
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

        // Finds the actuator id
        $actuator = DB::table('actuators')
            ->where('region_id', $region_id)
            ->where('name', $request->name)
            ->first();

        if (!$actuator) return response('ERROR: Actuator not found!');

        // Stores the actuator's data from the database
        $actuator = Actuator::find($actuator->id);

        // Updates the actuator's value with the request's value
        $actuator->value = $request->value;

        // Saves a new log
        $log = new Log;
        $log->actuator_id = $actuator->id;
        $log->value = $actuator->value;
        $log->save();

        // Saves the new value into the database
        return $actuator->save();
    }
}
