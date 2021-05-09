<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Sensor;
use DB;
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
        $request->validate([
            'region_name' => 'required',
            'name' => 'required',
            'value' => 'required',
        ]);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        //
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
        //
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
