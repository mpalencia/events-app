<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\UserInterest;
use App\Transformers\TagTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserInterestController extends Controller
{
    protected $user_id;
    /**
     * UserInterestController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user_id = auth()->check() ? auth()->user()->id : "";
    }

    /**
     * Get the list of user interests
     * @return $this
     */
    public function getInterest()
    {
        /**
         * This is not final. This code is for demo only..
         */
        $interests = User::find($this->user_id)->interests;
        return fractal()->collection($interests, new TagTransformer);
    }

    /**
     * Save User Interest
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveInterest(Request $request)
    {
        /**
         * This is not final. This code is for demo only..
         */
        $this->saveInterestValidator($request->all())->validate();
        if (UserInterest::create(["user_id" => $this->user_id, "tag_id" => $request->tag_id]))
            return response()->json(["message" => "Successfully save interest."]);

        return response()->json(["message" => 'Something went wrong in saving interest.'], 500);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeInterest(Request $request)
    {
        /**
         * This is not final. This code is for demo only..
         */
        $this->removeInterestValidator(["id" => $request->id])->validate();

        if (UserInterest::where('tag_id', $request->id)->delete())
            return response()->json(["message" => "Successfully removed interest."]);

        return response()->json(["message" => 'Something went wrong in removing interest.'], 500);
    }

    /**
     * Save Interest Validation
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function saveInterestValidator(array $data)
    {
        /**
         * This is not final. This code is for demo only..
         */
        return Validator::make($data, [
            'tag_id' => ['required',
                'integer',
                'exists:pgsql.tags,id',
                Rule::unique('pgsql.users.user_interests')->where(function ($query) use ($data) {
                    return $query->where('tag_id', $data["tag_id"])
                        ->where('user_id', $this->user_id);
                })
            ]
        ]);
    }

    /**
     * Remove Interest
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function removeInterestValidator(array $data)
    {
        /**
         * This is not final. This code is for demo only...
         * Try to use Gates & Policies when there is auth now..
         */
        return Validator::make($data, [
            'id' => ['required',
                'integer',
                Rule::exists('pgsql.users.user_interests', 'tag_id')->where(function ($query) use ($data) {
                    return $query->where('user_id', $this->user_id);
                })
            ]
        ]);
    }
}
