<?php

namespace App\Model;

use App\Events\TicketCreated;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'event.tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'event_id', 'order_number', 'description', 'seat', 'attended'
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TicketCreated::class
    ];

    /**
     * Make a relation with event eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
