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
     * Determine if the current logged on user can read tempo table
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-tempo');
    }

    /**
     * Determine if the current logged on user can create a  tempo entry
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-tempo');
    }

    /**
     * Determine if the current logged on user can write a tempo entry
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-tempo');
    }

    /**
     * Determine if the current logged on user can read a tempo entry
     *
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-tempo');
    }

    /**
     * Determine if the current logged on user can update a tempo entry
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-tempo');
    }

    /**
     * Determine if the current logged on user can delete a  tempo entry
     *
     * @return bool
     */
    public function delete()
    {
        return \Auth::user()->hasRight('delete-tempo');
    }

}
