<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventTag extends Model
{
    protected $table = 'event.event_tags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['event_id', 'tag_id'];
}
