<?php

namespace App\Transformers;

use App\Model\Event;
use League\Fractal\TransformerAbstract;

class EventTicketTransformer extends TransformerAbstract
{
    /**
     * @param Event $event
     * @return array
     */
    public function transform(Event $event)
    {
        return [
            'id' => $event->id,
            'order_number' => $event->pivot->order_number,
            'description' => $event->pivot->description,
            'seat' => $event->pivot->seat,
            'created_at' => $event->pivot->created_at->toDateTimeString(),
            'event' => [
                'name' => $event->name,
                'description' => $event->description,
                'image' => $event->image,
                'price' => $event->price,
                'ticket_max' => $event->ticket_max
            ]
        ];
    }

}