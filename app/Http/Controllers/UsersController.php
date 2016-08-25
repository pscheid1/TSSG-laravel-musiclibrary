<?php

namespace App\Http\Controllers;

use Gate;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laracasts\Flash;
use App\User;
use App\Policies;
use Hash;
use App\BaseModel;
use App\Role;

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

        $user = new User;
        $rolesAdd = array('--- Select one or more ---') + Role::pluck('displayname', 'id')->toArray();
        // return the add user form with user roles
        $user->currentRole = 1;
        return view('user.createUser', compact('user', 'rolesAdd'));
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

        //$request->merge(['password' => Hash::make($request->password)]);

        $user = new User($request->all());
        $r = $request->get('userRoles');
        if ($user->currentRole == null)  // this was for dev testing only
        {
            $user->currentRole = (int) $r[0];
        }

        // User model does not extend BaseModel so getRules() has been copied to the User class.
        $this->validate($request, $user->getUpdateRules(User::$rules));

        $user->save();

        $user->roles()->sync($r);  //debug code

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

        // get the roles currently assigned to this user
        $userRoles = $user->roles()->pluck('displayname', 'id')->toArray();

        // return the edit user form with user info and user roles
        return view('user.editUser', compact('user', 'userRoles'));
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

        //$request->merge(['password' => Hash::make($request->password)]);
        $user = User::findOrFail($id);

        // User model does not extend BaseModel so getRules() has been copied to the User class.
        $this->validate($request, $user->getUpdateRules(User::$rules));

        $user->update($request->all());

        flash()->success("User '" . $user->username . "' successfully updated!");

        //$ur = $user->roles()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]);  // modified during developement to setup new accounts
        //$ur = $user->roles()->sync([1, 4, 7, 8, 9, 12, 13]);  // modified during developement to setup new accounts
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

        //$user->delete();

        flash()->success("User '" . "$user->username" . "' has been deleted from the database.");

        //return redirect()->back();
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

}
