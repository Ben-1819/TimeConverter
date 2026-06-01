<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'batch_number',
        'length_seconds',
    ];

    /**
     * Define the replationship between Time and Batch models.
     * A time belongs to a batch, and a batch has many times.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Batch, Time>
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

}
