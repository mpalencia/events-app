<?php

namespace App\Http\Controllers\AuthOrganizer;

use App\Model\Organizer;
use App\Serializers\FlatDataArraySerializer;
use App\Transformers\OrganizerTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $token = $this->guard()->attempt($this->credentials($request));

        if ($token) {
            $this->guard()->setToken($token);

            return true;
        }

        return false;
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $token = (string)$this->guard()->getToken();
        $expiration = $this->guard()->getPayload()->get('exp');

        $organizer = auth()->guard('organizers')->user();
        return [
            'organizer' => fractal()->item($organizer, new OrganizerTransformer)
                ->serializeWith(new FlatDataArraySerializer(new OrganizerTransformer(), new Organizer())),
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time()
        ];
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        if ($request->header('accept') === 'application/json')
            return response()->json(['message' => 'Successfully logged out.'], 200);
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('organizers');
    }
}
