<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
//use Illuminate\Support\Str;
use Illuminate\Http\Request;
//use Illuminate\Mail\Message;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\user;
use App\Contact;

class PasswordController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        /*
         * This function overrides the like named function in the ResetsPasswords.php trait.
         * 
         * Standard laravel relies on an email address in the user table.  Musicians Manager can have multiple email
         * addresses for a user, one for each role in the contact table.  We are changing the code to accept a 
         * username.  We will lookup (verify) the username and get the contact info for the user's current role. We will get
         * the email address from this contact info and verify that it matches the one supplied in the request.  
         * We will insert this email address into an email field in the user record that is only used for this purpose.  This will
         * allow us to return to the standard code path and use the standard code.  
         */
        $user = User::where('username', '=', $request->username)->first();

        if ($user == null)
        {
            flash()->error('These credentials do not match our records')->important();
            return redirect()->back()
                            ->withInput($request->only('username', 'email'));
            //->withErrors(['email' => trans('These credentials do not match our records')]);
        }

        $credentialsVerified = false;
        // loop through all contacts for this user and look for supplied email address
        foreach ($user->contacts as $contact)
        {
            if (trim($contact->email) == trim($request->email))
            {
                $credentialsVerified = true;
                break;
            }
        }

        if (!$credentialsVerified)
        {
            flash()->error('These credentials do not match our records')->important();
            return redirect()->back()
                            ->withInput($request->only('username', 'email'));
            //->withErrors(['email' => trans('These credentials do not match our records')]);
        }

        //Save the reset password email address in the user table
        $user->email = $request->email;
        $user->save();

        $broker = $this->getBroker();

        $response = Password::broker($broker)->sendResetLink(
                $this->getSendResetLinkEmailCredentials($request), $this->resetEmailBuilder()
        );

        switch ($response) {
            case Password::RESET_LINK_SENT:
                flash()->success('Password reset email has been sent.')->important();
                return $this->getSendResetLinkEmailSuccessResponse($response);
            case Password::INVALID_USER:
            default:
                flash()->error("Password reset cannot be completed.")->important();
                return $this->getSendResetLinkEmailFailureResponse($response);
        }
    }

    /**
     * This function overrides the like named function in the RedirectsUser.php trait.
     * 
     * The password reset operation redirects to '/home' upon successful completion.
     * We are overriding this function because we don't have a 'home' url.  
     * We could set up a home url but we can also accomplish the samething here.
     * We also add a 'Successful' flash message.
     * 
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        flash()->success('Your password has successfully been reset.')->important();

        //return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

}
