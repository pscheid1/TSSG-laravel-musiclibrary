<?php

namespace App\Http\Controllers;

use Gate;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laracasts\Flash;
use App\User;
//use App\Policies\Contact;
use Hash;
use App\BaseModel;
use App\Role;
use App\Contact;
use Illuminate\Support\Facades\Input;

//use Illuminate\Http\Input;


class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(\policy(new User)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $users = User::all();

        return view('user.indexUsers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(policy(new User)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        /*
          if (!(policy(new Contact)->create()))
          {
          flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
          return redirect()->back();
          }
         */
        $user = new User;
        $allRoles = Role::pluck('displayname', 'id')->toArray();

        //$user->currentRole = 1;
        // return the add user form with user roles
        return view('user.createUser', compact('user', 'allRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(\policy(new User)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        if (!empty($request->password))
        {
            if ($request->password === $request->password_confirmation)
            {
                $request->merge(['password' => Hash::make($request->password)]);
            }
            else
            {
                flash()->error("Password and password confirmation do not match.")->important();
                return redirect()->back()->withInput();
            }
        }
        else
        {
            if ($request->loginpermitted == '1')
            {
                flash()->error("When Login Permitted is set, a password is required")->important();
                return redirect()->back()->withInput();
            }
        }

        // Get new user input
        $user = new User($request->only([$request->username, $request->prefix, $request->firsname, $request->middlename, $request->lastname, $request->suffix,
                    $request->currentRole, $request->password, $request->password_confirmation, $request->company, $request->title, $request->note]));
        /* Input::get() also works
          $u1 = new User(array(
          'username' => Input::get('username'),
          'firstname' => Input::get('firstname'),
          'lastname' => Input::get('lastname')
          // etc . . .
          ));
         * 
         */
        // Get contact information
        // $reqest->only([]) does not work for non user model
        //$c1 = new Contact($request->only([$request->address1, $request->address2, $request->city, $request->state, $request->zipcode, $request->phone1, $request->phone2, $request->email, $request->weburl]));
        $contact = new Contact(array(
            'address1' => Input::get('address1'),
            'address2' => Input::get('address2'),
            'city' => Input::get('city'),
            'state' => Input::get('state'),
            'zipcode' => Input::get('zipcode'),
            'phone1' => Input::get('phone1'),
            'phone2' => Input::get('phone2'),
            'email' => Input::get('email'),
            'weburl' => Input::get('weburl')
        ));
        // Direct access of Request object works also
        /*
          $contact = new Contact();
          $contact->address1 = $request->address1;
          $contact->address2 = $request->address2;
          $contact->city = $request->city;
          $contact->state = $request->state;
          $contact->zipcode = $request->zipcode;
          $contact->phone1 = $request->phone1;
          $contact->phone2 = $request->phone2;
          $contact->email = $request->email;
          $contact->weburl = $request->weburl;
         * 
         */

        // User model does not extend BaseModel so getUpdateRules() has been copied to the User class.
        $this->validate($request, $user->getUpdateRules(User::$rules));
        ;
        $this->validate($request, $contact::getRules());

        $user->save();
        $contact->save();

        $user->roles()->sync([$user->currentRole]);
        $user->contacts()->sync([$contact->id => ['role_id' => $user->currentRole]]);

        flash()->success("User '" . $user->username . "' successfully added!");

        //return $this->index(); // if you want to return to the list users view
        return redirect()->back(); // if you want return to a new add user  view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!(policy(\Auth::user())->show()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::findOrFail($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        // Admin or Band Manger may edit any user account.
        // All other users may only edit their own account
        if (\Auth::user()->username == $user->username)
        {
            // logged on user is editing his/her own account
        }
        else if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('manager'))
        {
            // logged on user is Admin or Band Manager
        }
        else
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // get all available roles
        //$allRoles = Role::pluck('displayname', 'id')->toArray();
        //$selectedRoles = $user->roles()->pluck('id')->toArray();
        // get the roles currently assigned to this user
        $userRoles = $user->roles()->pluck('displayname', 'id')->toArray();
        $contact = null;
        foreach ($user->contacts as $contact1)
        {
            if ($contact1->pivot->role_id === $user->currentRole)
            {
                $contact = $contact1;
                break;
            }
        }

        // return the edit user form with user info, user roles and contact info
        return view('user.editUser', compact('user', 'userRoles', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        /*
          if (!(\policy(new Contact)->update()))
          {
          flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
          return redirect()->back();
          }
         */
        //$request->merge(['password' => Hash::make($request->password)]);
        // Find the current user record
        $user = User::findOrFail($id);

        // Find the contact recored for the user.currentRole
        $contact = Contact::findOrFail($request->id);

        // User model does not extend BaseModel so getUpdateRules() has been copied to the User class.
        $this->validate($request, $user->getUpdateRules(User::$rules));

        $this->validate($request, $contact::getRules());

        $user->update($request->all());
        $contact->update($request->all());

        flash()->success("User '" . $user->username . "' successfully updated!");

        //$ur = $user->roles()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);  // modified during developement to setup new accounts
        //$ur = $user->roles()->sync([5, 7, 8, 9, 12]);  // modified during developement to setup new accounts
        //return $this->index(); // if you want to return to the list users view
        return redirect()->back(); // if you want to keep the updated form displayed.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id (user to be deleted)
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!(policy(new User)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // Verify the user to be deleted
        $user = User::findOrFail($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        if ($user->username == \Auth::user()->username)
        {
            flash()->error("User '" . "$user->username" . "' is the currently logged on user and therefore cannot be deleted")->important();
            return redirect()->back();
        }

        if (!(policy(new Contact)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // delete all contact info
        foreach ($user->contacts as $contact)
        {
            $contact->delete();
        }
        $user->contacts()->sync([]);
        $user->delete();

        flash()->success("User '" . "$user->username" . "' has been deleted from the database.");

        //return redirect()->back();
        return $this->index();
    }

    /**
     * Show the form for adding a role to an exsting user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (!(policy(\Auth::user())->show()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::findOrFail($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        // Admin or Band Manger may edit any user account.
        // All other users may only edit their own account
        if (\Auth::user()->username == $user->username)
        {
            // logged on user is editing his/her own account
        }
        else if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('manager'))
        {
            // logged on user is Admin or Band Manager
        }
        else
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // get all available roles
        $allRoles = Role::pluck('displayname', 'id')->toArray();
        $userRoles = $user->roles()->pluck('displayname', 'id')->toArray();
        // return only roles that have not already been selected
        $availableRoles = array_diff($allRoles, $userRoles);

        $user->currentRole = 0;
        // return the edit user form with user info, user roles and contact info
        return view('user.addUserRole', compact('user', 'availableRoles', null));
    }

    /**
     * Add a role to an existing user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addrole(Request $request, $id)
    {
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        /*
          if (!(\policy(new Contact)->update()))
          {
          flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
          return redirect()->back();
          }
         */

        $user = User::findOrFail($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        // Admin or Band Manger may edit any user account.
        // All other users may only edit their own account
        if (\Auth::user()->username == $user->username)
        {
            // logged on user is editing his/her own account
        }
        else if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('manager'))
        {
            // logged on user is Admin or Band Manager
        }
        else
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        /*
          if (!empty($request->password))
          {
          if ($request->password === $request->password_confirmation)
          {
          $request->merge(['password' => Hash::make($request->password)]);
          }
          else
          {
          flash()->error("Password and password confirmation do not match.")->important();
          return redirect()->back()->withInput();
          }
          }
          else
          {
          if ($request->loginpermitted == '1')
          {
          flash()->error("When Login Permitted is set, a password is required")->important();
          return redirect()->back()->withInput();
          }
          }

          $request->merge(['password' => Hash::make($request->password)]);
         * 
         */

        // instansiate a new contact
        $contact = new Contact(array(
            'address1' => Input::get('address1'),
            'address2' => Input::get('address2'),
            'city' => Input::get('city'),
            'state' => Input::get('state'),
            'zipcode' => Input::get('zipcode'),
            'phone1' => Input::get('phone1'),
            'phone2' => Input::get('phone2'),
            'email' => Input::get('email'),
            'weburl' => Input::get('weburl')
        ));

        // User model does not extend BaseModel so getUpdateRules() has been copied to the User class.
        $this->validate($request, $user->getUpdateRules(User::$rules));
        ;
        $this->validate($request, $contact::getRules());

        $user->update($request->all());
        ;
        $rslt = $contact->save();

        //$user->roles()->sync([$user->currentRole]);
        $user->roles()->attach($user->currentRole);
        $user->contacts()->attach($contact->id, ['role_id' => $user->currentRole]);
        $rolename = App\Role::where('id', $user->currentRole)->first()->displayname;
        flash()->success("Role '" . $rolename . "' successfully assigned to User '" . $user->username . "'.");

        return redirect()->route('user.show', $id);

        //return redirect()->back(); // if you want to keep the updated form displayed.
        //return $this->index(); // if you want to return to the list users view
    }

    /**
     * Delete a role from an existing user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleterole(Request $request, $id)
    {
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // deleting a role will delete the associated contact record.
        // test for sufficient rights to delete contact records
        if (!(policy(new Contact)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::findOrFail($id);
        $count = $user->contacts()->count();
        if ($user->contacts->count() < 2)
        {
            flash()->error("Attempting to delete last user contact.  Operation not permitted.")->important();
            return redirect()->back();
        }

        $contact2;
        foreach ($user->contacts as $contact1)
        {
            echo $contact1->pivot->role_id . "<br>";
            if ($contact1->pivot->role_id === $user->currentRole)
            {
                $contact2 = $contact1;
                break;
            }
        }

            $rolename = App\Role::where('id', $user->currentRole)->first()->displayname;

            // get the contact record for the currentRole
            $contact = $user->contactForRole($user->currentRole);
            // delete the role from the role_user pivot table
            $user->roles()->detatch($user->currentRole);
            // delete the pivot table contact entry
            $user->contacts()->detach(contact_id);
            // delete the contact record
            $contact->delete();
            // get the roles currently assigned to this user
            $userRoles = $user->roles()->pluck('displayname', 'id')->toArray();
            //$contact = null;
            /*
              }
             */
            flash()->success("Role '" . $rolename . "' successfully deleted from User '" . $user->username . "'.");

            // return the edit user form with user info, user roles and contact info
            return view('user.editUser', compact('user', 'userRoles', null));

            return redirect()->back();
        }
    }
    