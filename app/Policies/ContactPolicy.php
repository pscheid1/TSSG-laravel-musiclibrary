<?php

namespace App\Policies;
use App\User;
use App\Contact;

use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
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
     * Determine if the current logged on user can read a contact entry
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-contact');
    }

    /**
     * Determine if the current logged on user can create a contact entry
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-contact');
    }
    
       /**
     * Determine if the current logged on user can write a contact entry
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-contact');
    }

    /**
     * Determine if the current logged on user can show a contact entry
     *r
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-contact');
    }
    
    /**
     * Determine if the current logged on user can update a contact entry
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-contact');
    }

    /**
     * Determine if the current logged on user can delete contact entries
     *
     * @param  \App\User  $user (The current logged on user
     * @return bool
     */
    public function delete()
    {
        return \Auth::user()->hasRight('delete-contact');
    }
}
