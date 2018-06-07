<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    protected $table = 'users.user_interests';

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
