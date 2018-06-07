<?php

namespace App\Http\Controllers;

use App\Model\Event;
use App\Model\User;
use App\Serializers\RootDataArraySerializer;
use App\Traits\FirebaseTrait;
use App\Transformers\EventTicketTransformer;
use App\Transformers\EventTransformer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    use FirebaseTrait;

    protected $user_id;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        if (!auth()->check()) return;
        $auth = auth()->user();
        $this->setFirebaseAuth($auth);
        $this->user_id = $auth->id;
    }

    /**
     * Get the liked events
     * @return $this
     */
    public function getLikedEvent()
    {
        /**
         * This is not final. This code is for demo only..
         */
        $bookmarks = User::find($this->user_id)->bookmarks;
        return fractal()
            ->collection($bookmarks, new EventTransformer)
            ->parseIncludes("liked:user_id({$this->user_id})")
            ->parseIncludes("reserve:user_id({$this->user_id})")
            ->serializeWith(new RootDataArraySerializer(new EventTransformer, new Event()));
    }

    /**
     * Get list of tickets
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTicket()
    {
        /**
         * This is not final. This code is for demo only..
         */
        $tickets = User::find($this->user_id)->tickets;
        return fractal()->collection($tickets, new EventTicketTransformer);
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $this->updateProfileValidator($request->all(), $this->user_id)->validate();
        $user->update($request->all());
        return response()->json(['message' => 'Profile successfully updated.'], 200);
    }

    /**
     * Update profile validator
     * @param array $data
     * @param $id
     * @return mixed
     */
    private function updateProfileValidator(array $data, $id)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:75',
            'last_name' => 'required|max:75',
            'email' => [
                'required',
                'max:75',
                Rule::unique('pgsql.users.users')->ignore($id)
            ],
            'contact' => 'required|max:30',
            'birthday' => 'required|date|date_format:"Y-m-d"',
            'address' => 'required'
        ]);
    }
}
