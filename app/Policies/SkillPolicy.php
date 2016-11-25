<?php

namespace App\Policies;

use App\User;
use App\Skill;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillPolicy
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
     * Determine if the current logged on user can read skill table
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-skill');
    }

    /**
     * Determine if the current logged on user can create a skill entry
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-skill');
    }

    /**
     * Determine if the current logged on user can write a skill entry
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-skill');
    }

    /**
     * Determine if the current logged on user can read a skill entry
     *
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-skill');
    }

    /**
     * Determine if the current logged on user can update a skill entry
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-skill');
    }

    /*
     * Determine if the current logged on user can delete a  skill entry
     *
     * @return bool
     */

    public function delete()
    {
        return \Auth::user()->hasRight('delete-skill');
    }

    
}
