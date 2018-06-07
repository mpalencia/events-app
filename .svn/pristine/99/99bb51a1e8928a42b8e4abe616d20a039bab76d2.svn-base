<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event.events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organizer_id', 'name', 'description', 'image', 'price', 'ticket_max', 'status'
    ];

    /**
     * Make a relation with organizer eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizers(){
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }

    /**
     * Make a relation with locations eloquent
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * Make a relation with timestamp eloquent
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timestampsTable()
    {
        return $this->hasMany(Timestamp::class);
    }

    /**
     * Make a relation with contact eloquent
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    /**
     * Make a relation with ticket eloquent
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    /**
     * Make a relation with bookmarks eloquent
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Make a relation with Users that attend the event.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attendees(){
        return $this->belongsToMany(User::class, 'event.tickets', 'event_id', 'user_id')
            ->withPivot(['attended', 'id', 'order_number']);
    }

    /**
     * Get the event tags
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany(Tag::class, 'event.event_tags', 'event_id', 'tag_id');
    }
}
