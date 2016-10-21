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

    /**
     * Determine if the current logged on user can read style table
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-style');
    }

    /**
     * Determine if the current logged on user can create a style entry
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-style');
    }

    /**
     * Determine if the current logged on user can write a style entry
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-style');
    }

    /**
     * Determine if the current logged on user can read a style entry
     *
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-style');
    }

    /**
     * Determine if the current logged on user can update a style entry
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-style');
    }

    /*
     * Determine if the current logged on user can delete a  style entry
     *
     * @return bool
     */

    public function delete()
    {
        return \Auth::user()->hasRight('delete-style');
    }

}
