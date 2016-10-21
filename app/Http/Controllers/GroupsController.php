<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash;
use App\BaseModel;
use App\Group;
use Illuminate\Support\Facades\Input;
use App\Role;

class GroupsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(\policy(new Group)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $groups = Group::all();

        return view('group.indexGroups', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(policy(new Group)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $group = new Group();
        $types = App\Style::pluck('DESCRIPTION', 'id')->toArray();
        $status = array('Inactive', 'Active');
        $role = Role::where('name', '=', 'manager')->first();
        $userswithrole = $role->users;
        $bandmaster;
        foreach ($userswithrole as $user)
        {
            $groupleader[$user->id] = $user->firstname . ' ' . $user->lastname;
        }
        return view('group.createGroup', compact('group', 'types', 'status', 'groupleader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(\policy(new Group)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        if ($request->groupleader === '')
        {
            flash()->error("A Group Leader selection is required.<br>It may be changed at any time in a later edits.")->important();
            return redirect()->back();
        }

        $group = new Group(request()->all());

        $this->validate($request, $group::getRules());
        $group->updateuserid = \Auth::user()->id;
        $group->save();
        
        // make group leader a member of the group
        $member = array($group->groupleader);
        $group->members()->sync($member, true);        

        //return $this->index(); // if you want to return to the list users view
        return redirect()->back(); // if you want return to a new add user  view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!(\policy(new Group)->show()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $group = Group::find($id);
        if ($group == NULL)
        {
            flash()->error("Unable to locate requested group in database.")->important();
        }

        $types = App\Style::pluck('DESCRIPTION', 'id')->toArray();
        $status = array('Inactive', 'Active');

        $members = array();
        $grpmembers = $group->members;
        foreach ($grpmembers as $grpmember)
        {
            $members[$grpmember->id] = $grpmember->firstname . ' ' . $grpmember->lastname;
        }

        $role = Role::where('name', '=', 'musician')->first();
        $userswithrole = $role->users;
        $available;
        foreach ($userswithrole as $user)
        {
            $available[$user->id] = $user->firstname . ' ' . $user->lastname;
        }

        // remove users already members of group from available
        $available = array_diff($available, $members);

        //$role = Role::where('name', '=', 'manager')->first();
        //$userswithrole = $role->users;
        $groupleader;
        foreach ($userswithrole as $user)
        {
            $groupleader[$user->id] = $user->firstname . ' ' . $user->lastname;
        }

        // To qualify for group leadership a user must be a group member and have a role of manager.
        $groupleader = array_intersect_assoc($members, $groupleader);

        return view('group.editGroup', compact('group', 'types', 'status', 'groupleader', 'members', 'available'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!(\policy(new Group)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $group = Group::findOrFail($id);

        $this->validate($request, $group->getUpdateRules());

        $newmembers = null;
        if ($request->has('available'))
        {
            foreach ($request->available as $newmember)
            {
                $newmembers[] = $newmember;
            }

            // add new members keeping old.
            // we can do this because the pivot table is not affected by
            // whether or not all steps below are successful
            $group->members()->sync($newmembers, false);
        }

        // test to see if removal was requested for any members
        if ($request->has('membership'))
        {

            foreach ($request->membership as $member)
            {
                $memberstoremove[] = $member;
            }

            // make sure we are not attempting to remove the 
            // current group leader from the group
            // we are checking against the request grouplader incase a change was requested
            if ((array_search(strval($request->groupleader), $memberstoremove, true)) !== false)
            {
                flash()->error("Cannot remove group leader from the group.  Select a new group leader than remove existing group leader from the group.")->important();
                return redirect()->back();
            }

            // get current group membership
            $members = null;
            $grpmembers = $group->members;
            foreach ($grpmembers as $grpmember)
            {
                $members[] = $grpmember->id;
            };
            // remove members selected for removal
            $members = array_diff($members, $memberstoremove);
            // sync group membership removing all previous members
            $group->members()->sync($members, true);
        }

        $group->update($request->all());

        flash()->success("Group '" . $group->name . "' successfully updated!");

        //return $this->index(); // if you want to return to the list groups view
        return redirect()->back(); // if you want to keep the updated form displayed.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!(policy(new Group)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // Verify the group to be deleted
        $group = Group::find($id);
        if ($group == NULL)
        {
            flash()->error("Unable to locate requested group in database.")->important();
        }
        
        $group->delete();
        $group->members()->sync([]);        

        flash()->success("Group '" . "$group->name" . "' has been deleted from the database.");

        //return redirect()->back();
        return $this->index();
        

        
        
    }

}
