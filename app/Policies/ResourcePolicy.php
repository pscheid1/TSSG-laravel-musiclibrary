<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy
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
     * Determine if the current logged on user can update a resource 
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-resource');
    }

    /**
     * Determine if the current logged on user can delete resource records
     *
     * @param  \App\User  $user (The current logged on user
     * @return bool
     */
    public function delete()
    {
        return \Auth::user()->hasRight('delete-resource');
    }

    
}
