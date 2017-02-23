<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use App\Group;
use App\Role;
use App\User;
use App\Http\Controllers\Helpers\PageSizeHelper;

class GroupsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!(\policy(new Group)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        
        // get this users page size for this list
        $pgSizeHelper = new PageSizeHelper();
        $pgSzIndx = $pgSizeHelper->getPgSzIndx('groups', $request->pageSize);

        $groups = Group::sortable()->paginate(PAGESIZES[$pgSzIndx]);
        $groups->appends($request->input());
        
        return view('group.indexGroups', compact('groups', 'pgSzIndx'));
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

        // get all users with role of musician
        $role = Role::where('name', '=', 'musician')->first();
        $userswithrole = $role->users;
        $available = array();
        foreach ($userswithrole as $user)
        {
            $available[$user->id] = $user->firstname . ' ' . $user->lastname;
        }
        
        // get all users with role of substitute musician
        $role = Role::where('name', '=', 'sub')->first();
        $userswithrole = $role->users;
        $subs = array();
        foreach ($userswithrole as $user)
        {
            $subs[$user->id] = $user->firstname . ' ' . $user->lastname;
        }
        //remove subs that are also muscians
        $subs = array_diff($subs, $available);
        // merge musicians and substitute musicians (do not use array_merge, use array union '+')
        // array_merge will create an new key and append it.  We need to keep the key equal to the user_id
        $available = $available + $subs;

        // remove users already members of group from available
        $available = array_diff($available, $members);

        $role = Role::where('name', '=', 'manager')->first();
        // get all users with role of manager
        $userswithrole = $role->users;
        $managers;
        foreach ($userswithrole as $manager)
        {
            $managers[$manager->id] = $manager->firstname . ' ' . $manager->lastname;
        }

        // To qualify for group leadership a user must be a group member and have a role of manager.
        // removing the following statement allows any band manager to be appointed as a group leader
        //$managers = array_intersect_assoc($members, $managers);

        return view('group.editGroup', compact('group', 'types', 'status', 'managers', 'members', 'available'));
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

        // if \Auth::user is not an Admin then they must be the group manager
        if (\Auth::user()->id !== $group->groupleader &&  Role::where('id', \Auth::user()->currentRole)->first()->name !== 'admin')
        {
            flash()->error("Request denied.  Logged on user's current role must be 'admin'<br> or logged on user must be group manager.")->important();
            return redirect()->back();
           
        }
        $this->validate($request, $group->getUpdateRules());

        $newmembers = array();
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
            }
            // remove members selected for removal
            $members = array_diff($members, $memberstoremove);
            // sync group membership removing all previous members
            $group->members()->sync($members, true);
        }

        // if the existing groupleader does not have the role of musician or substitue musician, remove him/her from the group
        // if the existing groupleader is not replaced they will be added back into the group in the code futher down
        $grpleader = User::find($group->groupleader);
        if (!($grpleader->hasRole('musician') || $grpleader->hasRole('sub')))
        {
            // if not a musician, remove current groupmanager from the group
            // if the groupleader has a role of musician they are left as a group member even if they are replaced as the group leader.        
            $group->members()->detach($group->groupleader);
        }
        // make request->groupleader a member of the group
        // this is performed every update incase a new group leader has been selected
        $member = array($request->groupleader);
        //$group->members()->sync($member, false);                  // will not add additional entry if one already exists
        $group->members()->syncWithoutDetaching($member); // will not add additional entry if one already exists  
        //$group->members()->attach($member);                        // add entries regardless of existing entries
        
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
