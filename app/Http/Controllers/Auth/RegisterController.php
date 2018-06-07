<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if($this->isAcceptTypeApplicationJson($request))
            return response()->json(['message' => 'User successfully registered'], 201);
        return $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:75',
            'last_name' => 'required|max:75',
            'email' => 'required|max:75|unique:pgsql.users.users',
            'contact' => 'required|max:30',
            'birthday' => 'required|date|date_format:"Y-m-d"',
            'address' => 'required',
            'password' => 'required|max:75|min:6|confirmed',
            'password_confirmation' => 'required|max:75|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
