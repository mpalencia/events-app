<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use App\Model\Event;
use App\Model\EventTag;
use App\Model\Location;
use App\Model\Ticket;
use App\Model\Timestamp;
use App\Rules\ExistsArray;
use App\Serializers\RootDataArraySerializer;
use App\Transformers\AttendeesTransformer;
use App\Transformers\EventTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use App\Traits\FirebaseTrait;
use Cookie;
use JWTAuth;

class OrganizerController extends Controller
{
    use FirebaseTrait;

    protected $organizer_id;

    /**
     * OrganizerController constructor.
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:organizers');

        if (!auth()->guard('organizers')->check()) return;

        $auth = auth()->guard('organizers')->user();
        $this->setFirebaseAuth($auth);
        $this->organizer_id = $auth->id;
    }

    /**
     * Show specified resource for edit
     * @param Request $request
     * @return $this
     */
    public function editEvent(Request $request)
    {
        $event = Event::where('organizer_id', $this->organizer_id)->where('id', $request->event_id)->first();
        return fractal()->item($event, new EventTransformer)
            ->serializeWith(new RootDataArraySerializer(new EventTransformer(), new Event()));
    }

    /**
     * Update the event
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEvent(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->createEventValidator($request->all())->validate();
        $data = $request->except(['contact', 'tags']);

        $event = Event::where('organizer_id', $this->organizer_id)->where('id', $request->event_id)->update($data);
        if ($event) {
            /**
             * check for failure of event tag when insert try to rollback (DB rollback)
             * try to check if there is other way to insert multiple record
             */
            EventTag::where('event_id', $request->event_id)->delete();
            foreach ($request["tags"] as $tag)
                EventTag::create(['event_id' => $request->event_id, 'tag_id' => $tag]);

            Contact::where('event_id', $request->event_id)->delete();
            Contact::create(['event_id' => $request->event_id, 'contacts' => $request->contact]);

            return response()->json(['message' => 'Successfully updated an event.']);
        }
        return response()->json(['message' => 'Something went wrong in updating event.'], 500);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getEvent(Request $request)
    {
        if ($this->isRequestTypeDatatable($request)) {
            $dataTables = new DataTables();
            $events = Event::where('organizer_id', $this->organizer_id)->select(['id', 'name', 'description', 'price', 'ticket_max', 'status']);
            return $dataTables->eloquent($events)
                ->addColumn('actions',
                    '<div class="btn-group-vertical">' .
                    '<button id="edit" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-secondary btn-block">Edit</button>' .
                    '<button id="date-time" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-secondary btn-block">Date & Time</button>' .
                    '<button id="attendees" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-secondary btn-block">Attendees</button>' .
                    '<button id="locations" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-secondary btn-block">Locations</button>' .
                    '<button id="delete" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-danger btn-block">Delete</button>' .
                    '</div>'
                )
                ->editColumn('status', function (Event $events) {
                    $status = ["O" => "Open", "L" => "Live", "D" => "Done"];
                    $event_status = $status[$events->status];
                    if ($events->status === "O")
                        return "<h5><span class='badge badge-secondary'>$event_status</span></h5>";
                    if ($events->status === "L")
                        return "<h5><span class='badge badge-danger'>$event_status</span></h5>";
                    if ($events->status === "D")
                        return "<h5><span class='badge badge-primary'>$event_status</span></h5>";
                    return null;
                })
                ->rawColumns(['status', 'actions'])
                ->make();
        }
        $defineCursor = $this->defineCollectionCursor(new Event, $request, ["columns" => ["organizer_id" => $this->organizer_id]]);
        return fractal()
            ->collection($defineCursor["collection"], new EventTransformer)
            ->serializeWith(new RootDataArraySerializer(new EventTransformer(), new Event()))
            ->includeTotalLikes()
            ->withCursor($defineCursor["cursor"]);
    }

    /**
     * Get event date time
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEventDateTime(Request $request)
    {
        $dataTables = new DataTables();
        $events = Timestamp::where('event_id', $request->event_id)->select(['id', 'timestamp_start', 'timestamp_end']);
        return $dataTables->eloquent($events)
            ->addColumn('actions',
                '<div class="btn-group-vertical">' .
                '<button id="edit" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-secondary btn-block">Edit</button>' .
                '<button id="delete" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-danger btn-block">Delete</button>' .
                '</div>'
            )
            ->editColumn('timestamp_start', function (Timestamp $timestamp) {
                return date('F m, Y h:i A', strtotime($timestamp->timestamp_start));
            })
            ->editColumn('timestamp_end', function (Timestamp $timestamp) {
                return date('F m, Y h:i A', strtotime($timestamp->timestamp_end));
            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Show specified resource
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEventDateTimeEdit(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->eventTimestampExistsValidator(['id' => $request->id, 'event_id' => $request->event_id])->validate();

        return response()->json(Timestamp::find($request->id));
    }

    /**
     * Add record for event date time
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEventDateTime(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->createEventDateTimeValidator($request->all())->validate();
        $data = ['event_id' => $request->event_id, 'timestamp_start' => $request->timestamp_start, 'timestamp_end' => $request->timestamp_end];

        if (Timestamp::create($data))
            return response()->json(['message' => 'Successfully created an event date & time.']);
        return response()->json(['message' => 'Something went wrong in creating event date & time.'], 500);

    }

    /**
     * Remove event date time
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeEventDateTime(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->eventTimestampExistsValidator(['id' => $request->id, 'event_id' => $request->event_id])->validate();
        if (Timestamp::destroy($request->id))
            return response()->json(['message' => 'Successfully removed event date & time.']);
        return response()->json(['message' => 'Something went wrong in removing event date & time.'], 500);
    }

    /**
     * Update event date time
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEventDateTime(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->eventTimestampExistsValidator(['id' => $request->id, 'event_id' => $request->event_id])->validate();
        $this->createEventDateTimeValidator($request->all())->validate();
        $data = ['timestamp_start' => $request->timestamp_start, 'timestamp_end' => $request->timestamp_end];

        if (Timestamp::where('id', $request->id)->update($data))
            return response()->json(['message' => 'Successfully updated event date & time.']);
        return response()->json(['message' => 'Something went wrong in updating event date & time.'], 500);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEvent(Request $request)
    {
        /**
         * This is not final. This code is for demo only..
         */
        $this->createEventValidator($request->all())->validate();
        $data = $request->all();
        $data["organizer_id"] = $this->organizer_id;

        $event = Event::create($data);
        if ($event) {
            /**
             * check for failure of event tag when insert try to rollback (DB rollback)
             * try to check if there is other way to insert multiple record
             */
            foreach ($request["tags"] as $tag)
                EventTag::create(['event_id' => $event->id, 'tag_id' => $tag]);
            if ($request->contact)
                Contact::create(['event_id' => $event->id, 'contacts' => $request->contact]);

            return response()->json(['message' => 'Successfully created an event.']);
        }
        return response()->json(['message' => 'Something went wrong in creating event.'], 500);
    }

    /**
     * This is not final. This code is for demo only..
     * @param Request $request
     * @return mixed
     */
    public function eventLocations(Request $request)
    {
        $dataTables = new DataTables();
        $events = Event::where('organizer_id', $this->organizer_id)->where('id', $request->event_id)->first();
        return $dataTables->collection($events->locations)
            ->addColumn('actions',
                '<div class="btn-group-vertical">' .
                '<button id="edit" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-secondary btn-block">Edit</button>' .
                '<button id="delete" style="margin-bottom:3%;" data-id="' . '{{ $id }}' . '" type="button" class="btn btn-danger btn-block">Delete</button>' .
                '</div>'
            )
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Show specified resource
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEventLocationEdit(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->eventLocationExistsValidator(['id' => $request->id, 'event_id' => $request->event_id])->validate();
        return response()->json(Location::select('name', 'address', 'lat', 'lng')->find($request->id));
    }

    /**
     * Remove event location
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeEventLocation(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->eventLocationExistsValidator(['id' => $request->id, 'event_id' => $request->event_id])->validate();
        if (Location::destroy($request->id))
            return response()->json(['message' => 'Successfully removed event location.']);
        return response()->json(['message' => 'Something went wrong in removing event location.'], 500);
    }

    /**
     * Update event location
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEventLocation(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->eventLocationExistsValidator(['id' => $request->id, 'event_id' => $request->event_id])->validate();
        $this->createEventLocationValidator($request->all())->validate();
        $data = $request->all();
        if (Location::find($request->id)->update($data))
            return response()->json(['message' => 'Successfully updated event location.']);
        return response()->json(['message' => 'Something went wrong in updating event location.'], 500);
    }

    /**
     * Create event location
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEventLocation(Request $request)
    {
        $this->eventExistsValidator(['event_id' => $request->event_id])->validate();
        $this->createEventLocationValidator($request->all())->validate();
        $data = $request->all();
        $data["event_id"] = $request->event_id;
        if (Location::create($data))
            return response()->json(['message' => 'Successfully create event location.']);
        return response()->json(['message' => 'Something went wrong in creating event location.'], 500);
    }

    /**
     * Mark the attendee if attended or not the event
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAttendee(Request $request)
    {
        $this->markAttendeeValidator(['event_id' => $request->event_id, 'attendee_id' => $request->attendee_id])->validate();
        $attendee = Ticket::where('event_id', $request->event_id)->where('user_id', $request->attendee_id)->first();
        $attendee->attended = $attendee->attended ? 0 : 1;
        $message = $attendee->attended ? "mark" : "unmark";

        if ($attendee->save())
            return response()->json(['message' => "Successfully $message the attendee as attended"]);
        return response()->json(['message' => 'Something went wrong in marking/unmarking attendee.'], 500);

    }

    /**
     * This is not final. This code is for demo only..
     * @param Request $request
     * @return mixed
     */
    public function eventAttendees(Request $request)
    {
        if ($this->isRequestTypeDatatable($request)) {
            $dataTables = new DataTables();
            $events = Event::where('organizer_id', $this->organizer_id)->where('id', $request->event_id)->first();
            return $dataTables->collection($events->attendees)
                ->setTransformer(new AttendeesTransformer())
                ->make();
        }
        /**
         * This is not final. This code is for demo only..
         */
        $this->eventExistsValidator(["event_id" => $request->event_id])->validate();
        $event = Event::where('organizer_id', $this->organizer_id)->first();
        return fractal()->collection($event->attendees, new AttendeesTransformer);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeEvent(Request $request)
    {
        /**
         * This is not final. This code is for d emo only..
         */
        $this->eventExistsValidator(["event_id" => $request->event_id])->validate();
        if (Event::destroy($request->event_id))
            return response()->json(['message' => 'Successfully removed event.']);
        return response()->json(['message' => 'Something went wrong in removing event.'], 500);
    }

    /**
     * Update Profile
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $this->updateProfileValidator($request->all())->validate();
        $organizer = auth()->guard('organizers')->user();
        $organizer->update($request->all());
        return response()->json(['message' => 'Profile Successfully updated.'], 200);
    }

    /**
     * Update profile validator
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function updateProfileValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:150',
            'email' => [
                'required',
                'max:150',
                Rule::unique('pgsql.organizer.organizers')->ignore($this->organizer_id),
            ],
            'description' => 'required',
            'address' => 'required',
            'contact' => 'required|max:30'
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function createEventValidator(array $data)
    {
        /**
         * This is not final. This code is for demo only..
         * Do upload of image.
         */
        return Validator::make($data, [
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'nullable',
            'price' => 'required|numeric',
            'ticket_max' => 'required|integer',
            'tags' => ['required', new ExistsArray('tags')],
            'contact' => 'nullable',
            'status' => 'nullable|in:O,L,D'
        ], [
            'name.required' => 'The title field is required.',
            'name.max' => 'The title may not be greater than 150 characters.'
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function eventExistsValidator(array $data)
    {
        /**
         * This is not final. This code is for demo only..
         */
        return Validator::make($data, [
            'event_id' => ['required',
                'integer',
                Rule::exists('pgsql.event.events', 'id')->where(function ($query) use ($data) {
                    return $query->where('organizer_id', $this->organizer_id);
                })
            ]
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function eventTimestampExistsValidator(array $data)
    {
        /**
         * Not final code
         */
        return Validator::make($data, [
            'id' => [
                'required',
                'integer',
                Rule::exists('pgsql.event.timestamps')->where(function ($query) use ($data) {
                    return $query->where('event_id', $data["event_id"]);
                })
            ]
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function eventLocationExistsValidator(array $data)
    {
        /**
         * Not final code
         */
        return Validator::make($data, [
            'id' => [
                'required',
                'integer',
                Rule::exists('pgsql.event.locations')->where(function ($query) use ($data) {
                    return $query->where('event_id', $data["event_id"]);
                })
            ]
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function createEventDateTimeValidator(array $data)
    {
        return Validator::make($data, [
            'timestamp_start' => [
                'required', 'date'
            ],
            'timestamp_end' => [
                'required', 'date', 'after:timestamp_start'
            ]
        ], [
            'timestamp_start.required' => 'The <b>date & time from</b> field is required.',
            'timestamp_end.required' => 'The <b>date & time to</b> field is required.',
            'timestamp_start.date' => 'The <b>date & time to </b> field is must be valid date & time.',
            'timestamp_end.date' => 'The <b>date & time to </b> field is must be valid date & time.',
            'timestamp_end.after' => 'The <b>date & time to</b> must be a date/time after <b>date & time from</b>'
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function createEventLocationValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'max:150'],
            'address' => ['required'],
            'require_with_all' => 'lat,lng'
        ], [
            'name.required' => 'The location name field is required.',
            'name.max' => 'The location name may not be greater than 150 characters.'
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function markAttendeeValidator(array $data)
    {
        return Validator::make($data, [
            'event_id' => ['required',
                'integer',
                'required_with:attendee_id',
                Rule::exists('pgsql.event.tickets')->where(function ($query) use ($data) {
                    return $query->where('event_id', $data["event_id"])
                        ->where('user_id', $data["attendee_id"]);
                })
            ],
        ]);
    }

}
