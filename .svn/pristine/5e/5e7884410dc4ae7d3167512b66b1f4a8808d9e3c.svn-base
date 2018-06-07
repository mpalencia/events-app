<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrganizerTag extends Model
{
    protected $table = 'organizer.organizer_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'tag_id'
    ];

    /**
     * Make an eloquent relation with tags
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags(){
        return $this->belongsTo(Tag::class);
    }
}
