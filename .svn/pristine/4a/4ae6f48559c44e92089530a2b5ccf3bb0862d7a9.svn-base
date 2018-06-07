<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'event.timestamps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id', 'timestamp_start', 'timestamp_end'
    ];

}
