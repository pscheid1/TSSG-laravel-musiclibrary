<?php

namespace App\Policies;

use App\User;
use App\Musiclibrary;
use Illuminate\Auth\Access\HandlesAuthorization;

class MusicLibraryPolicy
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
     * Determine if the current logged on user can read musiclibrary table
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-song');
    }

    /**
     * Determine if the current logged on user can create a musiclibrary entry
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-song');
    }

    /**
     * Determine if the current logged on user can write a musiclibrary entry
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-song');
    }

    /**
     * Determine if the current logged on user can read a musiclibrary entry
     *
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-song');
    }

    /**
     * Determine if the current logged on user can update a musiclibrary entry
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-song');
    }

    /*
     * Determine if the current logged on user can delete a  musiclibrary entry
     *
     * @return bool
     */

    public function delete()
    {
        return \Auth::user()->hasRight('delete-song');
    }


}
