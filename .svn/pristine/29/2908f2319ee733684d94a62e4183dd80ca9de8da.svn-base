<?php

namespace App\Listeners;

use App\Events\TicketCreated;
use App\Jobs\NotifOrganizerJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param TicketCreated $event
     * @return void
     */
    public function handle(TicketCreated $event)
    {
        NotifOrganizerJob::dispatch($event->ticket)
            ->onQueue('notif_organizer');
    }
}
