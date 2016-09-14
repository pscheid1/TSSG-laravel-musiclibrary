<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Role;

class AuthController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;


    /*
     * Add username property as .Illuminate\Foundation\Auth\AuthenticatesUsers trait checks if the property $username 
     * exists first before using the default which is 'email'.
     */

    protected $username = 'username';

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Where to redirect users after logout
     *
     * @var string
     */
    protected $redirectAfterLogout = 'auth/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'username' => 'required|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                   // 'phone1' => 'required',
                    'email' => 'required|email|max:255',
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
                    'username' => $data['username'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                   // 'location' => $data['location'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    protected function authenticated(Request $request, User $user)
    {

        $currentRole = Role::where('id', $user->currentRole)->first()->name;

        $user->makeMember($currentRole);

        return redirect()->intended($this->redirectPath());
    }
    
    //override getRegister()
    public function getRegister()
    {
        return \view('auth.register');
    }

}
