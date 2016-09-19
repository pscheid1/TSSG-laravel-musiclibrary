<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Contact;
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
                    'username' => 'required|max:255|unique:users',
                    'loginpermitted' => 'required',
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'password' => 'required|min:6|confirmed',
                    'userRoles' => 'required',
                    'phone1' => 'required',
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
        $user = User::create([
                    'username' => $data['username'],
                    'prefix' => $data['prefix'],
                    'firstname' => $data['firstname'],
                    'middlename' => $data['middlename'],
                    'lastname' => $data['lastname'],
                    'suffix' => $data['suffix'],
                    'currentRole' => $data['userRoles'][0],
                    'company' => $data['company'],
                    'title' => $data['title'],
                    'note' => $data['note'],
                    //'location' => $data['location'],
                    //'activated' => $data['activated'],
                    //'terminated' => $data['terminated'],
                    'loginpermitted' => $data['loginpermitted'],
                    //'forcepwchange' => $data['forcepwchange'],
                    'password' => bcrypt($data['password']),
        ]);

        if ($user === false)
        {
            // User:: create failed
            return false;
        }

        // create a new contact record and save contact info
        // instansiate a new contact
        $contact = new Contact(array(
            'role_id' => $user->currentRole,
            'user_id' => $user->id,
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2'],
            'email' => $data['email'],
            'weburl' => $data['weburl']
        ));

        // save contact info
        if ($contact->save() === false)
        {
            // failed to create contact info record.
            // delete user record.
            $user->delete();
            // return false
            return $rslt;
        }
        $lastInsertId = $contact->id;
        $user->roles()->sync([$user->currentRole => ['contact_id' => $lastInsertId]]);
        
        // initialize the user's roles
        $currentRoleName = Role::where('id', $user->currentRole)->first()->name;
        $user->makeMember($currentRoleName);

        return $user;
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
