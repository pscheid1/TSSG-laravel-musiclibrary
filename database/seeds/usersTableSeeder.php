<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class usersTableSeeder extends Seeder
{

/**
 * Run the database seeds.
 *
 * @return void
 */
public function run()
{
    DB::table('users')->insert([
        'username' => 'admin',
         'prefix' => '',
         'firstname' => '',
         'middlename' => '',
         'lastname' => '',
         'sufix' => '',
         'currentRole' => 3,
         'email' => 'some.one@someplace.org',
         'url' => '',
         'address1' => '',
         'address2' => '',
         'city' => '',
         'state' => '',
         'zipcode' => '',
         'phone1' => '',
         'phone2' => '',
         'companyname' => '',
         'title' => '',
         'note' => '',
         'location' => '',
         'activated' => '',
         'terminated' => '',
         'usercanlogin' => 1,
        'forcepwchange' => 0,
        'password' => '$2y$10$pFN6emBmHzqtXX8.4rCbR.tmqdluHYyX/RVwNk6afWh9dkGHz/8zK',
        'remember_token' => '',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
        
    DB::table('users')->insert([
        'username' => 'pscheid',
        'prefix' => '',
        'firstname' => 'Paul',
        'middlename' => '',
        'lastname' => 'Scheidemantel',
        'sufix' => '',
        'currentRole' => 3,
        'email' => 'paul.scheidemantel@gmail.com',
        'url' => '',
        'address1' => '121 Hager Lane',
        'address2' => '',
        'city' => 'Boxborough',
        'state' => 'MA',
        'zipcode' => '01719-1833',
        'phone1' => '',
        'phone2' => '',
        'companyname' => '',
        'title' => '',
        'note' => '',
        'location' => '',
        'activated' => '',
        'terminated' => '',
        'usercanlogin' => 1,
        'forcepwchange' => 1,
        'password' => '$2y$10$A7eTx6aMXVax0i76epbW4eOozLs6Gr2ij6ZZuLa90PVk.WTv/J7lO',
        'remember_token' => '',
         'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]);
        
    DB::table('users')->insert([
        'username' => 'gj',
        'prefix' => '',
        'firstname' => 'George',
        'middlename' => '',
        'lastname' => 'Jetson',
        'sufix' => '',
        'currentRole' => 14,
        'email' => 'guest1@someplace.org',
        'url' => '',
        'address1' => '',
        'address2' => '',
        'city' => '',
        'state' => '',
        'zipcode' => '',
        'phone1' => '',
        'phone2' => '',
        'companyname' => '',
        'title' => '',
        'note' => '',
        'location' => '',
        'activated' => '',
        'terminated' => '',
        'usercanlogin' => 1,
        'forcepwchange' => 1,
        'password' => '$2y$10$3IlSeWxAnNVQ102RM7uK8u9266DVj7sBH0tsHofKLbgWWDN0WCxSC',
        'remember_token' => '',
       'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

    DB::table('users')->insert([
        'username' => 'ghost',
        'prefix' => '',
        'firstname' => 'Non',
        'middlename' => '',
        'lastname' => 'Member',
        'sufix' => '',
        'currentRole' => 1,
        'email' => '',
        'url' => '',
        'address1' => '',
        'address2' => '',
        'city' => '',
        'state' => '',
        'zipcode' => '',
        'phone1' => '',
        'phone2' => '',
        'companyname' => '',
        'title' => '',
        'note' => '',
        'location' => '',
        'activated' => '',
        'terminated' => '',
        'usercanlogin' => 0,
        'forcepwchange' => 0,
        'password' => '',
        'remember_token' => '',
       'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

    }

}
