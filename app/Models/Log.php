<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'value',
        'timestamp',
    ];

    /**
     * Get the sensor that owns the Log.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sensor()
    {
        return $this->belongsTo(self::class);
    }
}
