<?php

namespace App\Policies;

use App\User;
use App\Tempo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TempoPolicy
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
     * Determine if the given tempo can be indexed by the user.
     *
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasRole('read-tempo');
    }

    /**
     * Determine if the given tempo can be created by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Tempo  $tempo (currently not used)
     * @return bool
     */
    public function create(User $user)
    {
        return $user->hasRole('create-tempo');
    }

    /**
     * Determine if the given tempo can be stored by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Tempo  $tempo (currently not used)
     * @return bool
     */
    public function store(User $user)
    {
        return $user->hasRole('create-tempo');
    }

    /**
     * Determine if the given tempo can be showed by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Tempo  $tempo (currently not used)
     * @return bool
     */
    public function show(User $user)
    {
        return $user->hasRole('read-tempo');
    }

    /**
     * Determine if the given tempo can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Tempo  $tempo (currently not used)
     * @return bool
     */
    public function update(User $user)
    {
        return $user->hasRole('update-tempo');
    }

    /**
     * Determine if the given tempo can be deleted by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Tempo  $tempo   $tempo (currently not used)
     * @return bool
     */
    public function delete(User $user)
    {
        return $user->hasRole('delete-tempo');
    }

    
}
