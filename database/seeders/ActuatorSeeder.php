<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actuator;
use Carbon\Carbon;

class ActuatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actuators = [
            [
                'name' => 'barrier',
                'slug' => 'Barrier',
                'region_id' => 5,
                'value' => 0,
                'unit' => 'c_o',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'sprinklers',
                'slug' => 'Sprinklers',
                'region_id' => 6,
                'value' => 0,
                'unit' => 'off_on',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'door',
                'slug' => 'Door',
                'region_id' => 7,
                'value' => 0,
                'unit' => 'c_o',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'lights',
                'slug' => 'Lights',
                'region_id' => 7,
                'value' => 0,
                'unit' => 'off_on',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'air_conditioner',
                'slug' => 'Air Conditioner',
                'region_id' => 7,
                'value' => 0,
                'unit' => 'off_on',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'fire_sprinkler',
                'slug' => 'Fire Sprinkler',
                'region_id' => 8,
                'value' => 0,
                'unit' => 'off_on',
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        Actuator::insert($actuators);
    }
}
