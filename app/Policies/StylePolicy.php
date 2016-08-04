<?php

namespace App\Policies;

use App\User;
use App\Style;
use Illuminate\Auth\Access\HandlesAuthorization;

class StylePolicy
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
    
    public function before($user, $ability)
    {
        if ($user->userType == 'admin')
            return true;
    }
    
         /**
     * Determine if the given style can be indexed by the user.
     *
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasRole('read-style');
    }
    
       /**
     * Determine if the given style can be created by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Style  $style (currently not used)
     * @return bool
     */
    public function create(User $user)
    {
        return $user->hasRole('create-styles');
    }

    /**
     * Determine if the given style can be stored by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Style  $style (currently not used)
     * @return bool
     */
    public function store(User $user)
    {
        return $user->hasRole('create-style');
    }

    /**
     * Determine if the given style can be showed by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Style  $style (currently not used)
     * @return bool
     */
    public function show(User $user)
    {
        return $user->hasRole('read-style');
    }

 
      /**
     * Determine if the given style can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Style  $style (currently not used)
     * @return bool
     */
    public function update(User $user)
    {
        return $user->hasRole('update-style');
    }

       /**
     * Determine if the given style can be deleted by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $style
     * @return bool
     */
    public function delete(User $user)
    {
        return $user->hasRole('delete-style');
    }


}
