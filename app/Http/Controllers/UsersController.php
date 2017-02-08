<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Role;
use App\Contact;
use App\Resource;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Helpers\PageSizeHelper;

class UsersController extends Controller
{
    /*
     *  using this function to rename an array key.
     *  it does not maintain key order in case that is important.
     */

    public function renameKey($array, $old_key, $new_key)
    {
        $array[$new_key] = $array[$old_key];
        unset($array['$old_key']);
        return $array;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!(\policy(new User)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // get this users page size for this list
        $pgSizeHelper = new PageSizeHelper();
        $pgSzIndx = $pgSizeHelper->getPgSzIndx('users', $request->pageSize);

        $users = User::paginate(PAGESIZES[$pgSzIndx]);

        $usrgps = array();
        $instruments = array();

        // iterate through the list of users
        foreach ($users as $user)
        {
            // build a list of group membershipa for this user, if any
            $groups = $user->groupMemberShip;
            $namelist = array();
            foreach ($groups as $group)
            {
                array_push($namelist, $group->name);
            }

            $usrgps[$user->id] = $namelist;

            // build a list of intrusments for this user, if any
            $userResources = $user->resources;
            $userInstruments = array();
            foreach ($userResources as $resource)
            {
                array_push($userInstruments, $resource->instrument->name);
            }

            $instruments[$user->id] = $userInstruments;
        }

        return view('user.indexUsers', compact('users', 'usrgps', 'instruments', 'pgSzIndx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!(policy(new User)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        /*
         * Contact rights are assumed and therefore not checked
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

        if (!empty($request->password) || !empty($request->password_confirmation))
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

        /*
          $reqest->only([]) wil not work for non user model
          $c1 = new Contact(
          $request->only([
          $request->address1, $request->address2, $request->city, $request->state, $request->zipcode, $request->phone1, $request->phone2, $request->email, $request->weburl
          ]));
         * 
         */

        // Get contact information
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

        $contact->role_id = $request->currentRole;

        $this->validate($request, User::$rules);
        $this->validate($request, $contact::getRules());

        $user->updateuserid = \Auth::user()->id;
        $user->save();
        $contact->user_id = $user->id;
        $contact->updateuserid = \Auth::user()->id;
        $contact->save();
        $lastInsertId = $contact->id;

        $user->roles()->sync([$user->currentRole => ['contact_id' => $lastInsertId]]);
        $rolename = App\Role::where('id', $user->currentRole)->first()->displayname;

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

        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }


        // Do we need to check for Contact rightsl
        // Seems to me User rights and Contact rights ought to be the same so
        // we could possibly delete Contact rights.
        // Admin or Band Manger may edit any user account.
        // All other users may only edit their own account
        if (\Auth::user()->username == $user->username)
        {
            // logged on user is editing his/her own account
        }
        // old checks, logged on user only needed to have these roles
        // else //if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('manager'))
        else
        {
            // new checks.  logged on user must have admin or manager as its current role.
            $loggedOnUserRole = Role::where('id', \Auth::user()->currentRole)->first()->name;
            if ($loggedOnUserRole == 'admin' || $loggedOnUserRole == 'manager')
            {
                // logged on user's currentRole is Admin or Band Manager               
            }
            else
            {
                flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
                return redirect()->back();
            }
        }

        // get the roles currently assigned to this user
        $userRoles = $user->roles()->pluck('displayname', 'id')->toArray();
        // get the contact info for this user/role
        $contact = Contact::findOrFail($user->contactIdForRole($user->currentRole));

        // change the contact timestamp keys to separate them from the user model keys
        $contact = $this->renameKey($contact, 'created_at', 'contact_created_at');
        $contact = $this->renameKey($contact, 'updated_at', 'contact_updated_at');

        $userupdatedby = User::find($user->updateuserid)->firstname . ' ' . User::find($user->updateuserid)->lastname;
        $contactupdatedby = User::find($contact->updateuserid)->firstname . ' ' . User::find($contact->updateuserid)->lastname;

        // return the edit user form with user info, user roles and contact info
        return view('user.editUser', compact('user', 'userRoles', 'contact', 'userupdatedby', 'contactupdatedby'));
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

        if (!(\policy(new Contact)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // Find user record for user to edit
        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        if (!empty($request->password) || !empty($request->password_confirmation))
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
            // prevent any current password from being replaced by blanks
            $request->merge(['password' => $user->password]);
        }

        $newRole = false;
        if (\Auth::user()->username == $user->username)
        {
            // logged on user is editing his/her own account
            // test to see if user currentrole is being changed
            // we need to know this to know if rights need to be recomputed below.
            $newRole = $request->currentRole != $user->currentRole;
        }

        // Find the contact record for the user.currentRole
        // any changes are for the current role contact, not a possible new role assigment.
        // therefore use the $user->currentRole and not the $request->currentRole;
        $contact = $user->contactForRole($user->currentRole);
        // User model does not extend BaseModel so getUpdateRules() has been copied to the User class.
        $this->validate($request, $user->getUpdateRules(User::$rules));

        $this->validate($request, $contact->getUpdateRules());

        // if a form checkbox is not set (= 0) its attribute is not returned in $request and therefore will not
        // be written to the database.
        // if a checkbox is set (=1), the attribute is always returned in $request and therefore will be 
        // wirtten to the database.
        // therefore, if we initialize the boolean to 0 (which is already in memory in $user),
        // it will either be written to the database or set to 1 depending on what state the checkbox is set to.

        $user->loginpermitted = 0;
        $lastupdate = $user->updated_at;
        $user->update($request->all());
        if ($lastupdate->ne($user->updated_at))
        {
            // something has been modified in the user model
            $user->updateuserid = \Auth::user()->id;
            $user->save();
        }

        $lastupdate = $contact->updated_at;
        $contact->update($request->all());
        if ($lastupdate->ne($contact->updated_at))
        {
            // something has been modifed in the contact model
            $contact->updateuserid = \Auth::user()->id;
            $contact->save();
        }

        if ($newRole)
        {
            // logged on user has changed their role
            // recompute allowed rights
            $currentRoleName = Role::where('id', $user->currentRole)->first()->name;
            $user->makeMember($currentRoleName);
        }

        flash()->success("User '" . $user->username . "' successfully updated!");

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
        $user = User::find($id);
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
        /*
         * Delete any assigend instruments (resources) <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         */
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

        $user = User::find($id);
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
        // old checks, logged on user only needed to have these roles
        // else //if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('manager'))
        else
        {
            // new checks, logged on user must have admin or manager as its current role.
            $loggedOnUserRole = Role::where('id', \Auth::user()->currentRole)->first()->name;
            if ($loggedOnUserRole == 'admin' || $loggedOnUserRole == 'manager')
            // logged on user's currentRole is Admin or Band Manager
            {
                
            }
            else
            {
                flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
                return redirect()->back();
            }
        }

        // get all available roles
        $allRoles = Role::pluck('displayname', 'id')->toArray();
        $userRoles = $user->roles()->pluck('displayname', 'id')->toArray();
        // return only roles that have not already been selected
        $availableRoles = array_diff($allRoles, $userRoles);
        $user->currentRole = 0;

        $userupdatedby = User::find($user->updateuserid)->firstname . ' ' . User::find($user->updateuserid)->lastname;

        // return the addUserRole form with user info, user roles and contact info
        return view('user.addUserRole', compact('user', 'availableRoles', 'userupdatedby'));
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


        if (!(\policy(new Contact)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }


        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        // old checks, logged on user only needed to have these roles
        // else //if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('manager'))
        else
        {
            // new checks, logged on user must have admin or manager as its current role.
            $loggedOnUserRole = Role::where('id', \Auth::user()->currentRole)->first()->name;
            //if ($loggedOnUserRole == 'admin' || $loggedOnUserRole == 'manager')
            if ($loggedOnUserRole == 'admin')
            // logged on user's currentRole is Admin                      >>>>> removed this funcitonality >>>>   or Band Manager
            {
                
            }
            else
            {
                flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
                return redirect()->back();
            }
        }

        if (!empty($request->password) || !empty($request->password_confirmation))
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
            // prevent any current password from being replaced by blanks
            $request->merge(['password' => $user->password]);
        }

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
        $contact->user_id = $id;
        $contact->role_id = $request->currentRole;
        // User model does not extend BaseModel so getUpdateRules() has been copied to the User class.
        $this->validate($request, $user->getUpdateRules(User::$rules));
        ;
        $this->validate($request, $contact::getRules());

        // if a form checkbox is not set (= 0) its attribute is not returned in $request and therefore will not
        // be written to the database.
        // if a checkbox is set (=1), the attribute is always returned in $request and therefore will be 
        // wirtten to the database.
        // therefore, if we initialize the boolean to 0 (which is already in memory in $user),
        // it will either be written to the database or set to 1 depending on what state the checkbox is set to.

        $user->loginpermitted = 0;

        $lastupdate = $user->updated_at;
        $user->update($request->all());
        if ($lastupdate->ne($user->updated_at))
        {
            // something has been modified in the user model
            $user->updateuserid = \Auth::user()->id;
            $user->save();
        }

        //$contact->user_id = $user->id;
        $contact->updateuserid = \Auth::user()->id;

        $contact->save();
        $lastInsertId = $contact->id;

        $user->roles()->attach($user->currentRole, ['contact_id' => $lastInsertId]);
        $rolename = App\Role::where('id', $user->currentRole)->first()->displayname;
        flash()->success("Role '" . $rolename . "' successfully assigned to User '" . $user->username . "'.");

        return redirect()->route('user.show', $id);
    }

    /**
     * Unassign a role from a user
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
        if ($user->roles->count() < 2)
        {
            flash()->error("Attempting to delete last user role.  Operation not permitted.")->important();
            return redirect()->back();
        }

        if ($user->contacts->count() < 2)
        {
            flash()->error("Attempting to delete last user contact.  Operation not permitted.")->important();
            return redirect()->back();
        }

        $rolename = App\Role::where('id', $user->currentRole)->first()->displayname;

        // get the contact record for the currentRole
        $contact = $user->contactForRole($user->currentRole);
        // delete the role from the role_user pivot table
        $user->roles()->detach($user->currentRole);
        // delete the contact record
        $contact->delete();
        // get the roles currently assigned to this user
        $userRoles = $user->roles()->pluck('displayname', 'id')->toArray();
        $userRoles = array_reverse($userRoles, true);
        $keys = array_keys($userRoles);
        $user->currentRole = $keys[0];
        $user->updateuserid = \Auth::user()->id;
        $user->save();

        // get the contact info for this user/role
        $contact = $user->contactForRole($user->currentRole);

        // change the timestamp keys to separate them from the user model keys
        $contact = $this->renameKey($contact, 'created_at', 'contact_created_at');
        $contact = $this->renameKey($contact, 'updated_at', 'contact_updated_at');

        flash()->success("Role '" . $rolename . "' successfully deleted from User '" . $user->username . "'.");

        // return the edit user form with user info, user roles and contact info
        return view('user.editUser', compact('user', 'userRoles', 'contact'));
    }

    /**
     * Display the form to Edit/Add/Delete Instruments for a specific user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexInstruments(Request $request, $id)
    {
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::findOrFail($id);
        // build a list of intrusments for this user, if any
        $userResources = $user->resources;

        return view('user.instrument.indexUserInst', compact('user', 'userResources'));
    }

    /**
     * Display form to add an instrument to an existing user 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addInstrumentsRequest(Request $request, $id)
    {
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        // build a list of intruments for this user, if any
        $userResources = $user->resources;
        $userInstruments = array();
        foreach ($userResources as $resource)
        {
            array_push($userInstruments, $resource->instrument->name);
        }

        // get a list of all available instruments    
        $allInstruments = App\Instrument::pluck('name', 'id')->toArray();
        // return all instruments minus currently assigned instruments
        $instruments = array_diff($allInstruments, $userInstruments);
        $mgrskill = App\Skill::pluck('name', 'id')->toArray();
        $skill = App\Skill::pluck('name', 'id')->toArray();
        $solo = array('1' => 'Yes', '0' => 'No');

        return view('user.instrument.addUserInstrRequest', compact('user', 'instruments', 'mgrskill', 'skill', 'solo'));
    }

    /**
     * Display form to add an instrument to an existing user 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addInstrument(Request $request, $id)
    {
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
        }

        $resource = new Resource($request->all());
        $this->validate($request, $resource->getUpdateRules());
        $resource->updateuserid = \Auth::user()->id;
        $resource->save();

        $instName = App\Instrument::where('id', $resource->instrument_id)->first()->name;
        flash()->success("Instrument '" . $instName . "' successfully added to user '" . $user->username . "'.");

        return $this->indexInstruments($request, $id); //return to list instruments for user form
        //return \redirect()->back(); // return to initialized add instrument form
    }

    /**
     * edit selected user instrument proficiency
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProficiency(Request $request, $id)
    {
        // currently, resource rights are determined by user rights
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
            return redirect()->back();
        }

        $resource = Resource::find($request->resourceId);
        if ($resource == null)
        {
            flash()->error("Unable to locate requested resource in database.")->important();
            return redirect()->back();
        }

        $instName = App\Instrument::where('id', $resource->instrument_id)->first()->name;
        $mgrskill = App\Skill::pluck('name', 'id')->toArray();
        $skill = App\Skill::pluck('name', 'id')->toArray();
        $solo = array('1' => 'Yes', '0' => 'No');

        return view('user.instrument.editUserInstr', compact('user', 'instName', 'resource', 'mgrskill', 'skill', 'solo'));
    }

    /**
     * update currently displayed user instrument proficiency
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProficiency(Request $request, $id)
    {
        // currently, resource rights are determined by user rights        
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
            return redirect()->back();
        }

        $resource = Resource::find($request->resourceId);
        if ($resource == null)
        {
            flash()->error("Unable to locate requested resource in database.")->important();
            return redirect()->back();
        }

        $this->validate($request, $resource->getUpdateRules());
        $lastupdate = $resource->updated_at;
        $resource->update($request->all());
        if ($lastupdate->ne($resource->updated_at))
        {
            // something has been modified in the resource model
            $resource->updateuserid = \Auth::user()->id;
            $resource->save();
        }

        $instName = App\Instrument::where('id', $resource->instrument_id)->first()->name;
        flash()->success("Instrument '" . $instName . "' successfully updated for user '" . $user->firstname . " " . $user->lastname . "'.");

        return $this->indexInstruments($request, $id); //return to list instruments for user form
    }

    /**
     * unassign instrument from user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteInstrument(Request $request, $id)
    {
        // currently, resource rights are determined by user rights        
        if (!(\policy(new User)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $user = User::find($id);
        if ($user == NULL)
        {
            flash()->error("Unable to locate requested user in database.")->important();
            return redirect()->back();
        }

        $resource = Resource::find($request->resourceId);
        if ($resource == null)
        {
            flash()->error("Unable to locate requested resource in database.")->important();
            return redirect()->back();
        }

        $resource->delete();

        flash()->success($resource->instrument->name . " has been deleted from user " . $user->firstname . '  ' . $user->lastname);

        return redirect()->back();
    }

}
