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
         * The function replaces the like named function in the ResetsPasswords.php trait.
         * 
         * For now we'll modify the code here.  later we'll move it out and keep this standard.
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
                flash()->error("Password reset cannot be completed.")->important();
            default:
                return $this->getSendResetLinkEmailFailureResponse($response);
        }
    }

    /**
     * Send a password reset link to a user.
     *
     * @param  array  $credentials
     * @param  \Closure|null  $callback
     * @return string
     */
    public function sendResetLink(array $credentials, Closure $callback = null)
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.
        $user = $this->getUser($credentials);

        if (is_null($user))
        {
            return static::INVALID_USER;
        }

        // Once we have the reset token, we are ready to send the message out to this
        // user with a link to reset their password. We will then redirect back to
        // the current URI having nothing set in the session to indicate errors.
        $token = $this->tokens->create($user);

        $this->emailResetLink($user, $token, $callback);

        return static::RESET_LINK_SENT;
    }

    /**
     * 
     * We are overrudubg this function because we don't have a 'home' url.
     * We could set up a home url but we can also accomplish the sameting here.
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
