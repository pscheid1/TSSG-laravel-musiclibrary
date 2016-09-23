<?php

namespace App\Http\Controllers;

use App;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class RolesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(\policy(new Role)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $roles = Role::all();

        return view('role.indexRoles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(policy(new Role)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        return view('role.addRole');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(\policy(new Role)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $role = new Role($request->all());
        $role->updateuserid = \Auth::user()->id;
        $this->validate($request, $role::getRules());

        $role->save();
        $test = "Role '" . $role->name . "' successfully added!";
        flash()->success("Role '" . $role->name . "' successfully added!");

        //return $this->index(); // if you want to return to the list styles view
        return redirect()->back(); // if you want return to a new add style  view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!(policy(new Role)->show($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        ;
        $role = Role::find($id);
        if ($role == NULL)
        {
            flash()->error("Unable to locate requested role in database.")->important();
        }

        $lastupdatedby = '';
        if (!($role->updateuserid == null))
        {
            $usr = User::find($role->updateuserid);
            $lastupdatedby = $usr->firstname . ' ' . $usr->lastname;
            if (empty(trim($lastupdatedby)))
            {
                // there should always be a username
                $lastupdatedby = $usr->username;
            }
        }
        return view('role.editRole', compact('role', 'lastupdatedby'));
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
        if (!(policy(new Role)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $role = Role::find($id);
        $this->validate($request, $role->getUpdateRules());

        $role->updateuserid = \Auth::user()->id;
        $role->update($request->all());

        flash()->success("Role '" . $role->name . "' successfully updated!");

        //return $this->index();  // use this to return to the list styles page
        return redirect()->back(); // use this if you want to keep the update form displayed.
    }

    /**
     * Remove the specified resource (Role) from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!(policy(new Role)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // Instantiate a class for this model
        $role = Role::find($id);
        if ($role == NULL)
        {
            flash()->error("Unable to locate requested role in database.")->important();
            return redirect()->back();
        }

        // test for any users with this role
        if ($role->users->count() > 0)
        {
            // one or more user is assigned this role, therefore we cannot delete this role.
            flash()->error("Role '" . "$role->name" . "' is in use and therefore cannot be deleted")->important();
            return redirect()->back();
        }

        // this role is not assigned to any user therefore is can be deleted.
        $role->delete();

        flash()->success("Role '" . "$role->name" . "' has been deleted from the database.");

        return redirect()->back();
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
