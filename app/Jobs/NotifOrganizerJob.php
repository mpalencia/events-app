<?php

namespace App\Jobs;

use App\Model\Event;
use App\Model\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\FirebaseTrait;

class NotifOrganizerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, FirebaseTrait;

    protected $ticket;

    /**
     * Create a new job instance.
     *
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $token = 'd7lHb-uCfTM:APA91bGhBx-B3PNhvPrbzfqIOZdKInfWWCnTmoncDii15ZSCYb9gjnpsZX9-6Cj7HJ_RispFNWp9OLgzbUQ95vmnaVFUQdo8ytaXixxMITOUwLOp1zDtJRMR8tM1Lmkxsf8wKhR8Ura_';

        $data = ["a_data" => "my_notif_data"];

        $event = Event::find($this->ticket->event_id);
        $token = $event->organizers->firebase_id;
//        app('log')->info('notif',['events' => $event]);
        $this->sendFCM($token, $data, ["body" => 'You have reservation for ' . $event->name]);
    }


}
