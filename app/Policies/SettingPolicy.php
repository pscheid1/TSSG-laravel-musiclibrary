<?php

namespace App\Policies;

use App\User;
use App\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
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
     * Determine if the current logged on user can read setting table
     *
     * @return bool
     */
    public function index()
    {
        return false;
    }

    /**
     * Determine if the current logged on user can create a setting entry
     *
     * @return bool
     */
    public function create()
    {
        return false;
    }

    /**
     * Determine if the current logged on user can write a setting entry
     *
     * @return bool
     */
    public function store()
    {
        return false;
    }

    /**
     * Determine if the current logged on user can read a setting entry
     *
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-settings');
    }

    /**
     * Determine if the current logged on user can update a setting entry
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-settings');
    }

    /*
     * Determine if the current logged on user can delete a  setting entry
     *
     * @return bool
     */

    public function delete()
    {
        return false;
    }

    
}
