<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use DB;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the Request
        if (!($request->name && $request->region_name && $request->value))
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

        // Finds the region_id and pushes it into the array
        if ($exists) {
            $region_id = DB::table('regions')
                ->where('name', $request->region_name)
                ->where('number', $request->region_number)
                ->first()->id;

            $sensor['region_id'] = $region_id;

            return Sensor::create($sensor);
        }

        // Finds the region without a number (e.g. Pool)
        $region_id = DB::table('regions')
            ->where('name', $request->region_name)
            ->whereNull('number')
            ->first();

        // If the region needs a number but it wasn't provided (e.g. A room)
        if ($request->region_number) {
            return 'ERROR: Region not found!';
        }

        // Pushes the region_id into the array
        if ($region_id) {
            $region_id = $region_id->id;
            $sensor['region_id'] = $region_id;

            return Sensor::create($sensor);
        }

        return 'ERROR: Region not found!';
    }
}
