<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['value'];

    /**
     * Get the sensor that owns the Log.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    /**
     * Get the actuator that owns the Log.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function actuator()
    {
        return $this->belongsTo(Actuator::class);
    }
}
