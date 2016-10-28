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
}
