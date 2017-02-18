<?php

namespace App\Http\Controllers\Helpers;

use App\User;

/**
 * Description of PageSizeHelper
 *
 * this function will return the page size for a specific list for a specific user.
 * the input parameters are:
 *      $keyPgSz - the key for the INITIALPAGESIZES constant array
 *      $rqstPgIndx - may be null or the index to the PAGESIZES constant array.
 * if $rqstPgIndx is null, the user is using their current pages size for the specific list
 * if $rqstPgIndx is not null, the user has selected a new page size 
 * if a new page size has been selected, it is saved in an updated copy of the
 * pageSizes column of the user table.
 * 
 */
// define the array of available page sizes 
define ('PAGESIZES', [10, 15, 25, 50, 100]);
// define the array of initial page sizes for specific lists
// each list, users, songs etc. must be a value from PAGESIZES
define ('INITIALPAGESIZES', ['users' => 100, 'tempos' => 25, 'styles' => 25, 'skills' => 25,
                                                    'roles' => 50, 'songs' => 100, 'instruments' => 100, 'groups' => 50]);

class PageSizeHelper
{

    public function getPgSzIndx($keyPgSz, $rqstPgSzIndx)
    {
        // Initialize to max page size.
        $currPgSz = 100;
        // get saved page sizes for logged on user
        $lu = User::find(\Auth::user()->id);
        $defPgSz = $lu->pageSizes;
        // test for existance of passed in key
        if (array_key_exists($keyPgSz, $defPgSz))
        {
            // get current page size for passed in key
            $currPgSz = $defPgSz[$keyPgSz];
        }

        // get the default page size array
        //$availablePgSizes = PAGESIZES;
        // get index for current page size
        $pgSzIndx = array_search($currPgSz, PAGESIZES);
        // has a new page size been selected
        if ($rqstPgSzIndx != null)
        {
            // user is changing page size
            $pgSzIndx = $rqstPgSzIndx;
            // get new page size
            $newPgSz = PAGESIZES[$pgSzIndx];
            // shouldn't need the following test but we'll test anyway
            if ($newPgSz != $currPgSz)
            {
                // replace the page size in the user page size array
                $defPgSz[$keyPgSz] = $newPgSz;
                // save the new array of page sizes in the user object
                $lu->pageSizes = $defPgSz;
                // update the database
                $lu->save();
            }
        }
        
        return $pgSzIndx;
    }

}
