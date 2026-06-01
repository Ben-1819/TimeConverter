<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'batch_number',
        'date_started',
        'date_completed',
        'complete',
    ];

    /**
     * Define the replationship between Batch and Time models.
     * A batch has many times and a time belongs to a single batch
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Time, Batch>
     */
    public function Times()
    {
        return $this->hasMany(Time::class);
    }
}
