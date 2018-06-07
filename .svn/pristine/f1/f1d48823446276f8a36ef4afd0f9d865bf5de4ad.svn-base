<?php

namespace App\Transformers;

use App\Model\Contact;
use App\Model\Event;
use App\Model\Location;
use App\Model\Timestamp;
use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;

/**
 * Class EventTransformer
 * @package App\Transformers
 */
class EventTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'organizer', 'attendees', 'liked', 'reserve', 'totalLikes'
    ];
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'tags', 'location', 'timestamp', 'contact'
    ];

    /**
     * @param $event
     * @return array
     */
    public function transform($event)
    {
        return [
            'id' => $event->id,
            'name' => $event->name,
            'description' => $event->description,
            'image' => $event->image,
            'price' => $event->price,
            'ticket_max' => $event->ticket_max,
            'status' => $event->status
        ];
    }

    /**
     * @param $event
     * @return \League\Fractal\Resource\Item
     */
    public function includeOrganizer($event)
    {
        if ($event instanceof \stdClass)
            $event = objectToObject($event, 'App\Model\Event');
        return $this->item($event->organizers, new OrganizerTransformer);
    }

    /**
     * @param $event
     * @return \League\Fractal\Resource\Collection
     */
    public function includeLocation($event)
    {
        if ($event instanceof \stdClass) {
            $locations = Location::where('event_id', $event->id)->get();
            return $this->collection($locations, new LocationTransformer);
        }
        return $this->collection($event->locations, new LocationTransformer);

    }

    /**
     * @param $event
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTimestamp($event)
    {
        if ($event instanceof \stdClass) {
            $event = Timestamp::where('event_id', $event->id)->get();
            return $this->collection($event, new TimestampTransformer());
        }
        return $this->collection($event->timestampsTable, new TimestampTransformer);
    }

    /**
     * @param $event
     * @return \League\Fractal\Resource\Collection
     */
    public function includeContact($event)
    {
        if ($event instanceof \stdClass) {
            $event = Contact::where('event_id', $event->id)->get();
            return $this->collection($event, new ContactTransformer());
        }
        return $this->collection($event->contacts, new ContactTransformer);
    }

    /**
     * @param Event $event
     * @return \League\Fractal\Resource\Collection
     */
    public function includeAttendees(Event $event)
    {
        return $this->collection($event->attendees, new AttendeesTransformer);
    }

    /**
     * Event Tags
     * @param Event $event
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTags($event)
    {
        if ($event instanceof \stdClass)
            $event = objectToObject($event, 'App\Model\Event');
        return $this->collection($event->tags, new TagTransformer);
    }

    /**
     * If the user already liked the event.
     * @param $event
     * @param ParamBag|null $params
     * @return \League\Fractal\Resource\Primitive
     */
    public function includeLiked($event, ParamBag $params = null)
    {
        if ($event instanceof \stdClass)
            $event = objectToObject($event, 'App\Model\Event');
        $user_id = $params->get('user_id')[0];
        $event = $event->load(['bookmarks' => function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        }]);

        return $this->primitive(count($event->bookmarks) > 0);
    }

    /**
     * Check if the user already reserve a ticket to the event.
     * @param $event
     * @param ParamBag|null $params
     * @return \League\Fractal\Resource\Primitive
     */
    public function includeReserve($event, ParamBag $params = null)
    {
        if ($event instanceof \stdClass)
            $event = objectToObject($event, 'App\Model\Event');
        $user_id = $params->get('user_id')[0];
        $event = $event->load(['tickets' => function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        }]);

        return $this->primitive(count($event->tickets) > 0);
    }

    /**
     * Get the total likes in event
     * @param $event
     * @return \League\Fractal\Resource\Primitive
     */
    public function includeTotalLikes($event){
        return $this->primitive(count($event->bookmarks));
    }

}