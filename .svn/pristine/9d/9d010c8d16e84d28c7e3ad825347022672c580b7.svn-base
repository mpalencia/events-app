<?php

namespace App\Http\Controllers;

use App\Model\Bookmark;
use App\Model\Event;
use App\Model\Ticket;
use App\Serializers\RootDataArraySerializer;
use App\Transformers\EventTransformer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use DB;
use Log;
use Yajra\DataTables\DataTables;

/**
 * Class EventController
 * @package App\Http\Controllers
 *
 */
class EventController extends Controller
{

    protected $user_id;

    /**
     * EventController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user_id = auth()->check() ? auth()->user()->id : "";
    }

    /**
     * Get the list of events record
     * @param Request $request
     * @return mixed
     */
    public function getEvent(Request $request)
    {
        $event = new Event();
        if ($request->tag_id) {
            $event = DB::table('event.events')
                ->leftJoin('event.event_tags', 'events.id', '=', 'event_tags.event_id')
                ->where('event_tags.tag_id', $request->tag_id);
        }

        /**
         * This is a demo code.
         * - Make the user id dynamic by auth.
         */

//        $defineCursor = $this->defineCollectionCursor($event, $request);
//        return fractal()
//            ->collection($defineCursor["collection"], new EventTransformer)
//            ->serializeWith(new RootDataArraySerializer(new EventTransformer(), new Event()))
//            ->parseIncludes("liked:user_id({$this->user_id})")
//            ->parseIncludes("reserve:user_id({$this->user_id})")
//            ->includeOrganizer()
//            ->withCursor($defineCursor["cursor"]);

        return fractal()
            ->collection(Event::all(), new EventTransformer)
            ->serializeWith(new RootDataArraySerializer(new EventTransformer(), new Event()))
            ->parseIncludes("liked:user_id({$this->user_id})")
            ->parseIncludes("reserve:user_id({$this->user_id})")
            ->includeOrganizer();


    }

    /**
     * User reserve the ticket for event
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reserveEvent(Request $request)
    {
        /**
         * This code is not final
         */
        $this->reserveEventValidator($request->all())->validate();
        $order_number = '979' . rand(1000000000, 9999999999);
        $seat = ["General Admission", "Upper Box A", "Upper Box B", "Lower Box A", "Lower Box B",
            "Premium Bench - VIP", "Premium Box", "Patron A", "Patron B", "Patron C"];
        $event = Event::find($request->event_id)->title;
        $fields = ["user_id" => $this->user_id,
            "event_id" => $request->event_id,
            'order_number' => $order_number,
            'description' => "This ticket entitles bearer to the {$event}",
            'seat' => $seat[rand(0, 9)]];

        if (Ticket::create($fields))
            return response()->json(["message" => "Successfully reserve event."]);

        return response()->json(["message" => 'Something went wrong in reserving ticket.'], 500);
    }

    /**
     * User save the like event.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userSaveLikedEvent(Request $request)
    {
        $this->userSaveLikedEventValidator($request->all())->validate();
        if (Bookmark::create(['event_id' => $request->event_id, 'user_id' => $this->user_id]))
            return response()->json(["message" => "Successfully liked the event."]);
        return response()->json(["message" => 'Something went wrong in liking the event.'], 500);
    }

    /**
     * User unlikes the event
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userUnlikedEvent(Request $request)
    {
        $this->userUnlikedEventValidator(['event_id' => $request->event_id])->validate();
        if (Bookmark::where(['event_id' => $request->event_id, 'user_id' => $this->user_id])->delete())
            return response()->json(["message" => "Successfully unliked the event."]);
        return response()->json(["message" => 'Something went wrong in liking the event.'], 500);
    }

    /**
     * Reserve Event Validation
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function reserveEventValidator(array $data)
    {
        return Validator::make($data, [
            'event_id' => ['required',
                'integer',
                'exists:pgsql.event.events,id',
                Rule::unique('pgsql.event.tickets')->where(function ($query) use ($data) {
                    return $query->where('event_id', $data["event_id"])
                        ->where('user_id', $this->user_id);
                })
            ]
        ]);
    }

    /**
     * Validate if the user already liked the event
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function userSaveLikedEventValidator(array $data)
    {
        return Validator::make($data, [
            'event_id' => ['required',
                'integer',
                'exists:pgsql.event.events,id',
                Rule::unique('pgsql.event.bookmarks')->where(function ($query) use ($data) {
                    return $query->where('event_id', $data["event_id"])
                        ->where('user_id', $this->user_id);
                })
            ]
        ]);
    }

    /**
     * Validate if the user liked event exists
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function userUnlikedEventValidator(array $data)
    {
        return Validator::make($data, [
            'event_id' => ['required',
                'integer',
                'exists:pgsql.event.events,id',
                Rule::exists('pgsql.event.bookmarks')->where(function ($query) use ($data) {
                    return $query->where('event_id', $data["event_id"])
                        ->where('user_id', $this->user_id);
                })
            ]
        ]);
    }


}
