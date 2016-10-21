<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
   /**
     * Determine if the current logged on user can read a group
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-group');
    }

    /**
     * Determine if the current logged on user can create a group
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-group');
    }
    
       /**
     * Determine if the current logged on user can write a group
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-group');
    }

    /**
     * Determine if the current logged on user can show a group
     *r
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-group');
    }
    
    /**
     * Determine if the current logged on user can update a group
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-group');
    }

    /**
     * Determine if the current logged on user can delete a group
     *
     * @param  \App\User  $user (The current logged on user
     * @return bool
     */
    public function delete()
    {
        return \Auth::user()->hasRight('delete-group');
    }
    
}
