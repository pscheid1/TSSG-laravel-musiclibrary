<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;


class PagesController extends Controller
{

    public function home()
    {

        if (\Auth::user() == null)
        {
            return view('auth.login');
        }

        return view('pages.home');
    }
    
    public function notYetAvailable()
    {
        return view('pages.notYetAvailable');
    }
    
}
