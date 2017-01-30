<?php

/* 
Test written by To Hung Sze (tohungsze.acton@gmail.com). Last modified Jan 2017
php unit level tests to test Musicians Manager 3 (laravel implementation)
Test meant to be run regularly / when codes are checked-in.
Comment added by JwTurner as an experiment
*/

/*
This test intends to verify a failed log in end-to-end scenario.
It first loads the app and verifies that the app is running properly
(by verifying some text strings that should be displayed).
Then it enters (in a series) a few set of bad username/password input and clicks Login (to submit the form).
After each submit, it asserts warning that should be displayed. 
*/

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginFail_EmptyInputsthTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLoginFail_EmptyInputsthTest()
    {
        $this->visit('/')
             ->see('Password')
             ->see('Login')
             ->see('Username')
             ->see('Remember me')
             
             //empty username and password
             ->submitForm('Login', ['username' => '', 'password' => ''])
             ->see('Invalid Username or Password')
             
             //empty username but something in password
             ->submitForm('Login', ['username' => '', 'password' => 'abc'])
             ->see('Invalid Username or Password')
             
             //something in username but empty password
             ->submitForm('Login', ['username' => 'abc', 'password' => ''])
             ->see('Invalid Username or Password')
             
              //wrong username / password combo
             ->submitForm('Login', ['username' => 'abc', 'password' => 'abc'])
             ->see('Invalid Username or Password');
             
    }
}
