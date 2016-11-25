<?php

namespace App\Policies;

use App\User;
use App\Instrument;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstrumentPolicy
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
     * Determine if the current logged on user can read instrument table
     *
     * @return bool
     */
    public function index()
    {
        return \Auth::user()->hasRight('read-instrument');
    }

    /**
     * Determine if the current logged on user can create a instrument entry
     *
     * @return bool
     */
    public function create()
    {
        return \Auth::user()->hasRight('create-instrument');
    }

    /**
     * Determine if the current logged on user can write a instrument entry
     *
     * @return bool
     */
    public function store()
    {
        return \Auth::user()->hasRight('create-instrument');
    }

    /**
     * Determine if the current logged on user can read a instrument entry
     *
     * @return bool
     */
    public function show()
    {
        return \Auth::user()->hasRight('read-instrument');
    }

    /**
     * Determine if the current logged on user can update a instrument entry
     *
     * @return bool
     */
    public function update()
    {
        return \Auth::user()->hasRight('update-instrument');
    }

    /*
     * Determine if the current logged on user can delete a  instrument entry
     *
     * @return bool
     */

    public function delete()
    {
        return \Auth::user()->hasRight('delete-instrument');
    }
    
}
