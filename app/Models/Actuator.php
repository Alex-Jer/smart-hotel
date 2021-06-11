<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuator extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['region_id', 'name', 'value'];

    /**
     * Get the region that owns the Actuator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get all of the logs for the Actuator
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function log()
    {
        return $this->hasMany(Log::class);
    }
}
