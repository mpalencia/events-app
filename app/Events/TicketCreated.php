<?php

namespace App\Events;

use App\Model\Ticket;
use Illuminate\Queue\SerializesModels;

class TicketCreated
{
    use SerializesModels;
    public $ticket;

    /**
     * TicketCreated constructor.
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
}