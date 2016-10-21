<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * Determine if the current logged on user can read a user account
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-user');
    }

    /**
     * Determine if the current logged on user can create a user account
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-user');
    }
    
       /**
     * Determine if the current logged on user can write a user account
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-user');
    }

    /**
     * Determine if the current logged on user can show a user account
     *r
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-user');
    }
    
    /**
     * Determine if the current logged on user can update a user account
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-user');
    }

    /**
     * Determine if the current logged on user can delete user accounts
     *
     * @param  \App\User  $user (The current logged on user
     * @return bool
     */
    public function delete()
    {
        return \Auth::user()->hasRight('delete-user');
    }

}
