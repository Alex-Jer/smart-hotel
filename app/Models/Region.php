<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['name', 'number'];

    /**
     * Get all of the sensors for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sensor()
    {
        return $this->hasMany(Sensor::class);
        // return $this->hasMany(Sensor::class, 'foreign_key', 'local_key');
    }

    /**
     * Get all of the actuators for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actuator()
    {
        return $this->hasMany(Actuator::class);
    }
}
