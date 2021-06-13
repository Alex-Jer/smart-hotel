<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sensor;
use Carbon\Carbon;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sensors = [
            [
                'name' => 'temperature',
                'slug' => 'Temperature',
                'region_id' => 1,
                'value' => 22,
                'unit' => 'ºC',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'temperature',
                'slug' => 'Temperature',
                'region_id' => 2,
                'value' => 21,
                'unit' => 'ºC',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'humidity',
                'slug' => 'Humidity',
                'region_id' => 3,
                'value' => 74,
                'unit' => '%',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'motion',
                'slug' => 'Motion',
                'region_id' => 7,
                'value' => 0,
                'unit' => 'off_on',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'humidity',
                'slug' => 'Humidity',
                'region_id' => 1,
                'value' => 73,
                'unit' => '%',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'temperature',
                'slug' => 'Temperature',
                'region_id' => 3,
                'value' => 22,
                'unit' => 'ºC',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'temperature',
                'slug' => 'Temperature',
                'region_id' => 7,
                'value' => 24,
                'unit' => 'ºC',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'temperature',
                'slug' => 'Temperature',
                'region_id' => 9,
                'value' => 22,
                'unit' => 'ºC',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'humidity',
                'slug' => 'Humidity',
                'region_id' => 9,
                'value' => 73,
                'unit' => '%',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'temperature',
                'slug' => 'Temperature',
                'region_id' => 10,
                'value' => 22,
                'unit' => 'ºC',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'humidity',
                'slug' => 'Humidity',
                'region_id' => 10,
                'value' => 73,
                'unit' => '%',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        Sensor::insert($sensors);
    }
}
