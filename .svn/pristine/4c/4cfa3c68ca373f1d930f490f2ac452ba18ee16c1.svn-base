<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'event.bookmarks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'event_id'
    ];

    /**
     * Make a relation with events eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events(){
        return $this->belongsTo(Event::class);
    }
}
