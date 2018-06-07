<?php

namespace App\Traits;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
use FCM;

trait FirebaseTrait
{
    protected $firebaseAuth;

    /**
     * save firebase id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveFirebaseId(Request $request)
    {
        $this->saveFirebaseIdValidator($request->all())->validate();
        $this->firebaseAuth->firebase_id = $request->firebase_id;
        if ($this->firebaseAuth->save())
            return response()->json(['message' => 'Successfully save firebase instance id.'], 200);
        return response()->json(['message' => 'Something went wrong in saving firebase instance id.'], 500);
    }

    /**
     * Save Firebase Id Validator
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function saveFirebaseIdValidator(array $data)
    {
        return Validator::make($data, [
            "firebase_id" => "required"
        ]);
    }

    /**
     * Set the auth model for saving firebase id
     * @param Model $auth
     */
    public function setFirebaseAuth(Model $auth)
    {
        $this->firebaseAuth = $auth;
    }

    /**
     * @param $token
     * @param array $data
     * @param array $notif_builder
     * *body - body message of notification
     */
    public function sendFCM($token, $data = [], $notif_builder = []){
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder(config('constants.notif_title'));
        $notificationBuilder->setBody($notif_builder['body'])
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

//return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

//return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

//return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();
    }
}